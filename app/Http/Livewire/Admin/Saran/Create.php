<?php

namespace App\Http\Livewire\Admin\Saran;

use App\Models\Saran;
use Livewire\Component;

class Create extends Component
{
    public Saran $saran;

    public function mount(Saran $saran)
    {
        $this->saran = $saran;
    }

    public function render()
    {
        return view('livewire.admin.saran.create');
    }

    public function submit()
    {
        $this->validate();

        $this->saran->save();

        return redirect()->route('admin.saran.index');
    }

    protected function rules(): array
    {
        return [
            'saran.subjek' => [
                'string',
                'required',
            ],
            'saran.pengirim' => [
                'string',
                'nullable',
            ],
            'saran.email' => [
                'email:rfc',
                'nullable',
            ],
            'saran.isi' => [
                'string',
                'required',
            ],
        ];
    }
}
