<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Validate;

class AddCategory extends Component
{
    public $category_name = '';
    public $pageTitle = '';

    public function save(){
        $this->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $category = new Category();
        $category->name = $this->category_name;
        $category->save();

        return $this->redirect('/manage/categories', navigate: true);

    }    

    public function render()
    {
        return view('livewire.add-category')->layout('admin-layout')->title('Pup Paw Shop | Administración | Agregar Categoría');
    }
}
