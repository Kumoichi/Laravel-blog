<x-dropdown>
                        <x-slot name="trigger">
                        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 tex-left inline-flex">
                            <!--  if you are in whatever category, it will display the currentCategory name
                            but if it comes from root it will show Categories -->
                            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
                            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right:12px;" />
                        </button>
                        </x-slot>
                        
                        <!-- showing the current category name with background color added. -->
                    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
                    
                        @foreach ($categories as $category)
                        <x-dropdown-item 
                        href="/?category={{ $category->slug }}" 
                        :active='request()->is("categories/{$category->slug}")'
                        >{{ ucwords($category->name)}}</x-dropdown-item>
                            @endforeach
                           
                    </x-dropdown>