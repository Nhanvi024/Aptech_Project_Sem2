<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;

class Admin extends Authenticatable
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
     use HasFactory, Notifiable;

     /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'name',
         'username',
         'email',
         'password',
         'avatar',
         'position',
         'type',
         'bloked',
     ];
 
     /**
      * The attributes that should be hidden for serialization.
      *
      * @var array<int, string>
      */
     protected $hidden = [
         'password',
         'remember_token',
     ];
 
     /**
      * Get the attributes that should be cast.
      *
      * @return array<string, string>
      */
     protected function casts(): array
     {
         return [
             'email_verified_at' => 'datetime',
             'password' => 'hashed',
         ];
     }


     public function getAvatar(){
        if($this->avatar && File::exists(public_path('back/imageDefault/'.$this->avatar))){
            return asset('back/imageDefault/'.$this->avatar);
        }else{
            return asset('back/imageDefault/default-img.png');
        }
     }

    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('username','like',$term)
                ->orWhere('email','like',$term);
        });
    }
}
