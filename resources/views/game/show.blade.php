<x-app-layout class="relative" x-data="{ open: true }" >
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

    <div class="w-full background h-[400px]">
    </div>

    <header class="w-full bg-white" style="font-family: 'ABeeZee', sans-serif;">

        <div class="flex flex-row justify-center gap-7 max-w-[1300px] h-fit mx-auto px-10">
                <div class="w-[240px] relative">
                    <div class="absolute bottom-7">
                        <div class="flex flex-col">
                            <image class="h-[303px] w-[230px] object-cover rounded-xl shadow-xl" src="{{ asset(Storage::url($game->profile_image)) }}"></image>
                            <div class="pt-5 gap-3">
                                <button @click="open = !open" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Add to  List
                                </button>
                                <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--       card     --}}
                <div class="bg-black h-svh bg-opacity-40 w-full top-0 flex justify-center items-center fixed z-50  " x-show="open"  x-transition x-transition:enter.duration.300ms x-transition:leave.duration.300ms>
                    <div @click.outside="open = false"  class="bg-gray-100 shadow-xl w-[1000px] h-[600px] rounded-md overflow-hidden">
                        <form>
                            <div class="w-full aspect-[21/4.5] background-2 relative">
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-between">
                                    <div class="w-full text-right">
                                        <button class="text-white px-3 py-1 mr-4  text-lg rounded-full " @click="open = !open">
                                            x
                                        </button>
                                    </div>
                                    <div class="flex justify-between px-20">
                                        <div class="flex">
                                            <div>
                                                <image src="{{Storage::url($game->profile_image)}}" class="w-[120px] h-[151px] translate-y-6 object-cover"></image>
                                            </div>
                                            <div class="text-white flex items-end p-[20px] text-lg text-gray-200">
                                                awdhaiwd
                                            </div>
                                        </div>
                                        <div class="text-white flex gap-5 items-end mb-[20px]">
                                            <div class="mb-1 cursor-pointer">
                                                <i class="fa-solid fa-heart"></i>
                                            </div>
                                            <button type="button" class="text-white bg-blue-400 rounded-md text-sm px-3 py-1.5">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" py-[70px] px-[50px] grid grid-cols-3 gap-y-10">
                                <div class="text-gray-500">
                                    <label>
                                        Status
                                    </label>
                                    <div>
                                        <select class=" cursor-pointer bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0 " placeholder="Status">
                                            <option value="" disabled selected>Choose an option</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-gray-500">
                                    <label>
                                        Score
                                    </label>
                                    <div>
                                        <input type="number" value="0"  class="bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0 "/>
                                    </div>
                                </div>
                                <div class="text-gray-500">
                                    <label>
                                        Score
                                    </label>
                                    <div>
                                        <select class=" cursor-pointer bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0 " placeholder="Status">
                                            <option value="" disabled selected>Choose an option</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-gray-500">
                                    <label>
                                        Started Date
                                    </label>
                                    <div>
                                        <input type="text" id="dev_date" wire:model="dev_date" wire:model.defer="start_date" class="block text-black  mt-1 p-2 border-0 ring-0 rounded-md" />
                                    </div>
                                </div>
                                <div class="text-gray-500">
                                    Finished date
                                    <div>
                                        <input type="text" id="dev_date" wire:model="dev_date" wire:model.defer="start_date" class="block text-black mt-1 p-2 border-0 ring-0 rounded-md" />
                                    </div>
                                </div>
                                <div class="text-gray-500">
                                    Total replay
                                    <div>
                                        <input type="number" value="0"  class="bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0 "/>
                                    </div>
                                </div>
                            </div>
                            @push('scripts')
{{--                                <script>--}}
{{--                                    var picker = new Pikaday({--}}
{{--                                        field: document.getElementById('dev_date'),--}}
{{--                                        onSelect: function(date) {--}}
{{--                                            // Update Livewire model with selected date--}}
{{--                                            @this.set('started_date', date.toISOString().split('T')[0]); // Send date in YYYY-MM-DD format--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                    var picker = new Pikaday({--}}
{{--                                        field: document.getElementById('released_date'),--}}
{{--                                        onSelect: function(date) {--}}
{{--                                            // Update Livewire model with selected date--}}
{{--                                            @this.set('finish_date', date.toISOString().split('T')[0]); // Send date in YYYY-MM-DD format--}}
{{--                                        }--}}
{{--                                    });--}}
{{--                                </script>--}}
                            @endpush
                        </form>

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
