<?php

namespace App\Http\Controllers\Backend\Content;

use App\Models\Pusher\Pusher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Content\PusherRepository;

class PusherController extends Controller
{
    protected $pushers;

    public function __construct(PusherRepository $pushers)
    {
        $this->pushers = $pushers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pushers = $this->pushers->paginate();

        return view('backend.pusher.index')
            ->with(compact('pushers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pusher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->pushers->create([
                'data'  => $request->all(),
            ]);

        return redirect()
            ->route('backend.content.pusher.index')
            ->with('success', __('alerts.backend.created'));
    }
}
