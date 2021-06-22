<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Profesi;
use App\Models\Agama;
use App\Models\Provinsi;

class Register extends Component
{
    public $nama, $email, $password, $konfirmasi_password, $alamat_lengkap, $nomor_telepon,  $profesi, $agama;
    public $provinsi = null;
    public $kota = null;
    public $kecamatan = null;
    public $kelurahan = null;

    public $semuaProfesi;
    public $semuaAgama;
    public $semuaProvinsi;
    public $semuaKabupaten;
    public $semuaKecamatan;
    public $semuaKelurahan;

    public $next = 0;

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
            'konfirmasi_password'=> 'required|same:password',
            'alamat_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|numeric',
            'profesi' => 'required',
            'agama' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
        ];
    }

    public function next()
    {
        $this->next = true;
    }

    public function back()
    {
        $this->next = false;
    }

    public function mount()
    {
        $this->semuaProvinsi = Provinsi::all();
        $this->semuaKabupaten = collect();
        $this->semuaKecamatan = collect();
        $this->semuaKelurahan = collect();
        $this->semuaAgama = Agama::all();
        $this->semuaProfesi = Profesi::all();
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }

    public function store()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'alamat' => $this->alamat_lengkap,
            'telepon' => $this->nomor_telepon,
            'provinsi_id' => $this->provinsi,
            'kabupaten_id' => $this->kota,
            'kecamatan_id' => $this->kecamatan,
            'kelurahan_id' => $this->kelurahan,
            'profesi_id' => $this->profesi,
            'agama_id' => $this->agama,
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function updatedProvinsi($provinsi)
    {
        $this->semuaKabupaten = Kabupaten::where('provinsi_id', $provinsi)->get();
        $this->kota = null;
        $this->kecamatan = null;
        $this->kelurahan = null;
    }

    public function updatedKota($kota)
    {
        if ($kota != null) {
            $this->semuaKecamatan = Kecamatan::where('kabupaten_id', $kota)->get();
            $this->kecamatan = null;
            $this->kelurahan = null;
        }
    }

    public function updatedKecamatan($kecamatan)
    {
        if ($kecamatan != null) {
            $this->semuaKelurahan = Kelurahan::where('kecamatan_id', $kecamatan)->get();
            $this->kelurahan = null;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
