<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepetModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = "sepet";

    protected $guarded = [];

    const CREATED_AT = "olusturulma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
    const DELETED_AT = "silinme_tarihi";

   
    public function kullanici()
    {
        return $this->hasOne('App\Models\User', 'id', 'kullanici_id');
    }
}
