<x-app-layout :title="$post->title">


        <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="{{ asset('storage/'.$post->image) }}" alt="thumbnail">
            <h1 class="text-5xl font-bold text-left text-gray-800" style="font-size: 3rem;">
            {{ $post->title }}
            </h1>


            <div class="mt-2 flex justify-between items-center">
                <div class="flex py-5 text-base items-center">

                    <span class="text-gray-500 text-sm">| {{ $post->getReadingTime() }}</span>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-500 mr-2">{{ $post->published_at->diffForHumans() }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                        stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div
                class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
                <div class="flex items-center">
                    <a class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-600 hover:text-gray-900">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        <span class="text-gray-600 ml-2">
                            1
                        </span>
                    </a>
                </div>
                <div>
                    <div class="flex items-center">


                    </div>
                </div>
            </div>

            <div class="article-content py-3 text-gray-800 text-lg text-justify prose">
                {!! $post->body !!}
            </div>

            <div class="flex items-center space-x-4 mt-10">
            @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                        @endforeach
            </div>

            <div class="mt-10 comments-box border-t border-gray-100 pt-10">
                <h2 class="text-2xl font-semibold text-gray-900 mb-5">Discussions</h2>
                <textarea
                    class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                    cols="30" rows="7"></textarea>
                    <button style="background: #1a202c; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">
                     Post Comment
                    </button>

                <!-- <a class="text-yellow-500 underline py-1" href=""> Login to Post Comments</a> -->

                <div class="user-comments px-3 py-2 mt-5">
                    <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
                        <div class="user-meta flex mb-4 text-sm items-center">
                            <img class="w-7 h-7 rounded-full mr-3" src="" alt="mn">
                            <span class="mr-1">user name</span>
                            <span class="text-gray-500">. 15 days ago</span>
                        </div>
                        <div class="text-justify text-gray-700  text-sm">
                            comment content
                        </div>
                    </div>
                    <!-- <div class="text-gray-500 text-center">
                        <span> No Comments Posted</span>
                    </div> -->
                </div>
            </div>


        </article>



</x-app-layout>
