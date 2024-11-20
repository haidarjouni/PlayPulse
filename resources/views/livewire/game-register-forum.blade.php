<form wire:submit.prevent="save" class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-white" style="font-family: 'ABeeZee', sans-serif;">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h1 class="text-black font-bold text-center text-4xl">
                This is where you enter games
            </h1>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Game Name</label>
                    <div class="mt-2">
                        <input id="name" wire:model.blur="name" name="name" type="text"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" wire:model="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                    </div>
                </div>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Upload file</label>
                <input wire:model="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="logo" type="file">
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">More Game Details</h2>
            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="duration_main_mission" class="block mb-2 text-sm font-medium text-gray-900">Duration Main Mission</label>
                    <input wire:model="duration" type="number" id="duration" name="duration" step="1" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  />
                </div>

                <div class="sm:col-span-3">
                    <label for="status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                    <div class="mt-2">
                        <select wire:model="status" id="status" name="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                            <option value="Released">Released</option>
                            <option value="Under Development">Under Development</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <div class="sm:col-span-1">
                        <label for="source" class="block text-sm/6 font-medium text-gray-900">Source</label>
                        <div class="mt-2">
                            <input id="source" wire:model.blur="source" name="source" type="text"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Development Date</label>
                        <input type="text" id="dev_date" wire:model="dev_date" wire:model.defer="start_date" class="block text-black w-full mt-1 p-2 border rounded-md" />
                    </div>

                    <div class="mt-4">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">released Date</label>
                        <input type="text" id="released_date"  wire:model="release_date" class="block text-black w-full mt-1 p-2 border rounded-md" />
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
        @push('scripts')
            <script>
                var picker = new Pikaday({
                    field: document.getElementById('dev_date'),
                    onSelect: function(date) {
                        // Update Livewire model with selected date
                        @this.set('dev_date', date.toISOString().split('T')[0]); // Send date in YYYY-MM-DD format
                    }
                });
                var picker = new Pikaday({
                    field: document.getElementById('released_date'),
                    onSelect: function(date) {
                        // Update Livewire model with selected date
                        @this.set('release_date', date.toISOString().split('T')[0]); // Send date in YYYY-MM-DD format
                    }
                });
            </script>
        @endpush
</form>
