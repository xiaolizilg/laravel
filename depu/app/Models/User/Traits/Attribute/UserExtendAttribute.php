<?php

namespace App\Models\User\Traits\Attribute;

use Carbon\Carbon as Carbon;

/**
 * Class UserExtendAttribute.
 */
trait UserExtendAttribute
{
    public function getLastLoginedAtAttribute($date)
    {
        if (request()->expectsJson()) {
            return Carbon::parse($date)->format('Y年m月d日');
        }

        if (Carbon::now() < Carbon::parse($date)->addDays(7)) {
            return Carbon::parse($date);
        }

        return Carbon::parse($date)->diffForHumans();
    }

    public function getLastLoginedIpAttribute($ip)
    {
        return long2ip($ip);
    }

}
