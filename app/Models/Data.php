<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Data extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'description',
    ];

    public function scopeSlugSelect($query, $id){
        return $query->where('slug', $id);
    }

    public static function boot(){
        parent::boot();

        static::creating(function($list) {
            $list->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $list->title);
        });
    }
}
