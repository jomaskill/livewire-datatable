<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductDatatable extends Component
{
    use WithPagination;

    public $filters = [
        'search' => null,
        'minStock' => null,
        'maxStock' => null,
        'status' => null
    ];

    public $status;

    public $sorts = [];

    public bool $openAdvancedFilters = false;

    public function mount()
    {
        $this->status = Product::pluck('status')->toArray();
        $this->itemsPerPage = session()->get('itemsPerPage', 10);
    }

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function updatedItemsPerPage()
    {
        session()->put('itemsPerPage', $this->itemsPerPage);
        $this->resetPage();
    }

    public function runQueryBuilder()
    {
        return Product::query()
            ->when($this->filters['search'],
                fn($query, $search) => $query->where('name', 'like', "%$search%")
            )
            ->when($this->filters['minStock'],
                fn($query, $search) => $query->where('stock', '>', $search)
            )
            ->when($this->filters['maxStock'],
                fn($query, $search) => $query->where('stock', '<', $search)
            )
            ->when($this->filters['status'],
                fn($query, $search) => $query->where('status', $search)
            )
            ->when(!empty($this->sorts),
                fn($query) => $query->orderBy(array_key_first($this->sorts), reset($this->sorts))
            );
    }

    public function sortBy($column)
    {
        if (!isset($this->sorts[$column])) {
            $this->sorts = [];
            $this->sorts[$column] = 'asc';
            return;
        }
        if ($this->sorts[$column] === 'asc') {
            $this->sorts[$column] = 'desc';
            return;
        }
        if ($this->sorts[$column] === 'desc') {
            $this->sorts[$column] = 'asc';
            return;
        }
    }

    public function clearFilters()
    {
        $this->filters = array_fill_keys(array_keys($this->filters), null);
    }

    public function render()
    {
        return view('livewire.product.datatable')
            ->with([
                'products' => $this->runQueryBuilder()->paginate($this->itemsPerPage)
            ]);
    }
}
