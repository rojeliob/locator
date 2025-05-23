<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name'
    ];

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
