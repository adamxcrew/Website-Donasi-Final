<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'sarans';

    public $orderable = [
        'id',
        'subjek',
        'pengirim',
        'email',
        'isi',
    ];

    public $filterable = [
        'id',
        'subjek',
        'pengirim',
        'email',
        'isi',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'subjek',
        'pengirim',
        'email',
        'isi',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
