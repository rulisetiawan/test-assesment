<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    protected $table = 'request_details';
    use HasFactory;
    protected $fillable = [
        'request_id',
        'item_id',
        'description',
        'status',
        'qty'
    ];
    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
