<form wire:submit.prevent="save" class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-white" style="font-family: 'ABeeZee', sans-serif;">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h1 class="text-black font-bold text-center text-4xl">
                This is where you enter games
            </h1>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="selected_game" class="block text-sm/6 font-medium text-gray-900">Game Name</label>
                    <div class="mt-2">
                        <select id="selected_game" wire:model.blur="selected_game" name="selected_game" type="text"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            @foreach($games as $game)
                                <option value="{{ $game->id }}"> {{$game->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="selected_genre" class="block text-sm/6 font-medium text-gray-900">Genre name</label>
                    <div class="mt-2">
                        <select id="selected_genre" name="selected_genre" wire:model="selected_genre" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}"> {{ $genre->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</form>
