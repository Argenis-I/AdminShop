<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendOther extends Model
{
    protected $table = 'spends';
    protected $fillable = ['amountac'];

    public function getAmount()
    {
        return $this->amountac;
    }
}
