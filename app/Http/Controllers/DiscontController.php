<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscontRequest;
use App\Http\Requests\UpdateDiscontRequest;
use App\Models\Discont;
use Illuminate\Http\Response;

class DiscontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Discont::all(),
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscontRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscontRequest $request)
    {
        $discont = new Discont($request->all());

        return response()->json($discont, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discont  $discont
     * @return \Illuminate\Http\Response
     */
    public function show(Discont $discont)
    {
        return response()->json(
            $discont,
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscontRequest  $request
     * @param  \App\Models\Discont  $discont
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscontRequest $request, Discont $discont)
    {
        $discont['discont'] = $discont->update($request->all());

        return response()->json($discont, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discont  $discont
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discont $discont)
    {
        $status = $discont->delete();

        return response()->json($status, Response::HTTP_OK);
    }
}
