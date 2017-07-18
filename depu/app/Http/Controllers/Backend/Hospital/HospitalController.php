<?php

namespace App\Http\Controllers\Backend\Hospital;

use App\Models\Hospital\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Hospital\StoreHospitalRequest;
use App\Http\Requests\Backend\Hospital\UpdateHospitalRequest;
use App\Repositories\Backend\Hospital\HospitalRepository;
use App\Repositories\Backend\Project\CountryRepository;

class HospitalController extends Controller
{
    protected $hospitals;

    public function __construct(HospitalRepository $hospitals)
    {
        $this->hospitals = $hospitals;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('search_word')) {
            $hospitals = $this->hospitals->searchPaginate([
                    'title',
                    '%' . request()->input('search_word') . '%'
                ]);
        } else {
            $hospitals = $this->hospitals->paginate();
        }

        return view('backend.hospital.index')
            ->with(compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CountryRepository $countries)
    {
        return view('backend.hospital.create')
            ->with(['countries' => $countries->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHospitalRequest $request)
    {
        $this->hospitals->create([
                'data'  => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.index')
            ->with('success', __('alerts.backend.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        return view('backend.hospital.show')
            ->with(compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital, CountryRepository $countries)
    {
        return view('backend.hospital.edit')
            ->with(compact('hospital'))
            ->with(['countries' => $countries->getAll()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        $this->hospitals->update($hospital, [
                'data' => $request->all(),
            ]);

        return redirect()
            ->route('backend.hospital.index')
            ->with('success', __('alerts.backend.updated'));
    }

    public function addImage(Request $request, Hospital $hospital)
    {
        if (count(explode(',', $hospital->image_ids)) >= 9) {
            return api([], 403);
        }

        $hospital->update([
                'image_ids' => implode(',', array_merge(explode(',', $hospital->image_ids), [$request->input('image_id')]))
            ]);

        return api();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $this->hospitals->delete($hospital);

        return redirect()
            ->route('backend.hospital.index')
            ->with('success', __('alerts.backend.deleted'));
    }

    public function delete($id)
    {
        $this->hospitals->forceDelete($id);

        return redirect()
            ->route('backend.hospital.deleted')
            ->with('success', __('alerts.backend.deleted_permanently'));
    }

    public function restore($id)
    {
        $this->hospitals->restore($id);

        return redirect()
            ->route('backend.hospital.deleted')
            ->with('success', __('alerts.backend.restored'));
    }

    public function deleted()
    {
        if (request()->has('search_word')) {
            $hospitals = $this->hospitals->searchDeletedPaginate([
                    'title',
                    '%' . request()->input('search_word') . '%'
                ]);
        } else {
            $hospitals = $this->hospitals->deletedPaginate();
        }

        return view('backend.hospital.index')
            ->with(compact('hospitals'));
    }

    public function getImage(Hospital $hospital)
    {
        return view('backend.hospital.image.index')
            ->with(compact('hospital'));
    }

    public function storeImage(Request $request, Hospital $hospital)
    {

        $hospital->update([
                'image_ids' => implode(',', array_merge(array_filter(explode(',', $hospital->image_ids)), [$request->input('image_id')]))
            ]);

        return api();
    }

    public function updateImage(Request $request, Hospital $hospital, $image_key)
    {

        $image_ids = explode(',', $hospital->image_ids);

        $image_ids[$image_key] = $request->input('image_id');

        $hospital->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return api();
    }

    public function deleteImage(Request $request, Hospital $hospital, $image_key)
    {

        $image_ids = explode(',', $hospital->image_ids);

        unset($image_ids[$image_key]);

        $hospital->update([
                'image_ids' => implode(',', $image_ids)
            ]);

        return redirect()
            ->route('backend.hospital.image.index', $hospital)
            ->with('success', __('alerts.backend.deleted'));
    }
}
