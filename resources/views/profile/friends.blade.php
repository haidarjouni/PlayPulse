<x-profile-layout :user="$user" :followings="$followings" :followers="$followers">
    <div class="h-10"></div>
    <div class="w-[1000px] mx-auto px-5 flex gap-10" x-data="{ currentTab: 'following' }">
        <div class="text-sm">
            <p class="text-gray-400 mb-[8px]">
                Social
            </p>
            <ul class="ml-1" >
                <li @click="currentTab = 'following'" :class="{ 'text-gray-800 font-bold': currentTab === 'following', 'text-gray-400': currentTab !== 'following' }" class="px-[10px] pb-[8px] hover:cursor-pointer">
                    Following
                </li>
                <li @click="currentTab = 'followers'" :class="{ 'text-gray-800 font-bold': currentTab === 'followers', 'text-gray-400': currentTab !== 'followers' }" class="px-[10px] py-[8px] hover:cursor-pointer">
                    Followers
                </li>
                <li @click="currentTab = 'forum_threads'" :class="{ 'text-gray-800 font-bold': currentTab === 'forum_threads', 'text-gray-400': currentTab !== 'forum_threads' }" class="px-[10px] py-[8px] hover:cursor-pointer ">
                    Forum Threads
                </li>
                <li @click="currentTab = 'forum_comments'" :class="{ 'text-gray-800 font-bold': currentTab === 'forum_comments', 'text-gray-400': currentTab !== 'forum_comments' }" class="px-[10px] py-[8px] hover:cursor-pointer ">
                    Forum Comments
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="mt-4">
            <div x-show="currentTab === 'following'" class="text-gray-800 flex gap-5 flex-wrap" x-cloak>
                @if($followings->isEmpty())
                    You Haven't Followed Any One
                @endif
                    @foreach($followings as $following)
                        <a href="{{route('profile', ['name'=> $following->followable->name])}}" class="z-50">
                            <div class="relative overflow-hidden rounded-md hover:cursor-pointer" x-data="{ isOpen: false }" @mouseover="isOpen = true" @mouseleave="isOpen = false">
                                   <image src="{{ Storage::url($following->followable->profile_image) }}" class="w-[80px] h-[80px] shadow-xl z-50 object-cover" />
                                <div class="absolute inset-0 bg-black bg-opacity-40 text-center text-xs  text-white flex justify-center items-end " x-show="isOpen" x-transition x-cloak>
                                    <p class="pb-2 font-bold">
                                        {{ $following->followable->name }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
            </div>
            <div x-show="currentTab === 'followers'" class="text-gray-800 flex gap-5 flex-wrap" x-cloak>
                @if($followers->isEmpty())
                    You Haven't Followed Any One
                @endif
                @foreach($followers as $follower)
                    <a href="{{route('profile', ['name'=> $follower->name])}}" class="z-50">
                        <div class="relative overflow-hidden rounded-md hover:cursor-pointer" x-data="{ isOpen: false }" @mouseover="isOpen = true" @mouseleave="isOpen = false">
                            <image src="{{ Storage::url($follower->profile_image) }}" class="w-[80px] h-[80px] shadow-xl z-50 object-cover" />
                            <div class="absolute inset-0 bg-black bg-opacity-40 text-center text-xs  text-white flex justify-center  items-end " x-show="isOpen" x-transition x-cloak>
                                <p class="pb-2 font-bold">
                                    {{ $follower->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div x-show="currentTab === 'forum_threads'" class="text-gray-800" x-cloak>
                Showing Forum Threads Content
            </div>
            <div x-show="currentTab === 'forum_comments'" class="text-gray-800" x-cloak>
                Showing Forum Comments Content
            </div>
        </div>
    </div>
</x-profile-layout>
