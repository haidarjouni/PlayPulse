<div>
    <form class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-white" style="font-family: 'ABeeZee', sans-serif;" wire:submit="save">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-black font-bold text-center text-4xl" >
                    this is where u enter characters
                </h1>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Voice Actor Name</label>
                        <div class="mt-2">
                            <input id="name" wire:model="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
                        </div>
                        @error('name') <span class="text-red-500 font-bold mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Upload file</label>
                    <input wire:model="profile_img" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " id="logo" type="file">
                </div>
                <div class="sm:col-span-3 mt-10">
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 ">Age</label>
                    <input wire:model="age" type="number" id="age" name="age" min="1" step="1" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  />
                    @error('age') <span class="text-red-500 font-bold mt-2">{{ $message }}</span> @enderror
                </div>
                <div class="mt-10">
                    <select wire:model="gender" id="gender" name="gender" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm/6">
                        <option  selected disabled>gender</option>
                        <option value="1">male</option>
                        <option value="0">female</option>
                    </select>
                    @error('age') <span class="text-red-500 font-bold mt-2">{{ $message }}</span> @enderror
                </div>
            </div>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>

</div>
