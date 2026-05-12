<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'total',
        'status'
    ];

    // Detalles del pedido
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}