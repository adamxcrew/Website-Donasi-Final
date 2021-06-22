<?php

namespace App\Http\Livewire\Admin\Profesi;

use App\Models\Profesi;
use Livewire\Component;

class Create extends Component
{
    public Profesi $profesi;

    public function mount(Profesi $profesi)
    {
        $this->profesi = $profesi;
    }

    public function render()
    {
        return view('livewire.admin.profesi.create');
    }

    public function submit()
    {
        $this->validate();

        $this->profesi->save();

        return redirect()->route('admin.profesi.index');
    }

    protected function rules(): array
    {
        return [
            'profesi.nama' => [
                'string',
                'required',
            ],
        ];
    }
}
