@props(['comment'])

<x-panel class="bg-gray-100">

<article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://i.pravator.cc/60?u={{ $comment->id }}" alt="this is image" width="60" height="60" class="rounded-xl">
                        </div>

                        <div>
                            <header class="mb-4">
                                <strong class="font-bold">{{ $comment->author->username }}</strong>
                                <p class="text-xs">Posted
                                    <time>{{ $comment->created_at->format('F j, Y, g:i a')}}</time></p>
                            </header>
                        <p>{{ $comment->body }}</p>                       
                     </div>
                    </article>
</x-panel>