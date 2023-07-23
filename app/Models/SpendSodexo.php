<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendSodexo extends Model
{
    protected $table = 'spends';
    protected $fillable = ['amounts'];

    public function getAmount()
    {
        return $this->amounts;
    }
}
