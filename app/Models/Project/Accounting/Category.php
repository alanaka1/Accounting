<?php

namespace App\Models\Project\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'type', 'description', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function receipts(): HasMany
    // {
    //     return $this->hasMany(Receipt::class);
    // }

    // public function expenses(): HasMany
    // {
    //     return $this->hasMany(Expense::class);
    // }
}
