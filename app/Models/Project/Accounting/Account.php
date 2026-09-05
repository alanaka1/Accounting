<?php

namespace App\Models\Project\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'bank_id', 'currency_id', 'name', 'type', 'last_four', 'description', 'status'];

    protected $casts = ['status' => 'integer'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfersFrom()
    {
        return $this->hasMany(CurrencyTransfer::class, 'from_account_id');
    }

    public function transfersTo()
    {
        return $this->hasMany(CurrencyTransfer::class, 'to_account_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
