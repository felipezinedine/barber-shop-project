<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scheduling extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
    ];

    public function services()
    {
        return $this->hasOne(Services::class, 'id', 'service_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'professional_id');
    }
}
