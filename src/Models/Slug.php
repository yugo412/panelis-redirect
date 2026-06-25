<?php

namespace Panelis\Redirect\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;
use Panelis\Redirect\Panel\Resources\SlugResource\Enums\SlugType;

/**
 * @property int $id
 * @property SlugType $sluggable_type
 * @property int $sluggable_id
 * @property string $origin
 * @property string $destination
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $hit_count
 * @property-read Model|\Eloquent $sluggable
 *
 * @method static \Database\Factories\SlugFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereDestination($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereHitCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereSluggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereSluggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slug whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Slug extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'destination',
        'status',
        'hit_count',
    ];

    protected function casts(): array
    {
        return [
            'sluggable_type' => SlugType::class,
        ];
    }

    public function sluggable(): MorphTo
    {
        return $this->morphTo();
    }
}
