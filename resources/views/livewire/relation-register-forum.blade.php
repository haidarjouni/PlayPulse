<div>
    <form
        class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-black"
        style="font-family: 'ABeeZee', sans-serif;"
        wire:submit.prevent="save">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="font-bold text-center text-4xl">Enter Character Data</h1>
                <!-- Game Selection -->
                <div>
                    <label for="games" class="block mb-2 text-sm font-medium">Game Name</label>
                    <select id="games" name="selected_game" wire:model="selected_game" class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">
                        <option value="">Select a game</option>
                        @foreach($games as $game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_game') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- Character Selection -->
                <div>
                    <label for="characters" class="block mb-2 text-sm font-medium">Character</label>
                    <select id="characters" name="selected_character" wire:model="selected_character" class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">
                        <option value="">Select a character</option>
                        @foreach($characters as $character)
                            <option value="{{ $character->id }}">{{ $character->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_character') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- Voice Actor Selection -->
                <div>
                    <label for="voice_actors" class="block mb-2 text-sm font-medium">Voice Actor</label>
                    <select id="voice_actors" name="selected_voice_actor" wire:model="selected_voice_actor" class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">
                        <option value="">Select a voice actor</option>
                        @foreach($voice_actors as $voice_actor)
                            <option value="{{ $voice_actor->id }}">{{ $voice_actor->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_voice_actor') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- Role Selection -->
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium">Role</label>
                    <select id="role" name="selected_role" wire:model="selected_role" class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">
                        <option value="">Select a role</option>
                        <option value="Main Character">Main Character</option>
                        <option value="Side Character">Side Character</option>
                    </select>
                    @error('selected_role') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-white font-semibold hover:bg-indigo-500">
                Save
            </button>
        </div>
    </form>
</div>
