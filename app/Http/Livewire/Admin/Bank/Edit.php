<?php

namespace App\Http\Livewire\Admin\Bank;

use App\Models\Bank;
use Livewire\Component;

class Edit extends Component
{
    public Bank $bank;

    public function mount(Bank $bank)
    {
        $this->bank = $bank;
    }

    public function render()
    {
        return view('livewire.admin.bank.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->bank->save();

        return redirect()->route('admin.bank.index');
    }

    protected function rules(): array
    {
        return [
            'bank.nama' => [
                'string',
                'required',
            ],
            'bank.kode_bank' => [
                'string',
                'required',
            ],
        ];
    }
}
