<div>
    <form wire:submit.prevent="save" class="w-[900px] mx-auto border-2 border-black my-6 shadow-xl bg-white p-10 rounded-xl text-black">
        @csrf
        <p class="text-xl"> add a slug </p>
        <div class=" flex flex-col gap-10">
            <input type="text" wire:model="name" />
            <button type="submit"></button>
        </div>
    </form>
</div>
