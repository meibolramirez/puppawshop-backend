<section class="bg-white">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900">Editar Producto</h2>
      <form wire:submit.prevent="update">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              
            <div class="sm:col-span-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre del Producto</label>
                <input type="text" wire:model="product_name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Type product name">
                @error('product_name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="w-full">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Precio</label>
                <input wire:model="product_price" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="$2999">
                @error('product_price') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Categoría</label>
                <select wire:model="category_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                    <option selected="">Seleccionar categoría</option>
                    @foreach ($all_categories as $category)
                        <option value="{{ $category->id }}" wire:key="{{ $category->id }}" {{ $product_details->$category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
              
              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                  <textarea id="description" wire:model.live="product_description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Your description here"></textarea>
                    @error('product_description') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
              </div>

            <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Imágen</label>
                <input wire:model="product_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="file_input_help" id="file_input" type="file">
                <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG o JPG</p>
                @error('product_image') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>
            
            <div class="sm:col-span-2">
                    @if ($product_image && is_string($product_image))
						<img src="{{Storage::url($product_image)}}" alt="Product image" height="300px" width="300px" class="rounded-lg">
					@elseif ($product_image)
						<img src="{{ $product_image->temporaryUrl()}}" alt="default image" height="300px" width="300px" class="rounded-lg">
					@else
                        <img src="{{Storage::url('auth/placeholder-image.jpg')}}" alt="default image" height="300px" width="300px" class="rounded-lg">
                    @endif
            </div>

        </div>
        
    <button type="submit" class="flex place-items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-[#6C584C] bg-[#ADC178] rounded-lg">
        Guardar cambios
        </button>
    </form>

</section>