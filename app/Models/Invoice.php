<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'invoice_id');
    }
     public function invoice_details(){
        return $this->hasMany(InvoiceDetails::class, 'invoice_id', 'id');
     }
   
}
