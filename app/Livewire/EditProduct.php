<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;
use App\Models\Category;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product_name = '';
    public $product_price = '';
    public $product_description = '';
    public $product_image = '';
    public $category_id;
    public $all_categories;
    public $product_details;

    public function mount($id){
        $this->product_details = Products::find($id);
        $this->product_name = $this->product_details->name;
        $this->product_price = $this->product_details->price;
        $this->product_description = $this->product_details->description;
        $this->product_image = $this->product_details->image;
        $this->category_id = $this->product_details->category_id;
        $this->all_categories = Category::all();
    }

    public function update(){
        //validations
        $this->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'product_description' => 'required|string|max:500',
            'product_image' => 'nullable|image|max:2048',
        ]);
        //check if image is uploaded
        if ($this->product_image && !is_string($this->product_image)) {
            $imagePath = $this->product_image->store('/images');
        } else {
            $imagePath = $this->product_image; //old image
        }

        $this->product_details->update([
            'name' => $this->product_name,
            'price' => $this->product_price,
            'description' => $this->product_description,
            'image' => $imagePath,
            'category_id' => $this->category_id,
        ]);

        return $this->redirect('/products', navigate: true);

    }

    public function render()
    {
        return view('livewire.edit-product')->layout('admin-layout')->title('Pup Paw Shop | Panel de Administracion | Editar Producto');
    }
}
