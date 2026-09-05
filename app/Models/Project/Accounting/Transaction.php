<?php

namespace App\Models\Project\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Project\Accounting\{Category, Currency, CurrencyTransfer, Account};

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'currency_id', 'category_id', 'type', 'amount', 'description', 'transaction_date', 'note', 'transfer_id', 'status', 'account_id', /*'payment_method',*/];

    protected $casts = [
        'from_amount' => 'decimal:4',
        'to_amount' => 'decimal:4',
        'exchange_rate' => 'decimal:8',
        'transfer_date' => 'date',
        'status' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transfer()
    {
        return $this->belongsTo(CurrencyTransfer::class, 'transfer_id');
    }

    public function scopeReceipts($query)
    {
        return $query->where('type', 'receipt');
    }

    public function scopePayments($query)
    {
        return $query->where('type', 'payment');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
