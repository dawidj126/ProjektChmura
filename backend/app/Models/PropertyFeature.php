<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyFeature extends Model
{
    public $timestamps = false;

    protected $fillable = ['property_id', 'feature'];

    public $created_at = true;

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
