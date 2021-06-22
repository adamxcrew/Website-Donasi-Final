<?php

namespace App\Http\Livewire\Relawan\Rekening;

use Illuminate\Support\Facades\Auth;
use App\Models\Bank;
use App\Models\Rekening;
use Livewire\Component;

class Create extends Component
{
    public Rekening $rekening;
    public $uid;
    public array $listsForFields = [];

    public function mount(Rekening $rekening)
    {
        $this->rekening = $rekening;
        $this->uid = Auth::user()->id;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.relawan.rekening.create');
    }

    public function submit()
    {
        $this->validate();
        $this->rekening->user_id = $this->uid;
        $this->rekening->save();

        return redirect()->route('relawan.rekening.index');
    }

    protected function rules(): array
    {
        return [
            'rekening.bank_id' => [
                'integer',
                'exists:banks,id',
                'required',
            ],
            'rekening.atas_nama' => [
                'string',
                'required',
            ],
            'rekening.nomor_rekening' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['bank'] = Bank::pluck('nama', 'id')->toArray();
    }
}
