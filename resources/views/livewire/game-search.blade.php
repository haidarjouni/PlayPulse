<div class="max-w-[80rem] mx-auto flex gap-20">
    <!-- Filter Section -->

    <div class="w-[210px] flex flex-col h-screen">
        <div class="relative text-gray-400 font-light">
            <input
                type="text"
                class="pl-10 w-full border-none bg-white focus:ring-0 p-3 rounded-md focus:shadow-lg transition-all ease-in-out duration placeholder-gray-400"
                placeholder="Search games..."
                wire:model.live.debounce="search">
            <i class="fa-solid fa-magnifying-glass z-50 left-3 inset-y-4 absolute"></i>
        </div>
        <div class="w-full mt-2">
            <p class="text-sm text-gray-500 font-semibold mb-2 text-[#9798a3]">
                List
            </p>
            <button
                class="p-0.5 rounded-md transition-all w-full mb-2 {{ count($filtered_status) >1 ? 'bg-white font-bold text-[#6372a5]' : 'bg-transparent text-[#9798a3]' }}"
                wire:click="status('all')"
            >
                All
            </button>

            <div class="flex flex-col space-y-2">
                @foreach($array_status as $status)
                    <button
                        class="p-0.5 rounded-md transition-all  {{ count($filtered_status) === 1 && $status == $filtered_status[0] ? 'bg-white font-bold text-[#6372a5]' : 'bg-transparent text-[#9798a3]' }}"
                        wire:click="status('{{ $status }}')">
                        {{ $status }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Game List Section -->
    <div class="flex flex-col gap-y-10 w-full">
        @foreach($filteredGames as $status => $games)
            @if($games->count()) <!-- Check if there are any games in the current status -->
                <div>
                    <h1 class="ml-10 mb-3 text-lg capitalize">{{ $status }}</h1>
                    <div class="rounded-md w-full shadow-lg">
                        <div class="text-gray-700 uppercase bg-white rounded-t-md">
                            <div class="grid grid-cols-[auto,1fr,1fr,1fr] gap-0"> <!-- Grid setup for responsive layout -->
                                <div class="w-20"></div>
                                <div class="px-6 py-3">Title</div>
                                <div class="px-6 py-3">Score</div>
                                <div class="px-6 py-3">Type</div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            @foreach($games as $finished_game)
                                <a href="{{ route('game.show', $finished_game->game->id) }}" class="grid grid-cols-[auto,1fr,1fr,1fr] z-50 gap-0 bg-white hover:bg-orange-500 transition-all ease-in-out hover:text-white relative last:rounded-b-md" x-data="{open:false}" @mouseover="open = true" @mouseout="open = false">
                                    <!-- Hover image to show on mouseover -->
                                    <image src="{{ asset(Storage::url($finished_game->game->profile_image)) }}" x-show="open" x-cloak class="w-[170px] h-[240px] rounded-lg shadow-xl absolute left-[-15rem] top-[-5rem]"/>
                                    <div class=" flex items-center justify-center w-20">
                                        <image src="{{ asset(Storage::url($finished_game->game->profile_image)) }}" class="rounded-sm w-12 h-12 " />
                                    </div>
                                    <p scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ $finished_game->game->name }}</p>
                                    <p class="px-6 py-4">{{ $finished_game->score }}</p>
                                    <p class="px-6 py-4">{{ $finished_game->game->format }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
