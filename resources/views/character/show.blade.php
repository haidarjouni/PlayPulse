<x-app-layout>
    <style>
        body{
            background-color: #eaebef;
        }
    </style>
    <x-slot:title>
        Show A profile
    </x-slot:title>
    <div class=" font-bold text-xl flex flex-col items-center">
        <div class="mt-10 flex gap-10">
            <image class="w-[230px] h-[345px] object-cover shadow-xl rounded-lg " src="{{ asset(Storage::url($character->profile_image)) }}"></image>
            <div class="flex flex-col text-gray-700">
                {{ $character->name }}
                <div>
                    <p>Initial Age: {{$character->age}}</p>
                </div>
                <div>
                    <p>Gender: {{$character->getGender()}}</p>
                </div>
                <div>
                    <p>Height: {{$character->height}}cm</p>
                </div>
            </div>
        </div>
        <div class="h-[130px]"></div>
    </div>
    <div class="w-[1200px] mx-auto mt-10">
        <div class="">
            @foreach($character->games as $game)
                <div class="relative w-fit overflow-hidden">
                    <a class="" href="{{ route('game.show',$game->id) }}">
                        <image class="w-[185px] h-[265px]  rounded-lg shadow-xl " src="{{Storage::url($game->profile_image)}}"></image>
                    </a>
                    @php
                        $voiceActor = $game->voiceActorForCharacter($game->id, $character->id);
                    @endphp
                    <a class="" href="{{ route('voice-actor.show', $voiceActor->id) }}">
                        <image class="absolute w-[63px] h-[83px] bottom-0 right-0 border-l-2 border-t-2 border-white rounded-tl-lg rounded-br-lg" src="{{ Storage::url( $voiceActor->profile_image)  }}"></image>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
