<?php

namespace App\Http\Livewire\Superadmin\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
class All extends Component
{
    use WithPagination;


    public $name;
    public $email;
    public $address;
    public $contact,$aadhar;
    public $gst, $c_id, $oc_id;
    public $event,$pagesize=10,$sortby="name";
    public $search="";
    public $listeners = [
        'reviewSectionRefresh' => 'render',
    ];

    protected $paginationTheme = 'bootstrap';


    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'address' => 'required',
            'contact' => 'numeric|min:10',
            'aadhar' => 'numeric|min:10',
        ]);
        $customer = new customer();
        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->contact = $this->contact;
        $customer->email = $this->email;
        $customer->aadhar_no = $this->aadhar;

        $customer->save();
        $this->emit('addmod');
        $this->dispatchBrowserEvent('form-submitted', ['msg' => 'Customer Created successfully']);

    }

    public function edit($id)
    {

        $this->c_id = $id;
        $this->oc_id = $this->c_id;
        $customer = customer::findorfail($id);
        $this->name = $customer->name;
        $this->contact = $customer->contact;
        $this->email = $customer->email;
        $this->address = $customer->address;
        $this->aadhar = $customer->aadhar_no;

        $this->emit('editmod');

    }





    public function update($id)
    {
        dd("toot");

        if ($this->oc_id !== $id) {
            abort(403, 'Stop The Experiment');
        }

        $customer = customer::findorfail($id);

        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->contact = $this->contact;
        $customer->email = $this->email;
        $customer->aadhar_no = $this->aadhar;

        $customer->save();
        $this->emit('editmod');

        $this->resetForm();
        return back();
    }

    public function delete($id)
    {
        customer::findorFail($id)->delete();
    }


    public function render()
    {
        $data=customer::where( 'name' , 'like' , '%' . $this->search . '%' )
        ->orWhere( 'email' , 'like' , '%' . $this->search . '%' )
        ->orWhere( 'contact' , 'like' , '%' . $this->search . '%' )->orderBy($this->sortby)->paginate($this->pagesize);
        return view('livewire.superadmin.customers.all',compact('data'));
    }
}
