<?php

namespace App\Models;

use App\Enums\ContactMessageStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'subject',
        'body', 'status', 'admin_note', 'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'status' => ContactMessageStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
