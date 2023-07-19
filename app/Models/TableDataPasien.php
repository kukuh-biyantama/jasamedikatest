<?php
// app/Models/TableDataPasien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TableDataPasien extends Model
{
    protected $table = 'table_datapasien';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $with = ['kelurahan'];
    protected $fillable = ['nama_pasien', 'alamat', 'nomor_telepon', 'rt', 'rw', 'kelurahan_id', 'tanggal_lahir', 'jenis_kelamin'];
    public function kelurahan()
    {
        return $this->belongsTo(TableDataKelurahan::class, 'kelurahan_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // Define the 'creating' event handler
        static::creating(function ($pasien) {
            $lastId = static::max('id');

            // Extract the last two digits of the year (YY)
            $year = date('ym');

            // Get the sequence number from the last ID and increment it
            $sequenceNumber = ($lastId ? (int) substr($lastId, -6) : 0) + 1;

            // Generate the formatted ID with leading zeros
            $idPasien = $year . str_pad($sequenceNumber, 6, '0', STR_PAD_LEFT);

            $pasien->id = $idPasien;
        });
    }
}
