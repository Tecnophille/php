<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'account_id','expense_category_id','amount','payment_method_id',
        'date','expense_ref','description','attachment'
    ];

    protected $casts = [
        'account_id'  => 'integer',
        'expense_category_id'  => 'integer',
        'payment_method_id'  => 'integer',
        'amount' => 'double',
    ];

    public function account()
    {
        return $this->hasOne('App\Models\Account', 'id', 'account_id');
    }

    public function payment_method()
    {
        return $this->hasOne('App\Models\PaymentMethod', 'id', 'payment_method_id');
    }

    public function expense_category()
    {
        return $this->hasOne('App\Models\DepositCategory', 'id', 'expense_category_id');
    }
}
