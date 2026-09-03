<?php

namespace App\Models\Project\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use App\Models\Project\Accounting\{Currency, Transaction};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrencyTransfer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'user_id', 'from_currency_id', 'from_amount', 'to_currency_id', 'to_amount', 'exchange_rate', 'transfer_date', 'description', 'note', 'status'];

    protected $casts = [
        'from_amount' => 'decimal:4',
        'to_amount' => 'decimal:4',
        'exchange_rate' => 'decimal:8',
        'transfer_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, 'from_currency_id');
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'to_currency_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'transfer_id');
    }
}
