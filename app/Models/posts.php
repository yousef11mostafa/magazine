<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Categories::class,'category_id');
    }
}
