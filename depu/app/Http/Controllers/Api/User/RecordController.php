<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Record\Record;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\GetRecordsRequest;
use App\Http\Requests\Api\User\StoreRecordRequest;

class RecordController extends Controller
{
    protected $records;

    public function __construct(Record $records)
    {
        $this->records = $records;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetRecordsRequest $request)
    {
        $records = $this->records->where('status', 1);

        if ($request->has('started_at') && $request->has('ended_at')) {
            $records = $records->where('started_at', '>=', $request->input('started_at'))->where('ended_at', '<=', $request->input('ended_at'));
        }

        $records = $records->paginate(10, ['id', 'title', 'created_at']);

        return api(compact('records'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        $image_ids = !empty($request->input('image_ids')) ? $request->input('image_ids') : [];

        $this->records->create([
                'title'      => $request->input('title'),
                'desc'       => $request->input('desc'),
                'started_at' => $request->input('started_at'),
                'ended_at'   => $request->input('ended_at'),
                'image_ids'  => implode(',', $image_ids),
                'status'     => 1,
            ]);

        return api();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        if (!auth()->user()->me->records()->where(['id' => $record->id])->count()) {
            return api([], 403);
        }

        $record = [
            'title'      => $record->title,
            'desc'       => $record->desc,
            'started_at' => date('Y年m月d日', strtotime($record->started_at)),
            'ended_at'   => date('Y年m月d日', strtotime($record->ended_at)),
            'images'     => $record->images,
        ];

        return api(compact('record'));
    }

}
