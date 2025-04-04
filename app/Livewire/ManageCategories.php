<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ManageCategories extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';

    public function setSortBy($sortColum){
        
        if ($this->sortBy == $sortColum) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        
        $this->sortBy = $sortColum;
        $this->sortDir = 'ASC';
    }

    public function delete($id){
        $category = Category::find($id);

        $category->delete();

        return $this->redirect('/manage/categories', navigate: true);
    }


    public function render()
    {   
        
        return view('livewire.manage-categories',[
            'categories' => Category::search($this->search)
            ->orderBy($this->sortBy,$this->sortDir)
            ->paginate($this->perPage)
        ])
        ->layout('admin-layout')->title('Pup Paw Shop | Panel de Administracion | Categorias');
    }
}