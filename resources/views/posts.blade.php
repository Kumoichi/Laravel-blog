<!-- by calling x-layout you are going to layout.blade first -->
<x-layout content="Hello there">
    @include('_posts-header')
    
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
               <x-posts-grid :posts="$posts" />
            @else
                <p class="text-center">No posts yet please check later</p>
            @endif
        </main>

</x-layout>