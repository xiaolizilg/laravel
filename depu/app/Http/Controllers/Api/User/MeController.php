<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UpdateProfileRequest;
use App\Http\Requests\Api\User\ComplaintRequest;
use App\Http\Requests\Api\User\ChangePasswordRequest;
use App\Http\Requests\Api\User\ValidateCodeRequest;
use App\Repositories\Api\User\UserRepository;

class MeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_info = [
            'avatar'       => auth()->user()->me->avatar,
            'name'         => auth()->user()->me->name,
            'admin_mobile' => '',
        ];

        if (auth()->user()->me->orders()->where('status', '<=', 2)->count()) {
            $user_info['admin_mobile'] = auth()->user()->me->own_admin->info->mobile;
        }

        return api(
                compact('user_info')
            );
    }

    public function info()
    {
        $user_info = [
            'avatar'           => auth()->user()->me->avatar,
            'name'             => auth()->user()->me->name,
            'real_name'        => auth()->user()->me->info->real_name,
            'sex'              => auth()->user()->me->info->sex,
            'sex_desc'         => auth()->user()->me->info->sex_desc,
            'birthday'         => auth()->user()->me->info->birthday,
            'mobile'           => auth()->user()->me->info->mobile,
            'address'          => auth()->user()->me->info->address,
            'attendant'        => auth()->user()->me->info->attendant,
            'attendant_mobile' => auth()->user()->me->info->attendant_mobile,
            'family'           => auth()->user()->me->info->family,
            'family_mobile'    => auth()->user()->me->info->family_mobile,
            'person_card'      => auth()->user()->me->info->person_card,
        ];

        return api(
                compact('user_info')
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateProfileRequest $request)
    {
        if (empty($request->all())) {
            return api();
        }

        if ($request->has('avatar_id')) {
            auth()->user()->me()->update($request->only('avatar_id'));
        }

        if ($request->has('name')) {
            auth()->user()->me()->update($request->only('name'));
        }

        if (empty($request->except('avatar_id', 'name'))) {
            return api();
        }

        auth()->user()->me->info()->update($request->except('avatar_id', 'name'));

        return api();
    }

    public function complaint(ComplaintRequest $request)
    {
        auth()->user()->me->complaints()->create([
                'order_id' => $request->input('order_id'),
                'type'     => $request->input('type'),
                'mobile'   => $request->input('mobile'),
                'content'  => $request->input('content'),
                'status'   => 1,
            ]);

        return api();
    }

    public function changePassword(ChangePasswordRequest $request, UserRepository $users)
    {
        if (
                ($request->input('code') == cache()->get(config('auth.user_auths.reset_password') . '|' . $request->input('name'))) &&
                $users->changeMobileAccountPassword($request->all())
            ) {
            return api();
        }
        return api([], 1004);
    }

    public function validateCode(ValidateCodeRequest $request)
    {
        if (
                ($request->input('code') == cache()->get(config('auth.user_auths.reset_password') . '|' . $request->input('name')))
            ) {
            return api();
        }
        
        return api([], 1004);
    }
}
