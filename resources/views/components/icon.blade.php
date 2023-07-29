@props(['name'])

<!-- if you wanna add other icon you can change the name and execute only that one. -->
@if($name == 'down-arrow')
<!-- $attributes means for making icon dinamic. if you want to add other icon you can arrange the $attribute and add whatever style you want. -->

<svg {{ $attributes->merge(['class' => 'transform -rotate-90']) }} width="22" height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
@endif