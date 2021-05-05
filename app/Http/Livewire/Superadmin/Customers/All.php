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
    public $contact;
    public $gst, $c_id, $oc_id;
    public $company;
    public $event;
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
        ]);
        $customer = new customer();
        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->contact = $this->contact;
        $customer->email = $this->email;
        $customer->company = $this->company;

        $customer->gstid = $this->gst;
        $customer->save();
        $this->emit('addmod');
        $this->dispatchBrowserEvent('form-submitted', ['msg' => 'Customer Created successfully']);

        $this->resetForm();
        return back();
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
        $this->gst = $customer->gstid;
        $this->emit('editmod');
    }





    public function update($id)
    {
        if ($this->oc_id !== $id) {
            abort(403, 'Stop The Experiment');
        }

        $customer = customer::findorfail($id);

        $customer->name = $this->name;
        $customer->address = $this->address;
        $customer->contact = $this->contact;
        $customer->email = $this->email;
        $customer->company = $this->company;

        $customer->gstid = $this->gst;
        $customer->save();
        $this->emit('editmod');
        $this->emitSelf('reviewSectionRefresh');

        $this->resetForm();
        return back();
    }

    public function delete($id)
    {
        customer::findorFail($id)->delete();
        return redirect()->to('/customer');
    }
    // public function paginationView()
    // {
    //     return 'vendor/livewire/custom-pagination-links-view';
    // }

    public function render()
    {
        $data=customer::latest()->paginate();
        return view('livewire.superadmin.customers.all',compact('data'));
    }
}
