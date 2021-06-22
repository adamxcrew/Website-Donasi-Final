<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $id, $thumbnail, $judul, $terkumpul, $target, $deadline, $deskripsi, $nama, $email;

    public function __construct($id, $thumbnail, $judul, $terkumpul, $target, $deadline, $deskripsi, $nama, $email)
    {
        $this->id = $id;
        $this->thumbnail = $thumbnail;
    }

    public function render()
    {
        return view('components.list-program');
    }
}
