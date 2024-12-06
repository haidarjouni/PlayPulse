<x-profile-layout :user="$user">
    <div class="w-full mt-10">
        <div class="max-w-[90rem] mx-auto flex justify-center items-center flex-col">
            @foreach([App\Models\Game::class, App\Models\Dlc::class] as $favorite)
                @php
                    $favorite_list = $user->getFavoriteType($favorite);
                @endphp
                @if($favorite_list->count())
                    <div>
                        <p class="text-xl font-bold">{{ class_basename($favorite) }} Favorites</p>
                        <div class="bg-white min-w-[1300px] min-h-[400px] flex flex-wrap gap-5 rounded-md p-5">
                            @foreach($favorite_list as $favorite_item)

                            <div class="relative">
                                <div class="absolute bg-black/60 rounded-lg h-[70px] min-w-[100px] overflow-hidden  -translate-y-[4.2rem] z-50">
                                    <div class="bg-black text-white text-sm whitespace-nowrap p-2">
                                        {{ $favorite_item->favoriteable->name }}
                                    </div>
                                </div>
                                <button class="absolute rounded-md bg-red-400 text-white -right-4 -top-3 p-3 py-1">
                                    x
                                </button>
                                <image src="{{ asset(Storage::url($favorite_item->favoriteable->profile_image)) }}" class="w-auto h-[150px] rounded-md"/>
                            </div>

                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-profile-layout>
