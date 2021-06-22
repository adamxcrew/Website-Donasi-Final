<?php

namespace App\Http\Livewire\Guest\FormDonasi;

use Livewire\Component;
use App\Models\Donasi;
use App\Models\ProgramDonasi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FormDonasi extends Component
{
    public $kode_donasi, $program_donasi_id, $nama_donatur, $email_donatur, $rekening, $atas_nama, $nominal, $pesan, $programDonasi;
    public $step = 1;

    public function mount(ProgramDonasi $programDonasi)
    {
        $this->program_donasi_id = $programDonasi->id;
        $this->programDonasi = $programDonasi;
    }


    public function submit()
    {
        $this->validate();

        $this->kode_donasi = 'DN-'.substr(sha1(time()), 0, 6);

        $temp = Donasi::create([
            'program_donasi_id' => $this->programDonasi->id,
            'nama_donatur' => $this->nama_donatur,
            'email_donatur' => $this->email_donatur,
            'rekening' => $this->rekening,
            'atas_nama' => $this->atas_nama,
            'nominal' => $this->nominal,
            'pesan' => $this->pesan,
            'kode_donasi' => $this->kode_donasi,
        ]);


        $this->alert('success', 'Donasi Berhasil!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'OK',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  true,
        ]);
        $this->step = $this->step + 1;
    }

    protected function rules(): array
    {
        return [
            'program_donasi_id' => [
                'integer',
                'exists:program_donasis,id',
                'required',
            ],
            'nama_donatur' => [
                'string',
                'nullable',
            ],
            'email_donatur' => [
                'email:rfc',
                'nullable',
            ],
            'rekening' => [
                'string',
                'required',
            ],
            'atas_nama' => [
                'string',
                'required',
            ],
            'nominal' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'pesan' => [
                'string',
                'nullable',
            ],
        ];
    }

    public function close()
    {
        return redirect()->route('index');
    }

    public function back(){
        --$this->step;
    }

    public function next(){
        $this->step = $this->step + 1;
    }

    public function render()
    {
        return view('livewire.guest.form-donasi')->layout('layouts.base');
    }

}
