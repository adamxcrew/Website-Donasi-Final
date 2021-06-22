<?php

namespace App\Http\Livewire\Admin\Donasi;

use App\Models\Donasi;
use App\Models\ProgramDonasi;
use Livewire\Component;

class Edit extends Component
{
    public Donasi $donasi;

    public array $listsForFields = [];

    public function mount(Donasi $donasi)
    {
        $this->donasi = $donasi;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.donasi.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->donasi->save();

        return redirect()->route('admin.donasi.index');
    }

    protected function rules(): array
    {
        return [
            'donasi.program_donasi_id' => [
                'integer',
                'exists:program_donasis,id',
                'required',
            ],
            'donasi.nama_donatur' => [
                'string',
                'nullable',
            ],
            'donasi.email_donatur' => [
                'email:rfc',
                'nullable',
            ],
            'donasi.rekening' => [
                'string',
                'required',
            ],
            'donasi.atas_nama' => [
                'string',
                'required',
            ],
            'donasi.nominal' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'donasi.pesan' => [
                'string',
                'nullable',
            ],
            'donasi.status_donasi' => [
                'boolean',
            ],
            'donasi.status_verifikasi' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['program_donasi'] = ProgramDonasi::pluck('judul', 'id')->toArray();
    }
}
