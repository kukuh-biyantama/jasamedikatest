<?php

// app/Models/TableDataPasien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableDataKelurahan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'table_datakelurahan';
    protected $fillable = ['id', 'nama_kelurahan', 'nama_kecamatan', 'nama_kota'];

    // Define the relationship to TableDataKelurahan
    public function pasiens()
    {
        return $this->hasMany(TableDataPasien::class, 'kelurahan_id', 'id');
    }
}
