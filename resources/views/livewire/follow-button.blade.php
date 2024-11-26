<button
    wire:click="follow"
    x-data="{ isFollowing: @entangle('isFollowed'), isHovering: false }"
    @mouseover="isHovering = true; isFollowing = false"
    @mouseout="isHovering = false; isFollowing = true"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    {{ Auth::check() ? '' : 'disabled' }}
    >

    @if(!auth()->user()->follows($user)->exists())
        <p>Follow</p>
    @else
        <p x-show="isFollowing" x-cloak>Following</p>
        <p x-show="isHovering" x-cloak>Unfollow</p>
    @endif

</button>
