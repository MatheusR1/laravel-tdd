<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupCityRequest;
use App\Http\Requests\UpdateGroupCityRequest;
use App\Models\Group;
use App\Models\GroupCity;
use Illuminate\Http\Response;

class GroupCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            GroupCity::all(),
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupCityRequest $request)
    {
        $group = new GroupCity($request->all());

        return response()->json($group, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupCity  $groupCity
     * @return \Illuminate\Http\Response
     */
    public function show(GroupCity $groupCity)
    {
        return response()->json(
            $groupCity,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupCityRequest  $request
     * @param  \App\Models\GroupCity  $groupCity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupCityRequest $request, GroupCity $groupCity)
    {
        $group = tap($groupCity)->update($request->all());

        return response()->json(compact('group'), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupCity  $groupCity
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupCity $groupCity)
    {
        $group = $groupCity->delete();

        return response()->json(compact('group'), Response::HTTP_OK);
    }
}
