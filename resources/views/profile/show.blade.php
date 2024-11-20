<x-app-layout>
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
    <x-slot:title>
        {{$user->name}} Profile
    </x-slot:title>
    <div class="w-full aspect-[21/4] min-h-[290px] bg-cover background">
        <div class="w-[1300px] mx-auto flex justify-between items-end h-full">
            <div class="flex gap-10">
                <image src="{{asset(Storage::url($user->profile_image))}}" class="userBackground w-[180px] h-[90px] rounded-t-lg"></image>
                <div class="flex items-center">
                    <p class="font-bold text-white text-2xl text-left ">
                        {{$user->name}}
                    </p>
                </div>
            </div>
            @if($user->id !== Auth::user()->id)
                <livewire:follow-button></livewire:follow-button>
            @endif
        </div>
    </div>
    <div class="w-full bg-white h-fit">
        <div class="w-[1000px] mx-auto" style="">
            <div class="w-full flex flex-row justify-evenly font-bold text-[#6d8096]">
                <div class="p-[9px] hover:cursor-pointer ">
                    Overview
                </div>
                <div class="p-[9px] hover:cursor-pointer text-orange-500">
                    Game List
                </div>
                <div class="p-[9px] hover:cursor-pointer">
                    DLC List
                </div>
                <div class="p-[9px] hover:cursor-pointer">
                    Favorites
                </div>
                <div class="p-[9px] hover:cursor-pointer">
                    Friends
                </div>
                <div class="p-[9px] hover:cursor-pointer">
                    social
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
