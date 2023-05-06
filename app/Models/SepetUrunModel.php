<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepetUrunModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "sepet_urun";

    protected $guarded = [];

    const CREATED_AT = "olusturulma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
    const DELETED_AT = "silinme_tarihi";

   
    public function urun()
    {
        return $this->hasOne('App\Models\UrunModel', 'id', 'urun_id');
    }
}
