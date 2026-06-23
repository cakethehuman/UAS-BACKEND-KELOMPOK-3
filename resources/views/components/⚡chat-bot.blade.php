<?php
use Livewire\Component;
use App\Models\ChatMessage;
new class extends Component
{
    public string $chatId = '';

    public array $messages = [];

    public function mount()
    {
        $this->chatId = session()->get('chat_id', (string) \Illuminate\Support\Str::uuid());
        session()->put('chat_id', $this->chatId);

        if (ChatMessage::where('chat_id', $this->chatId)->count() === 0) {
            ChatMessage::create([
                'chat_id' => $this->chatId,
                'sender'  => 'CS',
                'message' => 'Hello! user, need any help?',
            ]);
        }

        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = ChatMessage::where('chat_id', $this->chatId)
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();
    }

    public function sendMessage(string $option, String $text)
    {
        ChatMessage::create([
            'chat_id' => $this->chatId,
            'sender'  => 'user',
            'message' => $text,
        ]);

        $response = match ($option) {
            '1'     => 'Go to the game page on the navigation bar then click on it',
            '2'     => 'Go to the ticket page on the navigation bar, click it, search for the game you want by filtering via month and team, select the game that popped up, select the seat you want, click buy, and confirm your purchase',
            '3'     => 'Go to Store then you can buy Items there',
            '4'     => 'Kelompok 3',
            default => 'Error!',
        };

        ChatMessage::create([
            'chat_id' => $this->chatId,
            'sender'  => 'CS',
            'message' => $response,
        ]);

        $this->loadMessages();
    }

    public function clearChat()
    {
        ChatMessage::where('chat_id', $this->chatId)->delete();
        ChatMessage::create([
            'chat_id' => $this->chatId,
            'sender'  => 'CS',
            'message' => 'Hello! user, need any help?',
        ]);
        $this->loadMessages();
    }
};
?>
<div class="flex justify-center items-center">
    <div class="flex flex-col w-[800px] h-[600px] bg-gray-900 rounded-xl overflow-hidden border-3 border-mavs-navy shadow-lg shadow-mavs-navy">
        <div class="flex-1 overflow-y-auto p-4 space-y-3" id="chat-box">
            @foreach($messages as $msg)
                <div class="flex {{ $msg['sender'] === 'user' ? 'justify-end' : 'justify-start' }}">
                    <div class="w-[40%] px-4 py-2 rounded-lg text-sm
                        {{ $msg['sender'] === 'user' ? 'bg-blue-500 text-white' : 'bg-gray-600 text-white' }}">
                        {{ $msg['message'] }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="p-4 bg-mavs-navy border-t borde-mavs-navy space-y-2">
            <div class="flex justify-center items-center">
                <h1 class="text-white"> OPTIONS</h1>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <button wire:click="sendMessage('1', 'How to view games?')"
                    class="w-full bg-gray-900 hover:bg-gray-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
                    1. How to view games?
                </button>
                <button wire:click="sendMessage('2','How to buy tickets?')"
                    class="w-full bg-gray-900 hover:bg-gray-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
                    2. How to buy tickets?
                </button>
                <button wire:click="sendMessage('3','How to buy NBA merch?')"
                    class="w-full bg-gray-900 hover:bg-gray-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
                    3. How to buy NBA merch?
                </button>
                <button wire:click="sendMessage('4','Who Made This Awsome Site?')"
                    class="w-full bg-gray-900 hover:bg-gray-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
                    4. Who Made This Awsome Site?
                </button>
            </div>
            <button wire:click="clearChat"
                    class="w-full text-white hover:bg-red-500 text-xs bg-red-600 rounded-lg">
                    Clear Chat
            </button>
        </div>
    </div>
</div>