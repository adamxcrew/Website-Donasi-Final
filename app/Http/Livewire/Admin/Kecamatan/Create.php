<?php

namespace App\Http\Livewire\Admin\Kecamatan;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Livewire\Component;

class Create extends Component
{
    public Kecamatan $kecamatan;

    public array $listsForFields = [];

    public function mount(Kecamatan $kecamatan)
    {
        $this->kecamatan = $kecamatan;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.kecamatan.create');
    }

    public function submit()
    {
        $this->validate();

        $this->kecamatan->save();

        return redirect()->route('admin.kecamatan.index');
    }

    protected function rules(): array
    {
        return [
            'kecamatan.kabupaten_id' => [
                'integer',
                'exists:kabupatens,id',
                'required',
            ],
            'kecamatan.nama' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['kabupaten'] = Kabupaten::pluck('nama', 'id')->toArray();
    }
}
