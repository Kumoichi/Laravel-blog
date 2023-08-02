@props(['comment'])

<article class="flex bg-gray-100 border-gray-200 p-6 rounded-xl space-x-4">
                        <div class="flex-shrink-0">
                            <img src="https://i.pravator.cc/100" alt="this is image" width="60" height="60" class="rounded-xl">
                        </div>

                        <div>
                            <header class="mb-4">
                                <strong class="font-bold">{{ $comment->author->username }}</strong>
                                <p class="text-xs">Posted
                                    <time>{{ $comment->created_at }}</time></p>
                            </header>
                        <p>{{ $comment->body }}</p>                       
                     </div>
                    </article>