<div class="max-w-[90rem] mx-auto flex justify-center items-center flex-col">
    <div>
        @foreach([App\Models\Game::class, App\Models\Dlc::class] as $favorite)
        @php
            $favorite_list = $this->user->getFavoriteType($favorite);
        @endphp
        @if($favorite_list->count())
            <div>
                <p class="text-xl font-bold">{{ class_basename($favorite) }} Favorites</p>
                <div class="bg-white min-w-[1300px] min-h-[400px] flex flex-wrap gap-5 rounded-md p-5" >
                    @foreach($favorite_list as $favorite_item)
                        <div class="relative" x-data="{show: false}"
                           @mouseover = "open = true; show = true"
                           @mouseleave="open=false ; show = false"
                        >
                            <button wire:click="deleteFavorite({{$favorite_item->favoriteable->id,$favorite}})" class="absolute rounded-md bg-red-400 text-white -right-2 -top-2  px-2 z-50 " x-show="show"  x-cloak x-transition>
                                x
                            </button>
                            <a  href="{{ route('game.show',[$favorite_item->favoriteable->id]) }}">
                                <image
                                    @click="open = true"
                                    src="{{ asset(Storage::url($favorite_item->favoriteable->profile_image)) }}"
                                    class="w-[85px] h-[115px] rounded-md hover-target"
                                    wire:mouseover="showToolTip({{ $favorite_item->id }})"
                                    data-id="{{ $favorite_item->id }}"
                                />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
        <!-- Tooltip -->
        <div id="tooltip" x-show="open" class=" w-fit absolute bg-[#2b2d42]/60 rounded-lg h-[70px] min-w-[100px] overflow-hidden transition-all ease-in-out origin-center" style="top: {{$top}}px; left: {{ $left }}px" x-cloak x-transition>
            <div class="bg-[#2b2d42] text-white text-sm whitespace-nowrap p-2">
                @if($game_info)
                    {{ $game_info->favoriteable->name }}
                @endif
            </div>
            <p class=" text-white text-sm whitespace-nowrap pl-2">
                @if($game_info)
                    {{ $game_info->favoriteable->release_date }}
                @endif
            </p>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tooltip = document.getElementById('tooltip');
            const hoverTargets = document.querySelectorAll('.hover-target');

            hoverTargets.forEach(target => {
                target.addEventListener('mouseover', function(event) {
                    const targetRect = event.target.getBoundingClientRect();
                    const tooltipWidth = tooltip.offsetWidth;
                    const tooltipHeight = tooltip.offsetHeight;

                    // Calculate the new tooltip position
                    const top = targetRect.top - tooltipHeight - 10; // 10px space above
                    const left = targetRect.left + (targetRect.width / 2) - (tooltipWidth / 2); // center horizontally

                    console.log(`Tooltip Position - Left: ${left}, Top: ${top}`);

                    // Send the position to Livewire
                    @this.set('top', top);  // Emit event to update positions in Livewire
                    @this.set('left', left);  // Emit event to update positions in Livewire
                });
            });
        });
    </script>
@endpush
