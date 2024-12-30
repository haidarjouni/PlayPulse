<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$user->name}} Profile</title>
    <!-- font awsome-->
    <script src="https://kit.fontawesome.com/e66d544c68.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- flowbite-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <!-- pikaday-->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        @import url(https://fonts.bunny.net/css?family=abeezee:400|aldrich:400);
        /*    font-family: 'Aldrich', sans-serif;*/
        /*    font-family: 'ABeeZee', sans-serif;*/
        [x-cloak] { display: none !important; }
        .background{
            background-image: url("{{asset('images/wallhaven-96kqv1.png')}}");
            background-size: cover; /* Ensures the image covers the whole div */
            background-position: center; /* Centers the image in the div */
        }
        body{
            background-color: #eaebef;
        }
    </style>
    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#edf1f5]">
<header>
    <div class="w-full aspect-[21/3] min-h-[290px] bg-cover background">
        <div class="w-[1300px] mx-auto flex justify-between items-end h-full">
            <div class="flex gap-10">
                <image src="{{asset(Storage::url($user->profile_image))}}" class="userBackground object-cover w-[180px] h-[90px] rounded-t-lg"></image>
                <div class="flex items-center">
                    <p class="font-bold text-white text-2xl text-left ">
                        {{$user->name}}
                    </p>
                </div>
            </div>
            @if(Auth::check())
                @if($user->id !== Auth::user()->id)
                    <livewire:follow-button  :user="$user"></livewire:follow-button>
                @endif
            @endif
        </div>
    </div>
    <div class="w-full bg-white h-fit">
        <div class="w-[1000px] mx-auto">
            <div class="w-full flex flex-row justify-evenly font-bold text-[#6d8096]">
                <a href="{{ route('profile', ['name' => $user->name]) }}" class="p-[9px] hover:cursor-pointer {{ Route::currentRouteName() == 'profile' ? 'text-orange-500' : 'text-gray-700' }} ">Overview</a>
                <a href="{{ route('game-list', ['name' => $user->name]) }}" class="p-[9px] hover:cursor-pointer {{ Route::currentRouteName() == 'game-list' ? 'text-orange-500' : 'text-gray-700' }}">Game List</a>
                <a href="{{ route('dlc-list', ['name' => $user->name]) }}" class="p-[9px] hover:cursor-pointer {{ Route::currentRouteName() == 'dlc-list' ? 'text-orange-500' : 'text-gray-700' }}">DLC List</a>
                <a href="{{ route('favorites', ['name' => $user->name]) }}" class="p-[9px] hover:cursor-pointer {{ Route::currentRouteName() == 'favorites' ? 'text-orange-500' : 'text-gray-700' }}">Favorites</a>
                <a href="{{ route('socials', ['name' => $user->name]) }}" class="p-[9px] hover:cursor-pointer {{ Route::currentRouteName() == 'socials' ? 'text-orange-500' : 'text-gray-700' }}">Friends</a>
            </div>
        </div>
    </div>
</header>
<main class="">
    {{$slot}}
</main>
@stack('scripts')
@livewireScripts

</body>
</html>
