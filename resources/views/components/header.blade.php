    <div class="top-0 absolute w-full  text-white z-10 bg-[#2a2d41] {{ Route::currentRouteName() == "home" ? 'bg-opacity-100' : 'bg-opacity-70 hover:bg-opacity-100 shadow-xl' }} transition-all ease-in-out duration-500">
        <nav class="flex items-center justify-between p-2 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-12 w-auto rounded-md" src="{{asset("images/logo.png")}}" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-white">Home</a>
                <a href="{{route('game.index')}}" class="text-sm/6 font-semibold text-white">Game List</a>
                <a href="{{route('character.index')}}" class="text-sm/6 font-semibold text-white">Character List</a>
                @auth
                    <a href="{{route("profile", ['name' => Auth::user()->name] )}}" class="text-sm/6 font-semibold text-white">Profile</a>
                    @if(Auth::user()->isAdmin())
                        <div class="inline-block relative" x-data="{open:false}" @mouseover="open = true" @mouseleave="open = false">
                            <p class="text-sm/6 font-semibold text-white hover:cursor-pointer">
                                Admin Pages
                            </p>
                            <div class="absolute " x-show="open">
                                <a href="{{ route('game.register') }}" class="text-sm/6 font-semibold text-white">Enter Games</a>

                                <a href="{{ route('character.register') }}" class="text-sm/6 font-semibold text-white">Enter Character</a>

                                <a href="{{ route('voice-actor.register') }}" class="text-sm/6 font-semibold text-white">Enter Voice Actor</a>

                                <a href="{{ route('relation.register') }}" class="text-sm/6 font-semibold text-white">Dunno wat to call this</a>
                            </div>
                        </div>
                    @endif

                @endauth
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="{{ route("login-page") }}" class="text-sm/6 font-semibold text-white">Log in <span aria-hidden="true"></span></a>
                <span class="mx-5">
                            OR
                       </span>
                <a href="{{ route("register-page") }}" class="text-sm/6 font-semibold text-white">Register <span aria-hidden="true">&rarr;</span></a>

                <span class="mx-5">
                            OR
                   </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm/6 font-semibold text-white">logout <span aria-hidden="true">&rarr;</span></button>
                </form>

            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Home</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Profile</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Game List</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-gray-50">Browse</a>
                        </div>
                        <div class="py-6">
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-white hover:bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
