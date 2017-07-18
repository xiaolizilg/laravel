<?php

namespace App\Repositories\Backend\Content;

use App\Models\Pusher\Pusher;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PusherRepository.
 */
class PusherRepository extends BaseRepository
{
    const MODEL = Pusher::class;

    public function create(array $input)
    {
        $data = $input['data'];

        $pusher = $this->createPusherStub($data);

        DB::transaction(function () use ($pusher) {
            if ($pusher->save()) {

                // event(new PusherCreated($pusher));

                return true;
            }

            throw new GeneralException(__('exceptions.backend.create_error'));
        });
    }

    protected function createPusherStub($input)
    {
        $pusher = self::MODEL;
        $pusher = new $pusher;
        $pusher->user_id = $input['user_id'];
        $pusher->event   = $input['event'];
        $pusher->role_id = $input['role_id'];
        $pusher->role    = $input['role'];
        $pusher->title   = $input['title'];
        $pusher->content = $input['content'];
        $pusher->status  = 1;
        
        return $pusher;
    }
}
