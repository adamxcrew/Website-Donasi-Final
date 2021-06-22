<?php

namespace App\Http\Livewire\Admin\Kelurahan;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Livewire\Component;

class Create extends Component
{
    public Kelurahan $kelurahan;

    public array $listsForFields = [];

    public function mount(Kelurahan $kelurahan)
    {
        $this->kelurahan = $kelurahan;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.kelurahan.create');
    }

    public function submit()
    {
        $this->validate();

        $this->kelurahan->save();

        return redirect()->route('admin.kelurahan.index');
    }

    protected function rules(): array
    {
        return [
            'kelurahan.kecamatan_id' => [
                'integer',
                'exists:kecamatans,id',
                'required',
            ],
            'kelurahan.nama' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['kecamatan'] = Kecamatan::pluck('nama', 'id')->toArray();
    }
}
