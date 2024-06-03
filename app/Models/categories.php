<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'created_at',
        'updated_at'
    ];

    public function posts():HasMany
    {
        return $this->hasMany(posts::class,'category_id');
    }
}
