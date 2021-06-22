<?php

namespace App\Http\Livewire\Relawan\ProgramDonasi;

use App\Models\ProgramDonasi;
use App\Models\Rekening;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use WithFileUploads;
    public array $listsForFields = [];

    public ProgramDonasi $programDonasi;
    public $thumbnail;

    public function mount(ProgramDonasi $programDonasi)
    {
        $this->programDonasi = $programDonasi;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.relawan.program-donasi.edit');
    }

    public function submit()
    {
        $this->validate();
        if($this->thumbnail != null){
            $this->programDonasi->setThumbnail($this->thumbnail, $this->programDonasi->id);
        }
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
            'programDonasi.status_verifikasi' => [
                'boolean',
            ],
            'programDonasi.status_selesai' => [
                'boolean',
            ],
            'thumbnail' => [
                'image',
                'max:2048',
                'nullable'
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['rekening'] = Rekening::where('user_id', Auth::id())->pluck('nomor_rekening', 'id')->toArray();
    }
}
