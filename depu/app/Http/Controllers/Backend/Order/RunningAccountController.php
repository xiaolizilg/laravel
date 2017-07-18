<?php

namespace App\Http\Controllers\Backend\Order;

use App\Models\Order\RunningAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Order\RunningAccountRepository;

class RunningAccountController extends Controller
{
    protected $runnings;

    public function __construct(RunningAccountRepository $runnings)
    {
        $this->runnings = $runnings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runnings = $this->runnings->paginate();

        return view('backend.running.index')
            ->with(compact('runnings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RunningAccount\RunningAccount  $running
     * @return \Illuminate\Http\Response
     */
    public function show(RunningAccount $running)
    {
        return view('backend.running.show')
            ->with(compact('running'));
    }
}
