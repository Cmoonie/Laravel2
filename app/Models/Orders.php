<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [ // works with the factory and fulls in the colums in the table
        'user_id',
        'festival_id',
        'quantity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class); //model user is only conected to create_user_tabel in database
    }

    public function festival(): BelongsTo
    {
        return $this->belongsTo(Festival::class);//Model Festival is only conected to create_festival in database
    }
}
