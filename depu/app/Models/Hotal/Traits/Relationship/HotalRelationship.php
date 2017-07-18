<?php

namespace App\Models\Hotal\Traits\Relationship;

use App\Models\Comment\Comment;
use App\Models\Hospital\Hospital;

/**
 * Class HotalRelationship.
 */
trait HotalRelationship
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
