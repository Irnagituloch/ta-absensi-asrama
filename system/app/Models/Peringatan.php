<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class Peringatan extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;
   protected $table = 'peringatan';
   protected $primaryKey = 'peringatan_id';


   protected static function boot(){
    parent::boot();
    static::creating(function ($model) {
        if (empty($model->{$model->getKeyName()})) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        }
    });
}

    // biar tidak auto increment
public function getIncrementing(){
    return false;
}

    // mendevinisikan sebagai string
public function getKeyType(){
    return 'string';
}


function mahasiswi(){
    return $this->belongsTo(User::class, 'peringatan_user_id');
}


function kategoriPeringatan(){
     return $this->belongsTo(kategoriPeringatan::class, 'peringatan_kategori_id');
}

}