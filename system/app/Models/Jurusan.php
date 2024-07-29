<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class Jurusan extends Authenticatable
{
    
 protected $table = 'jurusan';
 protected $primaryKey = 'jurusan_id';


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

}