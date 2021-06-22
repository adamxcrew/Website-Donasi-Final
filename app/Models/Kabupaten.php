<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $timestamps = false;
    public $table = 'kabupatens';

    public $orderable = [
        'id',
        'provinsi.nama',
        'nama',
    ];

    public $filterable = [
        'id',
        'provinsi.nama',
        'nama',
    ];

    protected $fillable = [
        'provinsi_id',
        'nama',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
