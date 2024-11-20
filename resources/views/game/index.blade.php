<x-app-layout>
    <x-slot:title>
        List of Games
    </x-slot:title>

    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="size-8 rounded-lg" src="{{ asset('images/logo.png') }}" alt="Your Company">
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="size-8 rounded-full"
                                             src="{{ Auth::check() && Auth::user()->profile_image ? Storage::url(Auth::user()->profile_image) : asset('path/to/default/image.jpg') }}"
                                             alt="User Profile Image">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Game List</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl flex flex-wrap gap-10 px-4 py-6 sm:px-6 lg:px-8">
                <!-- Display the game -->
                @foreach($games as $game)
                    <div href="" class=" w-fit">
                        <a href="{{ route('game.show',['id'=> $game->id]) }}">
                            <img src="{{ Storage::url($game->profile_image) }}" alt="{{ $game->name }} Image" class="shadow-2xl w-[200px] h-[260px] aspect-[9/10] object-fill rounded-lg">
                        </a>
                        <p class="font-bold ">{{ $game->name }}</p>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>
