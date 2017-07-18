<?php

namespace App\Models\Taxi\Traits\Relationship;

use App\Models\Comment\Comment;
use App\Models\Hospital\Hospital;

/**
 * Class TaxiRelationship.
 */
trait TaxiRelationship
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
