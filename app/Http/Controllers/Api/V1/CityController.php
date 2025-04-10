<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

/**
 * @OA\Server(url="http://locator.test")
 */
class CityController extends Controller
{
    /**
     * Get the list of cities.
     * 
     *  @OA\SecurityScheme(
     *     securityScheme="bearerAuth",
     *     type="http",
     *     scheme="bearer",
     *     bearerFormat="JWT",
     * )
     * 
     * @OA\Get(
     *     path="/api/v1/city",
     *     operationId="getCities",
     *     tags={"City"},
     *     summary="Get the list of cities",
     *     security={{ "bearerAuth": {} }},
     *     description="Returns the list of cities with their associated province",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *     )
     * )
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return City::with('province:id,name')->limit(10)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}