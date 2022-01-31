<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{
    protected $table = "billing_detail";
    protected $fillable = ["billing_id","no_barang","jns_barang","berat","harga","jumlah"];
}
