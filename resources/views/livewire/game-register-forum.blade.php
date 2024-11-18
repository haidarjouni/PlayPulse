<form class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-white" style="font-family: 'ABeeZee', sans-serif;">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-black font-bold text-center text-4xl" >
                    this is where u enter games
                </h1>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Game Name</label>
                    <div class="mt-2">
                        <input id="name" wire:model.blur="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="description" class="block text-sm/6 font-medium text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                    </div>
                </div>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " id="logo" type="file">
            </div>

        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">More Game Detail</h2>
            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="duration_main_mission" class="block mb-2 text-sm font-medium text-gray-900 ">Duration Main Mission </label>
                    <input type="number" id="duration_main_mission" name="duration_main_mission" min="0.4" step="1" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>

                <div class="sm:col-span-3">
                    <label for="Status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                    <div class="mt-2">
                        <select id="Status" name="Status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                            <option value="">Released</option>
                            <option value="">Under Development</option>
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <div class="sm:col-span-2">
                        <label for="date_announced"  class="block text-sm/6 font-medium text-gray-900"> Date Announced  </label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input datepicker id="default-datepicker" name="date_announced" type="text" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date">
                        </div>
                    </div>
                    <div class="sm:col-span-1">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Source</label>
                        <div class="mt-2">
                            <input id="source" wire:model.blur="source" name="source" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>


                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="country" class="block text-sm/6 font-medium text-gray-900">Source</label>
                    <div class="mt-2">
                        <input id="source" wire:model.blur="source" name="source" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                    <div class="mt-2">
                        <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                            <!-- filled by another query -->
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="country" class="block text-sm/6 font-medium text-gray-900">Country</label>
                    <div class="mt-2">
                        <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                            <!-- filled by another query -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
</form>
