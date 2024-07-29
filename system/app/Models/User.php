<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;
   protected $table = 'user';
   protected $primaryKey = 'user_id';


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


function handleUploadFoto(){
    if(request()->hasFile('foto')){
        $file = request()->file('foto');
        $destination = "profil";
        $randomStr = Str::random(5);
        $filename = "profil-".time()."-".$randomStr.".".$file->extension();
        $url = $file->storeAs($destination, $filename);
        $this->foto = "app/".$url;
        $this->save;
    }
}


function detail(){
    return $this->hasOne(UserDetail::class, 'user_id');
}

}