<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendCredito extends Model
{
    protected $table = 'spends';
    protected $fillable = ['amountc'];

    public function getAmount()
    {
        return $this->amountc;
    }
}
