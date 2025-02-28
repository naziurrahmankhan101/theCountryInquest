<div>
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-3">
        @foreach ($categories as $category)
            <a href="{{ route('posts.index', ['category' => $category->slug]) }}"
                class="px-3 py-1 text-base rounded-xl text-{{ $category->text_color }} bg-{{ $category->bg_color }}">
                {{ $category->title }}
            </a>
        @endforeach
    </div>
</div>
