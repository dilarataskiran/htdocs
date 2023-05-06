<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrunModel extends Model
{
    use HasFactory;

    protected $table = "urunler";

    protected $guarded = [];

    const CREATED_AT = "olusturulma_tarihi";
    const UPDATED_AT = "guncelleme_tarihi";
    const DELETED_AT = "silinme_tarihi";
}
