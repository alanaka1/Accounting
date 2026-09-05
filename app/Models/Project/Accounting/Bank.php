<?php

namespace App\Models\Project\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'code', 'description', 'status'];

    protected $casts = ['status' => 'integer'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
