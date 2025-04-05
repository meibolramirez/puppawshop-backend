<div
    x-data="{ open: false }"
    class="fixed bottom-6 right-6 z-50"
    x-cloak
    x-init="$watch('open', value => { if(value) $nextTick(() => $refs.input?.focus()) })"
>
    <!-- Floating Chat Button -->
    <button
        @click="open = !open"
        class="bg-[#ADC178] text-[#F0EAD2] p-4 rounded-full shadow-lg focus:outline-none"
        aria-label="Chat"
    >
        💬
    </button>

    <!-- Chat Modal -->
    <div
        x-show="open"
        x-transition
        class="w-80 sm:w-96 mt-4 bg-white border rounded-2xl shadow-xl flex flex-col"
    >
        <!-- Header -->
        <div class="bg-[#6C584C] text-[#F0EAD2] px-4 py-2 rounded-t-2xl flex justify-between items-center">
            <span>Preguntale a nuestro Pup Paw Bot</span>
            <button @click="open = false" class="text-white hover:text-gray-200">✖</button>
        </div>

        <!-- Messages -->
        <div class="h-80 overflow-y-auto p-4 space-y-3 bg-gray-50">
            @foreach ($chatHistory as $chat)
                <div class="flex {{ $chat['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
                    <div class="flex items-end space-x-2">
                        @if ($chat['role'] !== 'user')
                            <img src="https://api.dicebear.com/9.x/bottts/svg" class="w-6 h-6 rounded-full" alt="Bot">
                        @endif
                        <div class="px-3 py-2 rounded-xl {{ $chat['role'] === 'user' ? 'bg-[#F0EAD2] text-[#6C584C]' : 'bg-gray-100 text-[6C584C]' }}">
                            {{ $chat['content'] }}
                        </div>
                        @if ($chat['role'] === 'user')
                            <img src="https://api.dicebear.com/9.x/thumbs/svg" class="w-6 h-6 rounded-full" alt="User">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Input -->
        <form wire:submit.prevent="sendMessage" class="p-4 border-t bg-white flex space-x-2">
            <input x-ref="input" type="text" wire:model="message" class="flex-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#ADC178]" placeholder="Ask something...">
            <button type="submit" class="px-3 py-2 bg-[#ADC178] text-white rounded">➤</button>
        </form>
    </div>
</div>
