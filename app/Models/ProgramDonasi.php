<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramDonasi extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'program_donasis';

    public $filterable = [
        'id',
        'user.email',
        'rekening.nomor_rekening',
        'judul',
        'deskripsi',
        'konten',
        'target',
        'batas_akhir',
    ];

    public $orderable = [
        'id',
        'user.email',
        'rekening.nomor_rekening',
        'judul',
        'deskripsi',
        'konten',
        'target',
        'batas_akhir',
        'status_verifikasi',
        'status_selesai',
    ];

    protected $dates = [
        'batas_akhir',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'status_verifikasi' => 'boolean',
        'status_selesai'    => 'boolean',
    ];

    protected $fillable = [
        'user_id',
        'rekening_id',
        'judul',
        'deskripsi',
        'thumbnail',
        'konten',
        'target',
        'batas_akhir',
        'status_verifikasi',
        'status_selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }

    public function getBatasAkhirAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeadline()
    {

    }

    public function setBatasAkhirAttribute($value)
    {
        $this->attributes['batas_akhir'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tes()
      {

           return Carbon::createFromTimestamp(strtotime($this->batas_akhir))->diff(Carbon::now())->days;
      }

    /**
    * Get all of the comments for the ProgramDonasi
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function donasi(){
        return $this->hasMany(Donasi::class);
    }
    public function programBeritas(){
        return $this->hasMany(ProgramBerita::class);
    }

    public function getTotalDonasi(){
        return count($this->donasi->nominal);
    }

    public function getThumbnail(){
        return asset($this->thumbnail);
    }

    public function setThumbnail($image, $id){
        $image->storePubliclyAs('program-donasi/thumbnail/', $id.".".$image->extension(), 'public');
        $this->thumbnail = 'storage/program-donasi/thumbnail/'.$id.".".$image->extension();
    }
}
