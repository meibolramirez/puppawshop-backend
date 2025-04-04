<!-- Table Section -->
<div>
	<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
		<!-- Card -->
		<div class="flex flex-col">
		  <div class="-m-1.5 overflow-x-auto">
			<div class="p-1.5 min-w-full inline-block align-middle">
			  <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
				<!-- Header -->
				<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
				  <div>
					<h2 class="text-xl font-semibold text-[#6C584C]">
					  Productos
					</h2>
					<p class="text-sm text-[#6C584C]">
					  Manejo de productos
					</p>
				  </div>
	  
					<div class="inline-flex gap-x-2">
					<div class="max-w-md space-y-3">
						<input type="search" wire:model.live.debounce.300="search" class="peer py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Buscar productos">
					</div>
	  
					  <a wire:navigate class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-[#ADC178] text-[#6C584C]  disabled:opacity-50 disabled:pointer-events-none" href="/add/product">
						<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
						Agregar Producto
					  </a>
					</div>
				  </div>
				<!-- End Header -->
	  
				<!-- Table -->
				<table class="min-w-full divide-y divide-gray-200">
				  <thead class="bg-gray-50  px-5">
					<tr>
	  
					  @include('livewire.theaders.th',[
						'name' => 'name',
						'columnName' => 'Product Name',
					  ])
	  
					  @include('livewire.theaders.th',[
						'name' => 'description', //column name from db
						'columnName' => 'Description', //display name
					  ])
	  
					  @include('livewire.theaders.th',[
						'name' => 'price', //column name from db
						'columnName' => 'Price', //display name
					  ])
	  
					  @include('livewire.theaders.th',[
					  'name' => 'category_id', //column name from db
					  'columnName' => 'Category', //display name
					  ])
	  
					  @include('livewire.theaders.th',[
						'name' => 'created_at', //column name from db
						'columnName' => 'Created', //display name
					  ])
					  <th scope="col" class="px-6 py-3 text-end"></th>
					  <th scope="col" class="px-6 py-3 text-end"></th>
					</tr>
				  </thead>
	  
				  <tbody class="divide-y divide-gray-200">
					  @if (count($products) > 0)
						  @foreach ($products as $product)
						  <tr wire:key="{{$product->id}}">
							  <td class="size-px  px-5">
								<div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
								  <a wire:navigate href="">
									  <div class="flex items-center gap-x-3">
										  <img class="inline-block size-[60px] rounded-md" src="{{ Storage::url($product->image) }}" alt="Imagen del producto">
										  <div class="flex">
											  <span class="flex text-sm font-semibold text-gray-800">{{str($product->name)->words(5)}}</span>
										  </div>
									  </div>
								  </a>
	  
								</div>
							  </td>
							  <td >
								<div class="px-6 py-3">
								  <span class="block text-sm  text-gray-800">{{ str($product->description)->words(8)}}</span>
								</div>
							  </td>
							  <td class="size-px whitespace-nowrap">
								<div class="px-6 py-3">
								  <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium">
									${{$product->price}}
								  </span>
								</div>
							  </td>
							  <td class="size-px whitespace-nowrap">
								  <div class="px-6 py-3">
									  <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
										  {{$product->category->name}}
									  </span>
								  </div>
								</td>
							  <td class="size-px whitespace-nowrap">
								<div class="px-6 py-3">
								  <span class="text-sm text-gray-500">{{ date('D M Y, H:i',strtotime($product->created_at))}}</span>
								</div>
							  </td>
							  <td class="size-px whitespace-nowrap">
								<div class="px-6 py-1.5">
								  <a wire:navigate class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium" href="/edit/{{$product->id}}/product">
									Editar
								  </a>
								</div>
							  </td>
							  <td class="size-px whitespace-nowrap">
								<div class="px-6 py-1.5">
								  <a wire:navigate wire:click="delete({{$product->id}})" wire:confirm="Confirmas la eliminación del producto: {{$product->name}}" class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium" href="">
									Eliminar
								  </a>
								</div>
							  </td>
							</tr>
						  @endforeach
					        @else
						  <tr>
							  <td class="size-px whitespace-nowrap" colspan="5">
								  <div class="px-6 py-3">
									<span class="py-1 px-1.5 flex justify-center items-center gap-x-1 text-xs font-medium bg-red-200 text-red-800 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                    </svg>
									  No se han encontrado productos
									</span>
								  </div>
								</td>
						  </tr>
					  @endif
				  </tbody>
				</table>
				<!-- End Table -->
	  
				<!-- Footer -->
				<div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
				  <div class="flex gap-2">
					<label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
					  <select wire:model.live='perPage'
						  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
						  <option value="5">5</option>
						  <option value="7">10</option>
						  <option value="20">20</option>
						  <option value="50">50</option>
						  <option value="100">100</option>
					  </select>
				  </div>
				  <!-- the links to different pages -->
				  <div>
				  {{ $products->links()}}
				  </div>
				  
				</div>
				<!-- End Footer -->
			  </div>
			</div>
		  </div>
		</div>
		<!-- End Card -->
	  </div>
</div>

<!-- End Table Section -->