<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read EloquentCollection<int, Event> $events
 * @property-read EloquentCollection<int, SessionTestVariant> testVariants
 */
class Session extends Model
{
    use HasFactory;

    /**
     * @return HasMany<Event>
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    /**
     * @return HasMany<SessionTestVariant>
     */
    public function testVariants(): HasMany
    {
        return $this->hasMany(SessionTestVariant::class);
    }
}
