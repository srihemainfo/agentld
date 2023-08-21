<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_transaction_id',
        'user_id',
        'deletes',
        'purchase_datetime',
        'createdon',
        'draw_id',
        'agent_id',
        'ticket_no',
        'invoice_no',
        'sale_from',
        'total_amount',
        'tax_percentage',
        'tax_value',
        'net_total',
        'status',
        'payment_by',
        'total_lines',
        'delete_reason',


    ];
}
