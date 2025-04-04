<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard')->layout('admin-layout')->title('Pup Paw Shop | Panel de Administración');
    }
}
