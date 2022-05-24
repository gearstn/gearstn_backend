<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Service\Entities\Service;
use Modules\Service\Http\Requests\StoreServiceRequest;
use Modules\Service\Http\Resources\ServiceResource;
use App\Classes\CollectionPaginate;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $services = Service::where('approved', '=', 1)->paginate(number_in_page());
        return ServiceResource::collection($services)->additional(['status' => 200, 'message' => 'Services fetched successfully']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreServiceRequest $request)
    {
        $inputs = $request->validated();
        $service = Service::create($inputs);
        return response()->json(new ServiceResource($service), 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $service = Service::find($id)->firstOrFail();
        return response()->json(new ServiceResource($service), 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(new ServiceResource($service), 200);
    }


    public function search_filter(Request $request): AnonymousResourceCollection
    {
        $inputs = $request->all();
        //Full Search in all fields
        if (isset($inputs['search_query']) && $inputs['search_query'] != null) {
            $q = Service::search($inputs['search_query'])->get();
        } else {
            $q = Service::all();
        }

        //Converting result to Resources Collection
        ServiceResource::collection($q);

        //Filter for every attribute we want to filter
        $q = items_filter($q, 1, 'approved'); // To get approved
        $q = items_filter($q, isset($inputs['country_id']) ? $inputs['country_id'] : null, 'country_id');
        $q = items_filter($q, isset($inputs['city_id']) ? $inputs['city_id'] : null, 'city_id');
        $q = items_filter($q, isset($inputs['service_type_id']) ? $inputs['service_type_id'] : null, 'service_type_id');

        //Sort the collection of machines if requested
        $q = $q->when(isset($inputs['sort_by']) && $inputs['sort_by'] != null, function ($q) use ($inputs) {
            $sort = explode('_', $inputs['sort_by']);
            if ($sort[1] == 'asc') {
                return $q->sortBy($sort[0]);
            } else {
                return $q->SortByDesc($sort[0]);
            }

        });

        //Adding Pagination to a collection
        $paginatedResult = CollectionPaginate::paginate($q, 10);
        return ServiceResource::collection($paginatedResult)->additional(['status' => 200, 'message' => 'Services fetched successfully']);
    }

}
