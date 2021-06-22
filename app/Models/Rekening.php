<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'rekenings';

    public $orderable = [
        'id',
        'user.email',
        'bank.nama',
        'atas_nama',
        'nomor_rekening',
    ];

    public $filterable = [
        'id',
        'user.email',
        'bank.nama',
        'atas_nama',
        'nomor_rekening',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'bank_id',
        'atas_nama',
        'nomor_rekening',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
