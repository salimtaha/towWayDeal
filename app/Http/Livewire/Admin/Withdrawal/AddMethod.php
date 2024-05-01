<?php

namespace App\Http\Livewire\Admin\Withdrawal;

use Livewire\Component;
use App\Models\WithdrawalMethod;

class AddMethod extends Component
{
    public $method , $description;
    public function render()
    {
        return view('livewire.admin.withdrawal.add-method');
    }

    public function addMethod()
    {
        $this->validate([
            'method' => 'required|string|unique:withdrawal_methods,name|max:30',
            'description'=>['nullable' , 'max:100'],
        ]);


        WithdrawalMethod::create([
            'name' => $this->method,
            'description' => $this->description,
        ]);
        session()->flash('success', 'تم اضافه وسيله الدفع بنجاح');


        $this->emit('addMethod');

    }
}
