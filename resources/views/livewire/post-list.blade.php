<div class="px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-600">
            @if ($activeCategory || $search)
                <button class="gray-500 text-xs mr-3" wire:click="clearFilters()">X</button>
            @endif
            @if ($activeCategory)
                All Posts From:
                <x-badge wire:click="setCategory('')" class="cursor-pointer"
                    :textColor="$activeCategory->text_color"
                    :bgColor="$activeCategory->bg_color">
                    {{ $activeCategory->title }}
                </x-badge>
            @endif
            @if ($search)
                Containing: {{ $search }}
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>

    <div class="py-4">
        @if($posts->count())
            @foreach ($posts as $post)
                <x-posts.post-item :post="$post" />
            @endforeach
        @else
            <p class="text-gray-600">No posts found matching your search.</p>
        @endif
    </div>

    <div class="my-3">
        {{ $posts->onEachSide(1)->links() }}
    </div>
</div>
