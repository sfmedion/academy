<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;

    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_PENDING = 'pending';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['date_from', 'date_to', 'reason', 'status', 'user_id'];

    /**
     * The attributes that should be cast.
     *
     * @var string[]
     */
    protected $casts = ['date_from' => 'datetime', 'date_to' => 'datetime'];

    /**
     * Returns the employee that created the request
     *
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get created_at in more readable form
     *
     * @return string
     */
    public function getHumanCreatedAtAttribute(): string
    {
        return $this->created_at->format('l j F Y');
    }

    /**
     * Get date_from in more readable form
     *
     * @return string
     */
    public function getHumanDateFromAttribute(): string
    {
        return $this->date_from->format('d/m/Y');
    }

    /**
     * Get date_to in more readable form
     *
     * @return string
     */
    public function getHumanDateToAttribute(): string
    {
        return $this->date_to->format('d/m/Y');
    }

    /**
     * Get the number of days that the user requested time-off.
     *
     * @return int
     */
    public function getDaysRequestedAttribute(): int
    {
        return $this->date_from->diffInDaysFiltered(fn($date) => !$date->isWeekend(), $this->date_to) + 1;
    }
}
