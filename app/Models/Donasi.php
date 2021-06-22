<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'donasis';

    public $filterable = [
        'id',
        'program_donasi.judul',
        'nama_donatur',
        'email_donatur',
        'rekening',
        'atas_nama',
        'nominal',
        'pesan',
        'kode_donasi',
    ];

    public $orderable = [
        'id',
        'program_donasi.judul',
        'nama_donatur',
        'email_donatur',
        'rekening',
        'atas_nama',
        'nominal',
        'pesan',
        'kode_donasi',
        'status_donasi',
        'status_verifikasi',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'status_donasi'     => 'boolean',
        'status_verifikasi' => 'boolean',
    ];

    protected $fillable = [
        'program_donasi_id',
        'nama_donatur',
        'email_donatur',
        'rekening',
        'atas_nama',
        'nominal',
        'pesan',
        'kode_donasi',
        'bukti_donasi',
        'status_donasi',
        'status_verifikasi',
    ];

    public function programDonasi()
    {
        return $this->belongsTo(ProgramDonasi::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function getBukti(){
        return asset($this->bukti_donasi);
    }
    public function setBukti($image){
        $image->storePubliclyAs('bukti-donasi/'.$this->id.'/', $this->kode_donasi.".".$image->extension(), 'public');
        $this->bukti_donasi = 'storage/bukti-donasi/'.$this->id.'/'.$this->kode_donasi.".".$image->extension();
        $this->status_donasi = true;
    }
}
