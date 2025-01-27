<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class    ttg extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'players', 'description'];
//    protected $table = 'ttgs';

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
