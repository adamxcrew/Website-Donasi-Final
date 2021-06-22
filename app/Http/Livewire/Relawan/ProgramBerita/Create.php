<?php

namespace App\Http\Livewire\Relawan\ProgramBerita;

use App\Models\ProgramBerita;
use App\Models\ProgramDonasi;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public array $listsForFields = [];

    public ProgramBerita $programBerita;

    public function mount(ProgramBerita $programBerita)
    {
        $this->programBerita = $programBerita;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.relawan.program-berita.create');
    }

    public function submit()
    {
        $this->validate();

        $this->programBerita->save();

        return redirect()->route('relawan.program-berita.index');
    }

    protected function rules(): array
    {
        return [
            'programBerita.program_donasi_id' => [
                'integer',
                'exists:program_donasis,id',
                'required',
            ],
            'programBerita.berita' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['program_donasi'] = ProgramDonasi::where('user_id', Auth::id())->pluck('judul', 'id')->toArray();
    }
}
