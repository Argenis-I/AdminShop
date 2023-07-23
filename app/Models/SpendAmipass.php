<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendAmipass extends Model
{
    protected $table = 'spends';
    protected $fillable = ['amounta'];

    public function getAmount()
    {
        return $this->amounta;
    }
}
