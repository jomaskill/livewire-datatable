<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('books.index') }}">
            {{ __('Books') }}
        </a>
        <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('products.index') }}">
            {{ __('Products') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:product.datatable/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
