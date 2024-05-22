<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Services extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
    ];

    public function services()
    {
        return $this->hasOne(Services::class,'id','service_id');
    }
}
