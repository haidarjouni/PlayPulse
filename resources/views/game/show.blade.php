<x-app-layout>
    <x-slot:title>
        Show a specific game
    </x-slot:title>
    <style>
        .background{
            background-image: url("{{asset('images/wallhaven-96kqv1.png')}}");
            background-size: cover; /* Ensures the image covers the whole div */
            background-position: center; /* Centers the image in the div */
        }
        body{
            background-color: #eaebef;
        }
    </style>
    <div class="w-full background h-[400px]">
    </div>

    <header class="w-full  bg-white ">
        <div class="flex flex-row justify-center gap-7 max-w-[1300px] h-fit mx-auto px-10">
                <div class="w-[240px] relative">
                    <div class="absolute bottom-7">
                        <div class="flex flex-col">
                            <image class="h-[303px] w-[230px] object-cover rounded-xl shadow-xl" src="{{ asset(Storage::url($game->profile_image)) }}"></image>
                            <div class="pt-5 gap-3">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Add to  List
                                </button>
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="flex flex-col h-fit pt-5 w-[795px]">
                        <div>
                            <h1 class="text-2xl text-[#6d8096]" style=" font-family: 'Aldrich', sans-serif;">
                                {{ $game->name }}
                            </h1>
                        </div>
                       <div class="py-3">
                           <p class=" text-gray-700 text-md font-semibold text-left  text-wrap">
                               {{ $game->description }}
                           </p>
                       </div>
                       <div class="w-full flex flex-row justify-evenly">
                            <div class="p-[15px] hover:cursor-pointer">
                                overview
                            </div>
                            <div class="p-[15px] hover:cursor-pointer">
                               play
                            </div>
                            <div class="p-[15px] hover:cursor-pointer">
                               character
                            </div>
                            <div class="p-[15px] hover:cursor-pointer">
                                stats
                            </div>
                            <div class="p-[15px] hover:cursor-pointer">
                               staff
                            </div>
                            <div class="p-[15px] hover:cursor-pointer">
                               social
                            </div>
                       </div>
               </div>
        </div>
    </header>

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
                                <div>
                                    <img class="w-[60px] h-[80px] object-cover" src="{{ Storage::url($character->profile_image) }}" alt="{{ $character->name }}">
                                </div>
                                <div class="w-[90px]">
                                    <div class="p-[10px] flex flex-col place-content-between text-sm text-[#5d738b] hover:text-blue-500 hover:cursor-pointer">
                                        <p class="h-[48px]">{{ $character->name }}</p>
                                        <p>{{ $character->pivot->role }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Voice Actor Info -->
                            <div class="flex flex-row-reverse flex-1">
                                <div>
                                    <img class="w-[60px] h-[80px] object-fill" src="{{ Storage::url($character->voiceActors->first()->profile_image) }}" alt="{{ $character->voiceActors->first()->name }}">
                                </div>
                                <div class="w-[90px]">
                                    <div class="p-[10px] flex flex-col place-content-between text-sm text-[#5d738b] hover:text-blue-500 hover:cursor-pointer">
                                        <p class="h-[48px] text-wrap">{{ $character->voiceActors->first()->name }}</p>
                                        <p> Voice Actor</p>
                                    </div>
                                </div>
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
