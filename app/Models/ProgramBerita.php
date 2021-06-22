<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramBerita extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'program_berita';

    public $orderable = [
        'id',
        'program_donasi.judul',
        'berita',
    ];

    public $filterable = [
        'id',
        'program_donasi.judul',
        'berita',
    ];

    protected $fillable = [
        'program_donasi_id',
        'berita',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function programDonasi()
    {
        return $this->belongsTo(ProgramDonasi::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
