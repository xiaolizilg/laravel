<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Models\Spot\Spot;
use App\Models\Hospital\Hospital;
use App\Models\Tourism\Tourism;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Hospital\SpotRepository;

class SpotController extends Controller
{
    protected $spots;

    public function __construct(SpotRepository $spots)
    {
        $this->spots = $spots;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hospital $hospital, Tourism $tourism)
    {
        $spots = $tourism->spots()->paginate(10);

        return view('backend.hospital.tourism.spot.index')
            ->with(compact('hospital'))
            ->with(compact('tourism'))
            ->with(compact('spots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hospital $hospital, Tourism $tourism)
    {
        return view('backend.hospital.tourism.spot.create')
            ->with(compact('hospital'))
            ->with(compact('tourism'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hospital $hospital, Tourism $tourism)
    {
        $this->spots->create([
                'data'  => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.tourism.spot.index', [$hospital, $tourism])
            ->with('success', __('alerts.backend.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spot\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital, Tourism $tourism, Spot $spot)
    {
        return view('backend.hospital.tourism.spot.show')
            ->with(compact('hospital'))
            ->with(compact('tourism'))
            ->with(compact('spot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spot\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital, Tourism $tourism, Spot $spot)
    {
        return view('backend.hospital.tourism.spot.edit')
            ->with(compact('hospital'))
            ->with(compact('tourism'))
            ->with(compact('spot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spot\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital, Tourism $tourism, Spot $spot)
    {
        $this->spots->update($spot, [
                'data' => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.tourism.spot.index', [$hospital, $tourism])
            ->with('success', __('alerts.backend.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spot\Spot  $spot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital, Tourism $tourism, Spot $spot)
    {
        $this->spots->delete($spot);

        return redirect()
            ->route('backend.hospital.tourism.spot.index', [$hospital, $tourism])
            ->with('success', __('alerts.backend.deleted'));
    }

    public function delete(Hospital $hospital, Tourism $tourism, $id)
    {
        $this->spots->forceDelete($id);

        return redirect()
            ->route('backend.hospital.tourism.spot.deleted', [$hospital, $tourism])
            ->with('success', __('alerts.backend.deleted_permanently'));
    }

    public function restore(Hospital $hospital, Tourism $tourism, $id)
    {
        $this->spots->restore($id);

        return redirect()
            ->route('backend.hospital.tourism.spot.deleted', [$hospital, $tourism])
            ->with('success', __('alerts.backend.restored'));
    }

    public function deleted(Hospital $hospital, Tourism $tourism)
    {
        if (request()->has('search_word')) {
            $spots = $tourism->spots()
                ->onlyTrashed()
                ->where('title', 'LIKE','%' . request()->input('search_word') . '%')
                ->paginate(10);
        } else {
            $spots = $tourism->spots()
                ->onlyTrashed()
                ->paginate(10);
        }

        return view('backend.hospital.tourism.spot.index')
            ->with(compact('hospital'))
            ->with(compact('tourism'))
            ->with(compact('spots'));
    }

    public function getImage(Hospital $hospital, Tourism $tourism, Spot $spot)
    {
        return view('backend.hospital.tourism.spot.image.index')
            ->with(compact('hospital'))
            ->with(compact('tourism'))
            ->with(compact('spot'));
    }

    public function storeImage(Request $request, Hospital $hospital, Tourism $tourism, Spot $spot)
    {

        $spot->update([
                'image_ids' => implode(',', array_merge(array_filter(explode(',', $spot->image_ids)), [$request->input('image_id')]))
            ]);

        return api();
    }

    public function updateImage(Request $request, Hospital $hospital, Tourism $tourism, Spot $spot, $image_key)
    {

        $image_ids = explode(',', $spot->image_ids);

        $image_ids[$image_key] = $request->input('image_id');

        $spot->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return api();
    }

    public function deleteImage(Request $request, Hospital $hospital, Tourism $tourism, Spot $spot, $image_key)
    {

        $image_ids = explode(',', $spot->image_ids);

        unset($image_ids[$image_key]);

        $spot->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return redirect()
            ->route('backend.hospital.tourism.spot.image.index', [$hospital, $tourism, $spot])
            ->with('success', __('alerts.backend.deleted'));
    }
}
