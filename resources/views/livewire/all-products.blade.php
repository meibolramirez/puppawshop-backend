<div class='px-10 md:px-20 sm:px-30 py-3'>
    <h2 class='font-bold text-xl my-3 text-[#6C584C] mb-10 uppercase'>Productos</h2>
    
    @php
        $all = 'all';
    @endphp
    <livewire:product-listing :category_id="$all" :current_product_id="0"/>
</div>
