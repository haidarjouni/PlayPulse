<x-app-layout>
    <x-slot:title>
        List of Characters
    </x-slot:title>

    <div class="min-h-full">
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Game List</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl flex flex-wrap gap-10 px-4 py-6 sm:px-6 lg:px-8">
                <!-- Display the game -->
                @foreach($characters as $character)
                    <div href="" class=" w-fit">
                        <a href="{{ route('character.show',['id'=> $character->id]) }}">
                            <img src="{{ Storage::url($character->profile_image) }}" alt="{{ $character->name }} Image" class="shadow-2xl w-[200px] h-[260px] aspect-[9/10] object-fill rounded-lg">
                        </a>
                        <p class="font-bold ">{{ $character->name }}</p>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>
