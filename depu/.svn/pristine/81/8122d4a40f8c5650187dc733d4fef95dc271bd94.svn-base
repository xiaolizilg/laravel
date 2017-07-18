<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Models\Taxi\Taxi;
use App\Models\Hospital\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Hospital\StoreTaxiRequest;
use App\Http\Requests\Backend\Hospital\UpdateTaxiRequest;
use App\Repositories\Backend\Hospital\TaxiRepository;

class TaxiController extends Controller
{
    protected $taxis;

    public function __construct(TaxiRepository $taxis)
    {
        $this->taxis = $taxis;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hospital $hospital)
    {
        if (request()->has('search_word')) {
            $taxis = $hospital->taxis()
                ->where('title', 'LIKE','%' . request()->input('search_word') . '%')
                ->paginate(10);
        } else {
            $taxis = $hospital->taxis()
                ->paginate(10);
        }

        return view('backend.hospital.taxi.index')
            ->with(compact('hospital'))
            ->with(compact('taxis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hospital $hospital)
    {
        return view('backend.hospital.taxi.create')
            ->with(compact('hospital'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaxiRequest $request, Hospital $hospital)
    {
        $this->taxis->create([
                'data'  => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.taxi.index', $hospital->id)
            ->with('success', __('alerts.backend.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxi\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital, Taxi $taxi)
    {
        return view('backend.hospital.taxi.show')
            ->with(compact('hospital'))
            ->with(compact('taxi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taxi\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital, Taxi $taxi)
    {
        return view('backend.hospital.taxi.edit')
            ->with(compact('hospital'))
            ->with(compact('taxi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxi\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaxiRequest $request, Hospital $hospital, Taxi $taxi)
    {
        $this->taxis->update($taxi, [
                'data' => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.taxi.index', $hospital->id)
            ->with('success', __('alerts.backend.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxi\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital, Taxi $taxi)
    {
        $this->taxis->delete($taxi);

        return redirect()
            ->route('backend.hospital.taxi.index', $hospital->id)
            ->with('success', __('alerts.backend.deleted'));
    }

    public function delete(Hospital $hospital, $id)
    {
        $this->taxis->forceDelete($id);

        return redirect()
            ->route('backend.hospital.taxi.deleted', $hospital->id)
            ->with('success', __('alerts.backend.deleted_permanently'));
    }

    public function restore(Hospital $hospital, $id)
    {
        $this->taxis->restore($id);

        return redirect()
            ->route('backend.hospital.taxi.deleted', $hospital->id)
            ->with('success', __('alerts.backend.restored'));
    }

    public function deleted(Hospital $hospital)
    {
        if (request()->has('search_word')) {
            $taxis = $hospital->taxis()
                ->onlyTrashed()
                ->where('title', 'LIKE','%' . request()->input('search_word') . '%')
                ->paginate(10);
        } else {
            $taxis = $hospital->taxis()
                ->onlyTrashed()
                ->paginate(10);
        }

        return view('backend.hospital.taxi.index')
            ->with(compact('hospital'))
            ->with(compact('taxis'));
    }

    public function getImage(Hospital $hospital, Taxi $taxi)
    {
        return view('backend.hospital.taxi.image.index')
            ->with(compact('hospital'))
            ->with(compact('taxi'));
    }

    public function storeImage(Request $request, Hospital $hospital, Taxi $taxi)
    {

        $taxi->update([
                'image_ids' => implode(',', array_merge(array_filter(explode(',', $taxi->image_ids)), [$request->input('image_id')]))
            ]);

        return api();
    }

    public function updateImage(Request $request, Hospital $hospital, Taxi $taxi, $image_key)
    {

        $image_ids = explode(',', $taxi->image_ids);

        $image_ids[$image_key] = $request->input('image_id');

        $taxi->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return api();
    }

    public function deleteImage(Request $request, Hospital $hospital, Taxi $taxi, $image_key)
    {

        $image_ids = explode(',', $taxi->image_ids);

        unset($image_ids[$image_key]);

        $taxi->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return redirect()
            ->route('backend.hospital.taxi.image.index', [$hospital, $taxi])
            ->with('success', __('alerts.backend.deleted'));
    }
}
