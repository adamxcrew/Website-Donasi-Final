<?php

namespace App\Http\Livewire\Admin\Rekening;

use App\Models\Bank;
use App\Models\Rekening;
use Livewire\Component;

class Edit extends Component
{
    public Rekening $rekening;

    public array $listsForFields = [];

    public function mount(Rekening $rekening)
    {
        $this->rekening = $rekening;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.rekening.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->rekening->save();

        return redirect()->route('admin.rekening.index');
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
