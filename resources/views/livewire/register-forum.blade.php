<form class="space-y-4 md:space-y-6" wire:submit="save">
    @csrf
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
        <input type="email" wire:model="email" name="email" id="email" class="bg-gray-50 @error('email') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
        @error('email') <span class="text-red-500 font-bold mt-2">{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
        <input type="text" wire:model="name" name="name" id="name" placeholder="enter your name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
        @error('name') <span class="text-red-500 font-bold mt-2">{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
        <input type="password" wire:model.blur="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 @error('password') border-red-500 @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
        @error('password') <span class="text-red-500 font-bold mt-2">{{ $message }}</span> @enderror
    </div>
        <label for="profile_img" class="sr-only">Choose file</label>
        <input type="file" wire:model="profile_img" name="profile_img" id="profile_img" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
            file:bg-gray-50 file:border-0
            file:me-4
            file:py-3 file:px-4">
    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black">Create an account</button>
</form>

