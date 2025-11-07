<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
    // Use Factory
    use HasFactory;

    // Database Table
    protected $table = 'socials';

    // Fillable Fields
    protected $fillable = [
        'name',
        'url',
        'status',
        'user_id',
    ];

    /**
     * Get the user that owns the Social
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
