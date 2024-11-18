<x-app-layout>
    <x-slot:title>
        Register Page
    </x-slot:title>
    <div class="w-full h-[100vh] bg-gray-200 flex items-center justify-center">
        <div class="flex flex-col justify-center px-6 py-12 lg:px-8 min-w-[400px] bg-white rounded-xl shadow-2xl h-fit">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto rounded-lg h-[80px] w-auto" src="{{asset("images/logo.png")}}" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <livewire:register-forum>
                </livewire:register-forum>
            </div>
        </div>
    </div>
</x-app-layout>
