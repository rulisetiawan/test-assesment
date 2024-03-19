<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'date_time'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function details()
    {
        return $this->hasMany(RequestDetail::class);
    }
}
