<?php

namespace App\Models\Project\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Models\Project\Accounting\{CurrencyTransfer, Transaction};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'code', 'symbol', 'decimal_places', 'is_default', 'status'];

    protected $casts = [
        'is_default' => 'boolean',
        'status' => 'integer',
        'decimal_places' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfersFrom()
    {
        return $this->hasMany(CurrencyTransfer::class, 'from_currency_id');
    }

    public function transfersTo()
    {
        return $this->hasMany(CurrencyTransfer::class, 'to_currency_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
