<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Models\Hotal\Hotal;
use App\Models\Hospital\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Hospital\StoreHotalRequest;
use App\Http\Requests\Backend\Hospital\UpdateHotalRequest;
use App\Repositories\Backend\Hospital\HotalRepository;

class HotalController extends Controller
{
    protected $hotals;

    public function __construct(HotalRepository $hotals)
    {
        $this->hotals = $hotals;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hospital $hospital)
    {
        if (request()->has('search_word')) {
            $hotals = $hospital->hotals()
                ->where('title', 'LIKE','%' . request()->input('search_word') . '%')
                ->paginate(10);
        } else {
            $hotals = $hospital->hotals()
                ->paginate(10);
        }

        return view('backend.hospital.hotal.index')
            ->with(compact('hospital'))
            ->with(compact('hotals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Hospital $hospital)
    {
        return view('backend.hospital.hotal.create')
            ->with(compact('hospital'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotalRequest $request, Hospital $hospital)
    {
        $this->hotals->create([
                'data'  => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.hotal.index', $hospital->id)
            ->with('success', __('alerts.backend.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotal\Hotal  $hotal
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital, Hotal $hotal)
    {
        return view('backend.hospital.hotal.show')
            ->with(compact('hospital'))
            ->with(compact('hotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotal\Hotal  $hotal
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital, Hotal $hotal)
    {
        return view('backend.hospital.hotal.edit')
            ->with(compact('hospital'))
            ->with(compact('hotal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotal\Hotal  $hotal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotalRequest $request, Hospital $hospital, Hotal $hotal)
    {
        $this->hotals->update($hotal, [
                'data' => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.hotal.index', $hospital->id)
            ->with('success', __('alerts.backend.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotal\Hotal  $hotal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital, Hotal $hotal)
    {
        $this->hotals->delete($hotal);

        return redirect()
            ->route('backend.hospital.hotal.index', $hospital->id)
            ->with('success', __('alerts.backend.deleted'));
    }

    public function delete(Hospital $hospital, $id)
    {
        $this->hotals->forceDelete($id);

        return redirect()
            ->route('backend.hospital.hotal.deleted', $hospital->id)
            ->with('success', __('alerts.backend.deleted_permanently'));
    }

    public function restore(Hospital $hospital, $id)
    {
        $this->hotals->restore($id);

        return redirect()
            ->route('backend.hospital.hotal.deleted', $hospital->id)
            ->with('success', __('alerts.backend.restored'));
    }

    public function deleted(Hospital $hospital)
    {
        if (request()->has('search_word')) {
            $hotals = $hospital->hotals()
                ->onlyTrashed()
                ->where('title', 'LIKE','%' . request()->input('search_word') . '%')
                ->paginate(10);
        } else {
            $hotals = $hospital->hotals()
                ->onlyTrashed()
                ->paginate(10);
        }

        return view('backend.hospital.hotal.index')
            ->with(compact('hospital'))
            ->with(compact('hotals'));
    }

    public function getImage(Hospital $hospital, Hotal $hotal)
    {
        return view('backend.hospital.hotal.image.index')
            ->with(compact('hospital'))
            ->with(compact('hotal'));
    }

    public function storeImage(Request $request, Hospital $hospital, Hotal $hotal)
    {

        $hotal->update([
                'image_ids' => implode(',', array_merge(array_filter(explode(',', $hotal->image_ids)), [$request->input('image_id')]))
            ]);

        return api();
    }

    public function updateImage(Request $request, Hospital $hospital, Hotal $hotal, $image_key)
    {

        $image_ids = explode(',', $hotal->image_ids);

        $image_ids[$image_key] = $request->input('image_id');

        $hotal->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return api();
    }

    public function deleteImage(Request $request, Hospital $hospital, Hotal $hotal, $image_key)
    {

        $image_ids = explode(',', $hotal->image_ids);

        unset($image_ids[$image_key]);

        $hotal->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return redirect()
            ->route('backend.hospital.hotal.image.index', [$hospital, $hotal])
            ->with('success', __('alerts.backend.deleted'));
    }
}
