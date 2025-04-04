<header class="bg-white shadow-md">
  <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      
    <div class="flex flex-row gap-2 items-center mr-5">
          <a href="/">  
            <div class="bg-[#6C584C] flex justify-center w-12 h-12 md:w-14 md:h-14 lg:w-12 lg:h-12 p-2 rounded-full">
                  <img src="{{Storage::url('auth/logo.png')}}"  alt="logo">
              </div>
          </a>
            <div class="hidden lg:block">
                <h1 class="text-xl font-semibold text-[#6C584C]">Pup Paw Shop</h1>
            </div>
        </div>

      <div class="hidden md:block">
        <nav aria-label="Global">
          <ul class="flex items-center gap-10 text-md">
            <li>
              <a wire:navigate href='/all/products' class="uppercase font-bold text-[#A98467] hover:text-[#6C584C]" href="#"> Productos </a>
            </li>

            <li>
              <a class="uppercase font-bold text-[#A98467] hover:text-[#6C584C]" href="#"> Categorías </a>
            </li>

          </ul>
        </nav>
      </div>

      <div class="flex items-center gap-4">
        <div class="sm:flex sm:gap-4">
          @if(auth()->check())
          <livewire:shopping-cart-icon />
          
          <a href="/auth/logout">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6C584C" class="size-6 inline-block ml-5">
              <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
            </svg>

          </a>    
          @else
            <a
              class="rounded-md bg-[#ADC178] px-5 py-2.5 text-sm font-medium text-[#6C584C] hover:text-[#A98467] shadow-sm"
              href="/auth/login"
            >
              Inicia Sesión
            </a>
          @endif
          
      </div>
    </div>

  </div>
</header>