<div>
    <div class="flex gap-5 p-20 justify-center">
        <img src="{{ $product->image ? Storage::url($product->image) : asset('images/placeholder-image.jpg') }}" alt="product-images" class="rounded-lg object-cover w-[400px] h-[380px]">
        
        <div class="content-around">
            <h2 class="p-1 font-medium text-2xl line-clamp-2 text-[#6C584C]">{{ $product->name }}</h2>
            <h2 class="p-1  text-[#A98467] line-clamp-4 mt-5">{{ $product->description }}</h2>
            <div class="flex gap-10 mt-5 justify-between">
                <div class="bg-[#A98467] p-1 rounded-md">
                    <h2 class="text-sm text-[#F0EAD2]">{{ $product->category->name }}</h2>
                </div>
                <h2 class="text-2xl font-medium text-[#6C584C]">${{ $product->price }}</h2>
            </div>
            <div class="my-3 mt-15">
                @if (auth()->check())
                <a wire:click.prevent="addToCart({{ $product->id }})" href="#">
                    <div class="flex gap-2 justify-center w-full rounded bg-[#ADC178] px-12 py-2 text-sm font-medium text-[#6C584C] text-center shadow active:bg-[#ADC178] sm:w-auto mt-10">
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
                        <div class="flex gap-2 justify-center w-full rounded bg-[#ADC178] px-12 py-2 text-sm font-medium text-[#6C584C] text-center shadow active:bg-[#ADC178] sm:w-auto mt-10">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                            <span>Agregar al carrito</span>
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="my-5 px-20 pt-5">
        <h2 class="text-2xl font-medium text-[#6C584C] mb-3">Productos relacionados</h2>
        <livewire:product-listing :category_id="$product->category_id" :current_product_id="$product->id"/>
    </div>
</div>