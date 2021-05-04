<?php

namespace App\Http\Livewire\Superadmin\Users;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Livewire\Component;

class All extends Component
{
    public $users, $roles, $u_id, $logs = [];
    public $password, $password_confirmation, $status,$active;


    public function changepass($id)
    {
        $this->u_id = $id;

        $this->emit('editmod');
    }

//Delete User
    public function delete($id)
    {
        User::findorfail($id)->delete();
        return redirect('/users');
    }
//funtion for changing password
    public function change()
    {
        if ($this->password == $this->password_confirmation) {
            $user = User::findorfail($this->u_id);
            $user->password = Hash::make($this->password);
            $user->save();
            $this->emit('editmod');
        } else {
        }
    }


    // Active status change
    public function changestat($id)
    {

        $user = User::findorfail($id);
        $user->is_active=($user->is_active)? false:true;
        $user->save();

    }
    public function render()
    {
         $this->roles = Role::all();
        $this->users = User::with('roles')->get();
        return view('livewire.superadmin.users.all');
    }
}
