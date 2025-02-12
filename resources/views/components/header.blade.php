<div class="top-0 absolute w-full text-white z-10 bg-[#2a2d41] {{ Route::currentRouteName() == "home" ? 'bg-opacity-100' : 'bg-opacity-70 hover:bg-opacity-100 shadow-xl' }} transition-all ease-in-out duration-500">
    <nav class=" flex items-center justify-between lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-12 w-auto rounded-md" src="{{asset("images/logo.png")}}" alt="">
            </a>
        </div>
        <div class="flex gap-5">
            <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-white p-5">Home</a>
            <a href="{{route('game.index')}}" class="text-sm/6 font-semibold text-white p-5">Game List</a>
            <a href="{{route('character.index')}}" class="text-sm/6 font-semibold text-white p-5">Character List</a>
            @auth
                <a href="{{route("profile", ['name' => Auth::user()->name] )}}" class="text-sm/6 font-semibold text-white p-5">Profile</a>
                @if(Auth::user()->isAdmin())
                    <div class="p-5 relative" x-data="{open:false}" @mouseover="open = true" @mouseleave="open = false">
                        <p class="text-sm/6 font-semibold text-white hover:cursor-pointer">
                            Admin Pages
                        </p>
                        <div class="absolute translate-y-3.5 bg-white border rounded group-hover:block mt-1 overflow-hidden z-50 text-black min-w-[150px] w-fit  flex flex-col" x-show="open" x-cloak>
                            <a href="{{ route('game.register') }}" class="p-2 text-black hover:bg-blue-500 hover:text-white transition-all">Enter Games</a>
                            <a href="{{ route('character.register') }}" class="p-2 text-black hover:bg-blue-500 hover:text-white transition-all">Enter Character</a>
                            <a href="{{ route('voice-actor.register') }}" class="p-2 text-black hover:bg-blue-500 hover:text-white transition-all">Enter Voice Actor</a>
                            <a href="{{ route('relation.register') }}" class="p-2 text-black hover:bg-blue-500 hover:text-white transition-all">Dunno wat to call this</a>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
        <div class="lg:flex lg:flex-1 lg:justify-end">
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm/6 font-semibold text-white">logout</button>
                </form>
            @endauth
            @guest
                <div class="flex gap-10 flex-row-reverse">
                    <a href="{{ route("register-page") }}" class="text-sm/6 font-semibold text-white">Register </a>
                    <a href="{{ route("login-page") }}" class="text-sm/6 font-semibold text-white">Log in </a>
                </div>
            @endguest
        </div>
    </nav>
</div>
