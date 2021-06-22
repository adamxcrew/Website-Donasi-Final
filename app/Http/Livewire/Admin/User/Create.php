<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Agama;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Profesi;
use App\Models\Provinsi;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public User $user;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        return redirect()->route('admin.users.index');
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email',
            ],
            'user.telepon' => [
                'string',
                'required',
            ],
            'user.alamat' => [
                'string',
                'required',
            ],
            'user.provinsi_id' => [
                'integer',
                'exists:provinsis,id',
                'required',
            ],
            'user.kabupaten_id' => [
                'integer',
                'exists:kabupatens,id',
                'required',
            ],
            'user.kecamatan_id' => [
                'integer',
                'exists:kecamatans,id',
                'required',
            ],
            'user.kelurahan_id' => [
                'integer',
                'exists:kelurahans,id',
                'required',
            ],
            'user.agama_id' => [
                'integer',
                'exists:agamas,id',
                'required',
            ],
            'user.profesi_id' => [
                'integer',
                'exists:profesis,id',
                'required',
            ],
            'password' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles']     = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['provinsi']  = Provinsi::pluck('nama', 'id')->toArray();
        $this->listsForFields['kabupaten'] = Kabupaten::pluck('nama', 'id')->toArray();
        $this->listsForFields['kecamatan'] = Kecamatan::pluck('nama', 'id')->toArray();
        $this->listsForFields['kelurahan'] = Kelurahan::pluck('nama', 'id')->toArray();
        $this->listsForFields['agama']     = Agama::pluck('nama', 'id')->toArray();
        $this->listsForFields['profesi']   = Profesi::pluck('nama', 'id')->toArray();
    }
}
