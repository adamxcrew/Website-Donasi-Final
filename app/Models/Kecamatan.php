<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $timestamps = false;
    public $table = 'kecamatans';

    public $orderable = [
        'id',
        'kabupaten.nama',
        'nama',
    ];

    public $filterable = [
        'id',
        'kabupaten.nama',
        'nama',
    ];

    protected $fillable = [
        'kabupaten_id',
        'nama',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
