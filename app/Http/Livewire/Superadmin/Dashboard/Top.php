<?php

namespace App\Http\Livewire\Superadmin\Dashboard;

use Livewire\Component;

class Top extends Component
{  public $active=true;
    public function render()
    {
        return view('livewire.superadmin.dashboard.top');
    }
}
