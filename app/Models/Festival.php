<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Festival extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

     use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'scheduled_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
        ];
    }
}
