<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use SoftDeletes;

    protected $table = 'compras';

    protected $fillable = [
        'session_id',
        'total',
        'status',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Obtener el estado de la compra como texto legible.
     *
     * @return string
     */
    public function getStatusTextAttribute()
    {
        $statusText = '';
        switch ($this->status) {
            case 1:
                $statusText = 'Pendiente';
                break;
            case 2:
                $statusText = 'Aprobada';
                break;
        }
        return $statusText;
    }
}
