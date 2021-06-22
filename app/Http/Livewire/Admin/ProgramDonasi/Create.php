<?php

namespace App\Http\Livewire\Admin\ProgramDonasi;

use Illuminate\Support\Facades\Auth;
use App\Models\ProgramDonasi;
use App\Models\Rekening;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public array $listsForFields = [];

    public ProgramDonasi $programDonasi;
    public $uid;
    public $thumbnail;

    public function mount(ProgramDonasi $programDonasi)
    {
        $this->programDonasi = $programDonasi;
        $this->uid = Auth::user()->id;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.program-donasi.create');
    }

    public function submit()
    {
        $this->validate();
        $this->programDonasi->user_id = $this->uid;
        $this->programDonasi->save();
        $this->programDonasi->setThumbnail($this->thumbnail, $this->programDonasi->id);
        $this->programDonasi->save();
        return redirect()->route('admin.program-donasi.index');
    }

    protected function rules(): array
    {
        return [
            'programDonasi.rekening_id' => [
                'integer',
                'exists:rekenings,id',
                'required',
            ],
            'programDonasi.judul' => [
                'string',
                'min:1',
                'max:72',
                'required',
            ],
            'programDonasi.deskripsi' => [
                'string',
                'min:1',
                'max:150',
                'required',
            ],
            'programDonasi.konten' => [
                'string',
                'required',
            ],
            'programDonasi.target' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'programDonasi.batas_akhir' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'thumbnail' => [
                'image',
                'max:2048',
                'required',
            ]
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['rekening'] = Rekening::pluck('nomor_rekening', 'id')->toArray();
    }
}
