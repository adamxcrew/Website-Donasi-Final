<?php

namespace App\Http\Livewire\Relawan\Donasi;

use App\Models\Donasi;
use App\Models\ProgramDonasi;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public Donasi $donasi;
    public $kode_donasi;

    public array $listsForFields = [];

    public function mount(Donasi $donasi)
    {
        $this->donasi = $donasi;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.relawan.donasi.create');
    }

    public function submit()
    {
        $this->validate();

        $this->kode_donasi = 'DN-'.substr(sha1(time()), 0, 6);
        $this->donasi->kode_donasi = $this->kode_donasi;
        $this->donasi->save();

        return redirect()->route('relawan.donasi.index');
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
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['program_donasi'] = ProgramDonasi::where('user_id', Auth::id())->pluck('judul', 'id')->toArray();
    }
}
