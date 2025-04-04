<section class="bg-white">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-[#6C584C]">Editar categoría</h2>
      <form wire:submit="update">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-[#6C584C]">Nombre</label>
                <input type="text" wire:model="category_name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-[#6C584C] text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Nombre de la categoría">
                @error('category_name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
        </div>
        
    <button type="submit" class="flex place-items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-[#6C584C] bg-[#ADC178] rounded-lg">
        Editar categoría
        </button>
    </form>

</section>