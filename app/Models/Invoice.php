<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'invoice_id');
    }
    public function invoice_details()
    {
        return $this->hasMany(invoiceDetails::class, 'invoice_id', 'id');
    }
}
