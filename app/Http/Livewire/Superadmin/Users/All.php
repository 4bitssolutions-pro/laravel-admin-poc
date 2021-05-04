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

    protected $rules = [
        'roles' => ['required']

    ];
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

public function changerole($id)
{
    $this->u_id = $id;
    $this->emit('changerolemodal');
}

public function changerolesubmit()
{
    $user = User::findorfail($this->u_id);
    $this->validate();
    $user->roles()->detach();

    $user->roles()->attach($this->roles);

}
    // Active status change
    public function changestat($id)
    {

        $user = User::findorfail($id);

        $user->is_active=($user->is_active)? false:true;
        if(count($user->roles) < 1){
            $user->roles()->sync(3);
        }
        $user->save();

    }
    public function render()
    {
         $this->roles = Role::all();
        $this->users = User::with('roles')->orderBy('is_active')->get();
        return view('livewire.superadmin.users.all');
    }
}
