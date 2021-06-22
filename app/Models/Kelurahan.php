<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $timestamps = false;
    public $table = 'kelurahans';

    public $orderable = [
        'id',
        'kecamatan.nama',
        'nama',
    ];

    public $filterable = [
        'id',
        'kecamatan.nama',
        'nama',
    ];

    protected $fillable = [
        'kecamatan_id',
        'nama',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
