<?php

namespace App\Http\Livewire\Admin\Agama;

use App\Models\Agama;
use Livewire\Component;

class Create extends Component
{
    public Agama $agama;

    public function mount(Agama $agama)
    {
        $this->agama = $agama;
    }

    public function render()
    {
        return view('livewire.admin.agama.create');
    }

    public function submit()
    {
        $this->validate();

        $this->agama->save();

        return redirect()->route('admin.agama.index');
    }

    protected function rules(): array
    {
        return [
            'agama.nama' => [
                'string',
                'required',
            ],
        ];
    }
}
