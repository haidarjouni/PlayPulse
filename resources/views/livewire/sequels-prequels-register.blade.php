<div>
    <div class="h-[200px]"></div>
    <form
        class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-black"
        style="font-family: 'ABeeZee', sans-serif;"
        wire:submit.prevent="save"
        >
        @csrf
        <div class="space-y-12">
            <div class="w-full flex justify-center">
                <p class="text-2xl font-bold">
                    Choose a Sequel/prequel to a Game
                </p>
            </div>
            <div class="flex gap-10">
                <div class="flex-1">
                    <label for="sequel" class="block mb-2 text-sm font-medium text-gray-900">Select a sequel</label>
                    <select id="sequel" name="sequel" wire:model="sequel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose a country</option>
                        @foreach($games as $game)
                            <option value="{{ $game->id }}"> {{$game->name}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="prequel" class="block mb-2 text-sm font-medium text-gray-900">Select a prequel</label>
                    <select id="prequel" name="prequel" wire:model="prequel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose a country</option>
                        @foreach($games as $game)
                            <option value="{{ $game->id }}"> {{$game->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full">
                <button type="submit" class="rounded-md w-full bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</div>
