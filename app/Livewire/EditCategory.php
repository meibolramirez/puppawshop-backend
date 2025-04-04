<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class EditCategory extends Component
{
    public $category_name = '';
    public $category;

    public function mount($id){
        $this->category = Category::find($id);
        $this->category_name = $this->category->name;
    }

    public function update(){
        $this->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $this->category->update([
            'name' => $this->category_name,
        ]);

        return $this->redirect('/manage/categories', navigate: true);

    }

    public function render()
    {
        return view('livewire.edit-category')->layout('admin-layout')->title('Pup Paw Shop | Panel de administración | Editar categoría');
    }
}
