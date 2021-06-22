<?php

namespace App\Http\Livewire\Admin\ProgramBerita;

use App\Models\ProgramBerita;
use App\Models\ProgramDonasi;
use Livewire\Component;

class Edit extends Component
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
        return view('livewire.admin.program-berita.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->programBerita->save();

        return redirect()->route('admin.program-berita.index');
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
        $this->listsForFields['program_donasi'] = ProgramDonasi::pluck('judul', 'id')->toArray();
    }
}
