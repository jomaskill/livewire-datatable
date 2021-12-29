<div class="flex flex-col">
    @if(session()->has('message'))
        <div class="w-auto py-4 px-4 mb-4 pointer-events-none bg-green-100">
            <p class="text-sm leading-5 font-medium text-green-700 text-2xl">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    <div class="-my-2 py-2 overflow-x-auto sm:mx-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 space-y-4">
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Id
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Nome
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Pages
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Author
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Ações
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($books as $book)
                    <tr wire:key="{{ $book->id }}">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{$book->id}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{$book->name}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{$book->pages}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            {{$book->author}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <a href="{{ route('books.edit', ['book' => $book->id]) }} " class="">
                                Edit
                            </a>
                            <a href="{{ route('books.show', ['book' => $book->id]) }} " class="">
                                Show
                            </a>
                            <button
                                onclick="return confirm('Are u sure?') || event.stopImmediatePropagation()"
                                wire:click="delete('{{ $book->id }}')"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{$books->links()}}
        </div>
    </div>
</div>
