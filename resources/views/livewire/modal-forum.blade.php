<div x-data="{ open: false }">
    <header class="w-full bg-white" style="font-family: 'ABeeZee', sans-serif;">
    <div class="flex flex-row justify-center gap-7 max-w-[1300px] h-fit mx-auto px-10">
        <div class="w-[240px] relative">
            <div class="absolute bottom-7">
                <div class="flex flex-col">
                    <image class="h-[303px] w-[230px] object-cover rounded-xl shadow-xl" src="{{ asset(Storage::url($game->profile_image)) }}"></image>
                    <div class="pt-5 gap-3 w-[230px] flex">
                        <button @click="open = !open" type="button"
                                class="min-w-[140px] bg-blue-400 p-2 rounded-md text-white flex-1">
                            {{ $user_list ? $user_list->status : 'Add to List' }}
                        </button>
                        <button type="button" wire:click="toggleFavorite" class="bg-red-500 text-white px-4 p-2 w-fit rounded-md ">
                            <i class="fa-solid fa-heart transition-all {{ $favorite_game ? 'text-red-300' : 'text-white' }}""></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{--       card     --}}
        <div class="bg-black h-svh bg-opacity-40 w-full top-0 flex justify-center items-center fixed z-50  " x-cloak x-show="open" >
            <div  class="bg-gray-100 shadow-xl w-[1000px] min-h-[600px]  rounded-md overflow-hidden"  >
                <form wire:submit.prevent="submission">
                    <div class="w-full aspect-[21/4.5] background-2 relative">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-between">
                            <div class="w-full text-right">
                                <button type="button" class="text-white px-3 py-1 mr-4  text-lg rounded-full " @click="open = !open">
                                    x
                                </button>
                            </div>
                            <div class="flex justify-between px-20">
                                <div class="flex">
                                    <div>
                                        <image src="{{Storage::url($game->profile_image)}}" class="w-[120px] h-[151px] translate-y-6 object-cover rounded-md"></image>
                                    </div>
                                    <div class="text-white flex items-end p-[20px] text-lg text-gray-200">
                                        {{ $game->name }}
                                    </div>
                                </div>
                                <div class="text-white flex gap-5 items-end mb-[20px]">
                                    <button type="button" wire:click="toggleFavorite" class="mb-1 cursor-pointer">
                                        <i class="fa-solid fa-heart transition-all {{ $favorite_game ? 'text-red-700' : 'text-white' }}"></i>
                                    </button>
                                    <button class="text-white bg-blue-400 rounded-md text-sm px-3 py-1.5">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" py-[70px] px-[50px] grid grid-cols-3 gap-y-10">
                        <div class="text-gray-500">
                            <label for="status">
                                Status
                            </label>
                            <div>
                                <select name="status" wire:model="status" class="cursor-pointer bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0">
                                    <option value=""  selected hidden>Status</option>
                                    @foreach(\App\Enums\UserGameStatus::values() as $status)
                                        <option value="{{ $status }}" {{ $status === $status ? 'selected' : '' }}>
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-gray-500">
                            <label for="score">
                                Score
                            </label>
                            <div>
                                <input name="score" wire:model="score" type="number" value="0"  class="bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0"/>
                            </div>
                        </div>
                        <div class="invisible"></div>
                        <div class="text-gray-500">
                            <label for="start_date">
                                Started Date
                            </label>
                            <div>
                                <input
                                    name="start_date" type="text" id="start_date" wire:model.defer="start_date" class="cursor-pointer bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0"/>
                            </div>
                        </div>
                        <div class="text-gray-500">
                            <label for="finish_date">
                                Finish Date
                            </label>
                            <div>
                                <input
                                    name="finish_date" type="text" id="finish_date" wire:model.defer="finish_date" class="cursor-pointer bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0"/>
                            </div>
                        </div>
                        <div class="text-gray-500">
                            Total replay
                            <div>
                                <input type="number" wire:model.defer="total_replay" class="bg-[#edf1f5] border-0 w-[220px] focus:ring-0 focus:border-0 "/>
                            </div>
                        </div>
                        <div class="text-gray-500 col-span-3">
                            <label for="">Note</label>
                            <textarea wire:model="note" class="w-full border-0 bg-[#edf1f5] focus:ring-0 rounded-md "></textarea>
                        </div>
                    </div>
                    @push('scripts')
                        <script>
                            var picker = new Pikaday({
                                field: document.getElementById('start_date'),
                                onSelect: function(date) {
                                    // Update Livewire model with selected date
                                    @this.set('start_date', date.toISOString().split('T')[0]); // YYYY-MM-DD format
                                }
                            });
                            var picker = new Pikaday({
                                field: document.getElementById('finish_date'),
                                onSelect: function(date) {
                                    // Update Livewire model with selected date
                                    @this.set('finish_date', date.toISOString().split('T')[0]); // YYYY-MM-DD format
                                }
                            });

                        </script>
                    @endpush
                </form>
            </div>
        </div>
        <div class="flex flex-col h-fit pt-5 w-[795px]">
            <div>
                <h1 class="text-2xl text-[#6d8096]" style=" font-family: 'Aldrich', sans-serif;">
                    {{ $game->name }}
                </h1>
            </div>
            <div class="py-3">
                <p class=" text-gray-700 text-md font-semibold text-left  text-wrap">
                    {{ $game->description }}
                </p>
            </div>
            <div class="w-full flex flex-row justify-evenly">
                <div class="p-[15px] hover:cursor-pointer">
                    overview
                </div>
                <div class="p-[15px] hover:cursor-pointer">
                    play
                </div>
                <div class="p-[15px] hover:cursor-pointer">
                    character
                </div>
                <div class="p-[15px] hover:cursor-pointer">
                    stats
                </div>
                <div class="p-[15px] hover:cursor-pointer">
                    staff
                </div>
                <div class="p-[15px] hover:cursor-pointer">
                    social
                </div>
            </div>
        </div>
    </div>
</header>
</div>
