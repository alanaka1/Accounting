<?php

namespace App\Models\Project\Accounting;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'currency_id', 'category_id', 'type', 'amount', 'description', 'transaction_date', 'note', 'transfer_id'];

    protected $casts = [
        'amount' => 'decimal:4',
        'transaction_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
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
}
