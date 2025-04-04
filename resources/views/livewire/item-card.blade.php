<div class="bg-gray-100 shadow-sm rounded-lg hover:border border-[#ADC178] p-1">
    <a wire:navigate href="/product/{{$product->id}}/details">
        <div>
            <img src="{{ $product->image ? Storage::url($product->image) : Storage::url('auth/placeholder-image.jpg') }}" alt="product-images" class="rounded-t-lg object-cover w-full h-[400px]">
        </div>
        <div>
            <h2 class="line-clamp-1 px-3 mt-1 text-xl text-[#6C584C]">{{ $product->name }}</h2>
            <h2 class="line-clamp-2 px-3 text-gray-500">{{ $product->description }}</h2>
            <div class="flex justify-between px-3 py-2 m-1">
                <div class="bg-[#A98467] text-[#F0EAD2] p-1 rounded-md">
                    <h2 class="text-sm">{{ $product->category->name }}</h2>
                </div>
                <h2 class="text-1xl font-medium text-[#6C584C]">${{ $product->price }}</h2>
            </div>
            @if (auth()->check())
            <a wire:click.prevent="addToCart({{ $product->id }})" href="#">
                <div class="flex gap-2 justify-center w-full rounded bg-[#ADC178] px-12 py-2 text-sm font-medium text-[#6C584C] text-center shadow active:bg-[#ADC178] sm:w-auto">
                    <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full" role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                    </svg>
                    <span>Agregar al carrito</span>
                </div>
            </a>
            @else
                <a wire:navigate href='/auth/login'>
                    <div class="flex gap-2 justify-center w-full rounded bg-[#ADC178] px-12 py-2 text-sm font-medium text-[#6C584C] text-center shadow active:bg-[#ADC178] sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                        </svg>
                        <span>Agregar al carrito</span>
                    </div>
                </a>
            @endif
        </div>
    </a>
</div>