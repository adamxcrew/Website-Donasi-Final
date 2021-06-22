<?php

namespace App\Http\Livewire\Guest\PostinganProgram;

use App\Models\ProgramDonasi;
use Livewire\Component;
use Livewire\WithPagination;

class PostinganProgram extends Component
{
    public $programDonasi;
    public $Beritas;

    public function mount(ProgramDonasi $programDonasi)
    {
        $this->programDonasi = $programDonasi;

    }

    public function render()
    {
        return view('livewire.guest.postingan-program')->layout('layouts.base');
    }
}
