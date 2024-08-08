<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangjual extends Model
{
    use HasFactory;
    protected $table = 'barangjuals';

    protected $primaryKey = 'id';

    protected $guarded = [];
    public function barang(){
        return $this->belongsTo(barang::class,"id_barang");
    }
}
