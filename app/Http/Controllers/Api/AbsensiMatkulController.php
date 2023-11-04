<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AbsensiMatkulRequest;
use App\Http\Resources\AbsensiResource;
use App\Models\AbsensiMatkul;
use Illuminate\Http\Request;

class AbsensiMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $absensiMatkul = AbsensiMatkul::where('student_id', '=', $user->id)->paginate(10);
        return AbsensiResource::collection($absensiMatkul->load('schedule', 'schedule.subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiMatkulRequest $request)
    {
        $absensiMatkul = AbsensiMatkul::create($request->all());
        return $absensiMatkul;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
