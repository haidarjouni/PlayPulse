<x-app-layout class="relative" >
    <x-slot:attribute>
        :class="{'overflow-hidden': open}"
    </x-slot:attribute>
<x-slot:title>
        Show a specific game
    </x-slot:title>
    <style>
        .background{
            background-image: url("{{asset('images/wallhaven-96kqv1.png')}}");
            background-size: cover; /* Ensures the image covers the whole div */
            background-position: center; /* Centers the image in the div */
        }
        .background-2{
            background-image: url("{{asset('images/wallhaven-96kqv1.png')}}");
            background-size: cover; /* Ensures the image covers the whole div */
            background-position: center; /* Centers the image in the div */
        }
        body{
            background-color: #eaebef;
        }
    </style>

    <div class="w-full background h-[320px]">
    </div>
    @livewire('modal-forum', ['game' => $game, 'user_list' => $user_list, 'favorite_game'=>$favorite_game])
    <container class="max-w-[1060px] mx-auto mt-5 flex gap-10  h-fit mb-10">
        <sidebar class="bg-white rounded-md h-full p-5 w-[200px]">
            <div class="pb-3">
                <p class="text-sm text-[#667a91] font-semibold">
                  Format
                </p>
                <p class="text-sm text-[#949ba3]">
                    {{ $game->format }}
                </p>
            </div>
            <div class="pb-3">
                <p class="text-sm text-[#667a91] font-semibold">
                    Main Mission Duration
                </p>
                <p class="text-sm text-[#949ba3]">
                    {{ $game->duration }}h
                </p>
            </div>
            <div class="pb-3">
                <p class="text-sm text-[#667a91] font-semibold">
                    status
                </p>
                <p class="text-sm text-[#949ba3]">
                    {{ $game->status }}
                </p>
            </div>
            <div class="pb-3">
                <p class="text-sm text-[#667a91] font-semibold">
                    Development Date
                </p>
                <p class="text-sm text-[#949ba3]">
                    {{ $game->dev_date }}
                </p>
            </div>
            <div class="pb-3">
                <p class="text-sm text-[#667a91] font-semibold">
                    Release Date
                </p>
                <p class="text-sm text-[#949ba3]">
                    {{ $game->release_date }}
                </p>
            </div>
        </sidebar>
        <content>
            <div class="mb-10">
                <div class="font-bold text-md mb-3">
                    <p class="text-md">Characters</p>
                </div>
                <div class="flex gap-10">
                    @foreach($game->characters as $character)
                        <div class="bg-white min-w-[337px] rounded-lg overflow-hidden h-[80px] flex">
                            <!-- Character Info -->
                            <div class="flex flex-1">
                                <a href="{{ route('character.show',$character->id) }}">
                                    <img class="w-[60px] h-[80px] object-cover" src="{{ Storage::url($character->profile_image) }}" alt="{{ $character->name }}">
                                </a>
                                <a href="{{ route('character.show',$character->id) }}">
                                    <div class="w-[90px]">
                                        <div class="p-[10px] flex flex-col place-content-between text-sm text-[#5d738b] hover:text-blue-500 hover:cursor-pointer">
                                            <p class="h-[48px]">{{ $character->name }}</p>
                                            <p>{{ $character->pivot->role }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Voice Actor Info -->
                            <div class="flex flex-row-reverse flex-1">

                                <a href="{{ route('voice-actor.show',$character->voiceActors->first()->id) }}">
                                    <img class="w-[60px] h-[80px] object-fill" src="{{ Storage::url($character->voiceActors->first()->profile_image) }}" alt="{{ $character->voiceActors->first()->name }}">
                                </a>
                                <a href="{{ route('voice-actor.show',$character->voiceActors->first()->id) }}">
                                    <div class="w-[90px]">
                                        <div class="p-[10px] flex flex-col place-content-between text-sm text-[#5d738b] hover:text-blue-500 hover:cursor-pointer">
                                            <p class="h-[48px] text-wrap">{{ $character->voiceActors->first()->name }}</p>
                                            <p> Voice Actor</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-10">
                <div>
                    Characters
                </div>
            </div>
        </content>
    </container>
</x-app-layout>
