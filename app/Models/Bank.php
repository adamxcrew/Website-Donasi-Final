<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'banks';

    public $orderable = [
        'id',
        'nama',
        'kode_bank',
    ];

    public $filterable = [
        'id',
        'nama',
        'kode_bank',
    ];

    protected $fillable = [
        'nama',
        'kode_bank',
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
