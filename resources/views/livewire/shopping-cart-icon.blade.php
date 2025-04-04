<a wire:navigate href="{{ route('shopping-cart') }}" class="relative">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6C584C" class="size-6">
        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
    </svg>
    <span class="absolute top-0 right-0 inline-block w-3 h-4 place-items-center text-[#F0EAD2] bg-[#A98467] rounded-full">
        <p class="font-bold text-xs">{{ $cartCount }}</p>
    </span>
</a>