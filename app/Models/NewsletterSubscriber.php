<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'subscription_date',
        'unsubscription_date',
    ];

    protected $casts = [
        'subscription_date' => 'datetime',
        'unsubscription_date' => 'datetime',
    ];

    public function scopeSubscribed($query)
    {
        return $query->where('status', 'subscribed');
    }

    public function scopeUnsubscribed($query)
    {
        return $query->where('status', 'unsubscribed');
    }
} 