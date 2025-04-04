<?php

namespace App\Livewire;

use App\Models\Products;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddProductForm extends Component
{
    use WithFileUploads;
    
    public $product_name = '';

    public $product_price = '';

    public $product_description = '';

    public $product_image = '';

    public $category_id;

    public $all_categories;

    public function mount(){
        $this->all_categories = Category::all();
    }

    public function save(){
        $this->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'category_id' => 'required',
            'product_description' => 'required|string|max:500',
            'product_image' => 'image|required|mimes:jpeg,jpg,png|max:2048', // 2MB Max
        ]);

        $imagePath = $this->product_image->store('/images');

        $product = new Products();
        $product->name = $this->product_name;
        $product->price = $this->product_price;
        $product->description = $this->product_description;
        $product->image = $imagePath;
        $product->category_id = $this->category_id;
        $product->save();

        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        return view('livewire.add-product-form')
        ->layout('admin-layout')->title('Pup Paw Shop | Panel de Administracion | Agregar Producto');
    }
}
