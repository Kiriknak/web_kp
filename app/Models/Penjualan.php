<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $guarded = ['id'];


    public function detail()
    {
        return $this->hasMany(DetailPenjualan::class, 'penjualan_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function sum()
    {
        $sum = 0;
        foreach ($this->detail as $detail) {
            $sum += $detail->harga * $detail->jumlah;
        }
        return $sum;
    }
}
