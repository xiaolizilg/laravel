<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order\Traits\Attribute\RunningAccountAttribute;

class RunningAccount extends Model
{
    use SoftDeletes
    , RunningAccountAttribute
    // , RunningAccountAttributeRelationship
    ;

    protected $guarded  = [];

    protected $dates = ['deleted_at'];
}
