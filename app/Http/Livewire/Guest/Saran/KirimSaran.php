<?php

namespace App\Http\Livewire\Guest\Saran;

use App\Models\Saran;
use Livewire\Component;

class KirimSaran extends Component
{
    public $subjek, $pengirim, $email, $isi;

    public function render()
    {
        return view('livewire.guest.saran')->layout('layouts.base');
    }

    public function resetFields()
    {
        $this->subjek = '';
        $this->pengirim = '';
        $this->email = '';
        $this->isi = '';
    }

    public function store()
    {
        $this->validate();
        $saran = Saran::create([
            'subjek' => $this->subjek,
            'pengirim' => $this->pengirim,
            'email' => $this->email,
            'isi' => $this->isi,
        ]);
        $this->alert('success', 'Saran berhasil terkirim!', [
            'position' =>  'center',
            'timer' =>  90000,
            'toast' =>  false,
            'text' =>  '',
            'confirmButtonText' =>  'OK',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  true,
        ]);
        $this->resetFields();
    }

    public function rules()
    {
        return [
            'subjek' => 'string|required',
            'pengirim' => 'string|nullable',
            'email' => 'email:rfc|nullable',
            'isi' => 'string|required',
        ];
    }
}
