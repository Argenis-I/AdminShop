<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendDebito extends Model
{
    protected $table = 'spends';
    protected $fillable = ['amountd'];

    public function getAmount()
    {
        return $this->amountd;
    }
}
