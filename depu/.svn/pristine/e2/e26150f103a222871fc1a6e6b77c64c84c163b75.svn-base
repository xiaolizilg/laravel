<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Trip\TripInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TripInfoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip\TripInfo  $tripInfo
     * @return \Illuminate\Http\Response
     */
    public function show(TripInfo $tripInfo)
    {
        if (!auth()->user()->me->trips()->where(['id' => $tripInfo->trip_id])->count()) {
            return api([], 403);
        }

        $trip_info = [
            'type'       => $tripInfo->type,
            'service_id' => $tripInfo->service_id,
            'type_name'  => $tripInfo->type_name,
            'cover'      => $tripInfo->cover,
            'avatar'     => $tripInfo->avatar,
            'real_name'  => $tripInfo->real_name,
            'mobile'     => $tripInfo->mobile,
            'started_at' => $tripInfo->started_at,
            'info'       => $tripInfo->info,
            'images'     => $tripInfo->images,
        ];

        if (in_array($tripInfo->type, [4, 5])) {
            $trip_info = array_merge($trip_info, [
                    'address_zh'   => $tripInfo->address_zh,
                    'address_en'   => $tripInfo->address_en,
                    'baidu_point'  => $tripInfo->baidu_point,
                    'google_point' => $tripInfo->google_point
                ]);
        }

        if (in_array($tripInfo->type, [10])) {
            $trip_info['spots'] = $tripInfo->tourism->spots()->get(['title', 'info', 'cover_id', 'image_ids'])->map(function($item){
                $item->cover = $item->cover;
                $item->images = $item->images;

                return $item;
            });
        }

        return api(
                compact('trip_info')
            );
    }

}
