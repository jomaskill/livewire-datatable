<div>
    <form class="w-full" wire:submit.prevent="save">
        <div class="w-full px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wider text-gray-700 text-xs font-bold mb-2 "
                for="name"
            >
                Name
            </label>
            <input
                class="appearance-none block w-full bg-gray-100 text-gray-700
                border-rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                type="text"
                id="name"
                wire:model.lazy="book.name"
            />
            @error('book.name')
            <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="w-full px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wider text-gray-700 text-xs font-bold mb-2 "
                for="pages"
            >
                Number of pages
            </label>
            <input
                class="appearance-none block w-full bg-gray-100 text-gray-700
                border-rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                type="number"
                id="pages"
                wire:model.lazy="book.pages"
            />
            @error('book.pages')
            <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="w-full px-3 mb-6 md:mb-0">
            <label
                class="block uppercase tracking-wider text-gray-700 text-xs font-bold mb-2 "
                for="author"
            >
                Author
            </label>
            <input
                class="appearance-none block w-full bg-gray-100 text-gray-700
                border-rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                type="text"
                id="author"
                wire:model.lazy="book.author"
            />
            @error('book.author')
            <span class="text-red-600">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button
            type="submit"
            class="bg-gray-500"
        >
            Create
        </button>
    </form>
</div>
