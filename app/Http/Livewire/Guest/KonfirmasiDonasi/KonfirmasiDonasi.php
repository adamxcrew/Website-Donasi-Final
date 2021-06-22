<?php

namespace App\Http\Livewire\Guest\KonfirmasiDonasi;

use Livewire\Component;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class KonfirmasiDonasi extends Component
{
    use WithFileUploads;
    public $kode;
    public $donasi;
    public $exist = 0;
    public $step = 1;
    public $temp;
    public $image;
    public $path;

    public function updatedKode($kode)
    {
        $this->kode = $kode;
    }

    public function cekKode(){
        if (DB::table('donasis')->where('kode_donasi', 'DN-'.$this->kode)->exists()) {
            $this->donasi = Donasi::where('kode_donasi', 'DN-'.$this->kode)->first();
            $this->exist = true;
            $this->temp = $this->donasi->kode_donasi;
            if($this->donasi->status_donasi == true){
                $this->alert('info', 'Anda telah mengupload bukti donasi.', [
                    'position' =>  'center',
                    'timer' =>  9000,
                    'toast' =>  false,
                    'text' =>  '',
                    'confirmButtonText' =>  'OK',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  true,
              ]);
            }
            else{
                $this->step = 2;
            }

        }
        elseif($this->kode == ""){
            $this->alert('error', 'Masukkan kode donasi terlebih dahulu!', [
                'position' =>  'center',
                'timer' =>  9000,
                'toast' =>  false,
                'text' =>  '',
                'confirmButtonText' =>  'OK',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  true,
          ]);
        }
        elseif(!(DB::table('donasis')->where('kode_donasi', 'DN-'.$this->kode)->exists())){
            $this->alert('error', 'Data donasi tidak ditemukan!', [
                'position' =>  'center',
                'timer' =>  9000,
                'toast' =>  false,
                'text' =>  'Cek kembali kode donasi yang Anda masukkan!',
                'confirmButtonText' =>  'OK',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  true,
          ]);
        }
    }

    public function cekBukti(){

        if ($this->image != null) {
            $this->step = 3;
        }
        else{
            $this->alert('error', 'Upload foto bukti donasi terlebih dahulu', [
                'position' =>  'center',
                'timer' =>  9000,
                'toast' =>  false,
                'text' =>  '',
                'confirmButtonText' =>  'OK',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  true,
          ]);
        }
    }

    public function uploadBukti(){
        $path = $this->image->storePubliclyAs('bukti-donasi/'.$this->donasi->id.'/', $this->donasi->kode_donasi.".".$this->image->extension(), 'public');
        $this->donasi->bukti_donasi = 'storage/bukti-donasi/'.$this->donasi->id.'/'.$this->donasi->kode_donasi.".".$this->image->extension();
        $this->donasi->status_donasi = true;
        $this->donasi->save();
        $this->step = 4;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 1MB Max
        ]);
    }

    public function back(){
        --$this->step;
    }

    public function render()
    {
        return view('livewire.guest.konfirmasi-donasi')->layout('layouts.base');
    }

}
