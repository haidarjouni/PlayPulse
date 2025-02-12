
<div class="max-w-[1320px] m-auto flex flex-row gap-14">
    <div class="basis-[55%]">
        <div class="w-full">
            <div class="mb-2 w-full flex justify-between py-1">
                <div class="font-semibold text-md pl-1 text-[#5c7299]">
                    Activity
                </div>
                <div class="flex bg-white rounded-sm" x-data="{ design: 'global' }">
                    @auth
                        <button class="px-3 text-sm text-gray-600 text-opacity-50 py-1 hover:text-blue-500 {{ $type == 'F' ? 'font-bold text-gray-900 bg-[#f5f8fb]' : ''}}"
                                wire:click="$set('type', 'F')"
                        >
                            <p>Following</p>
                        </button>
                    @endauth
                    <button class="px-3 text-sm text-gray-600 text-opacity-50 py-1 hover:text-blue-500  {{ $type == 'G' ? 'font-bold text-gray-900 bg-[#f5f8fb]' : ''}}"
                            wire:click="$set('type', 'G')"
                    >
                        <p>Global</p>
                    </button>

                </div>
            </div>
            <div class="" x-data="{open: false}">
                <div class=" bg-white flex w-full mb-2 p-3 px-8 rounded-md" x-cloak x-show="open">
                    <button>a</button>
                    <button></button>
                    <button></button>
                    <button></button>
                    <button></button>
                </div>
                <textarea id="message" rows="1" class="block p-2.5 w-full text-sm bg-gray-50 rounded-md border-none focus:ring-0" @click="open = true" @click.outside="open = false" placeholder="Write your thoughts here..."></textarea>
                <div class="flex mt-3 justify-end gap-5" x-show="open" x-cloak>
                    <button class="bg-white p-2 rounded-md px-4 font-bold text-[#5c7299] text-sm">
                        Cancel
                    </button>
                    <button class="bg-[#3db4f1] text-white p-2 rounded-md px-4 font-bold text-sm">
                        Publish
                    </button>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <div class="h-3"></div>
                @foreach($activities as $activity)
                    <div class="bg-white flex gap-3 pr-8 rounded-md min-h-[135px] h-fit overflow-hidden">
                        <image src="{{Storage::url($activity->game->profile_image) }}" class="object-cover min-h-[140px] h-auto w-[100px]"/>
                        <div class="pt-3 text-sm text-[#5c7299] gap-2 flex-col flex w-full" x-data="{open: false}" @mouseover="open = true" @mouseleave="open = false">
                            <div class="flex justify-between w-full">
                                <p class="text-md text-blue-500">
                                    {{ $activity->user->name }}
                                </p>
                                <div class="flex gap-2 items-center" >
                                    @if(auth()->user()->id == $activity->user->id)
                                        <button wire:click="deleteActivity({{ $activity->id }})">
                                            <i class="fa-solid fa-ellipsis" x-cloak x-show="open" x-transition></i>
                                        </button>
                                    @endif
                                    <p wire:poll.keep-alive.60s>{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm text-blue-500">
                                            <span class="text-gray-600">
                                                {{ $activity->activity }}
                                            </span>  <a href="{{ route('game.show',[$activity->game->id]) }}"> {{ $activity->game->name }} </a>
                                </p>
                            </div>
                            <a href="{{ route('profile',[$activity->user->name]) }}">
                                <image src="{{ Storage::url($activity->user->profile_image) }}" class="object-cover w-11 h-11 rounded-md"></image>
                            </a>
                            <div class="flex w-full h-5 justify-end gap-2">
                                <i class="fa-solid fa-comments fa-sm"></i>
                                <i class="fa-solid fa-heart fa-sm"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="basis-[38%] flex flex-col gap-y-5">
        @if(auth()->check())
            <div>
                <h1 class="ml-1 text-[#5c7299] font-bold mb-2">
                    Game in Progress
                </h1>
                <div class="bg-white max-w-[545] h-auto min-h-[115px] p-3 rounded-md grid grid-cols-5 gap-y-3">
                    @foreach($playing_games as $playing_game)
                        <div class="relative w-fit" x-data="{open: false}" >
                            <a href="{{ route('game.show',[$playing_game->game->id]) }}">
                                <image class="w-[85px] h-[115px] rounded-md object-cover" src="{{ Storage::url($playing_game->game->profile_image) }}"></image>
                            </a>
                            <div class="absolute bottom-0 z-50 w-full bg-black min-h-7 text-center rounded-b-lg bg-opacity-50">
                                <button @click= "open = true" @click.outside="open = false">
                                    <p class="text-white text-sm w-full">
                                        {{ $playing_game->status }}
                                    </p>
                                </button>
                            </div>
                            <div class="absolute w-[110px] bg-white border rounded group-hover:block mt-1 overflow-hidden z-50" x-show="open" x-cloak x-transition>
                                <div class="flex flex-col text-sm">
                                    @foreach(\App\Enums\UserGameStatus::values() as $status)
                                        <button
                                            class="p-2 text-black hover:bg-blue-500 hover:text-white transition-all"
                                            wire:click="updateGameList('{{ $status }}', {{ $playing_game->game->id }})"
                                        >
                                            {{ $status }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div>
            <h1 class="ml-1 text-[#5c7299] font-bold mb-2">
                Newly Add Games
            </h1>
            <div class="bg-white max-w-[545] h-auto min-h-[115px] p-3 rounded-md grid grid-cols-5 gap-y-3">
                @foreach($games as $game)
                    <div class="w-fit" x-data="{open: false}" >
                        <a href="{{ route('game.show',[$game->id]) }}">
                            <image class="w-[85px] h-[115px] rounded-md object-cover z-50" src="{{ Storage::url($game->profile_image) }}"></image>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
