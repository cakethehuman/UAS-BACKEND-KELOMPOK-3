<?php
use Livewire\Component;
new class extends Component
{
    public int $likes = 0;

    public function increment()
    {
        $this->likes++;
    }

    public function decrement()
    {
        $this->likes--;
    }
};
?>
<div class="flex items-center justify-center">
    <div class="text-center p-4 border border-2 border-mavs-navy bg-gray-800 rounded-lg">
        <h2 class="text-xl text-white mb-2">Like Our Project?</h2>
        <h2 class="text-xl text-white mb-2">{{ $likes }}</h2>
        <div class="flex justify-center gap-3">
            <button wire:click="increment" class="bg-green-500 hover:bg-green-600 text-white font-bold px-5 py-2 rounded-lg">
                Yes
            </button>
            <button wire:click="decrement" class="bg-red-500 hover:bg-red-600 text-white font-bold px-5 py-2 rounded-lg">
                No
            </button>
        </div>
    </div>
</div>
