<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'place_id',
        'name_father',
        'phone',
        'national_no'
    ];
    public function places()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }
}
