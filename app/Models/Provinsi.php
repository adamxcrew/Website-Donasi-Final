<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $timestamps = false;
    public $table = 'provinsis';

    public $orderable = [
        'id',
        'nama',
    ];

    public $filterable = [
        'id',
        'nama',
    ];

    protected $fillable = [
        'nama',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
