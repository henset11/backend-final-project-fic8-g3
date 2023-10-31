<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\AbsensiMatkul;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AbsensiMatkulController extends Controller
{
    

    public function index(Request $request)
    {
        $absensi_matkuls = DB::table('absensi_matkuls')
            ->select('absensi_matkuls.*', 'users.name', 'schedules.hari')
            ->join('users', 'absensi_matkuls.student_id', '=', 'users.id')
            ->join('schedules', 'absensi_matkuls.schedule_id', '=', 'schedules.id')

            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->orderBy('absensi_matkuls.id', 'desc')
            ->paginate(10);

        return view('pages.absensi.index', compact('absensi_matkuls'));
    }


    public function create()
    {

        $schedules = Schedule::get();
        $users = User::where('roles', 'mahasiswa')->get();
        $loginUser = Auth::user();
        return view('pages.absensi.create', compact('schedules', 'users', 'loginUser'));
    }

   

    
    public function store(StoreAbsensiRequest $request)
    {
       
        AbsensiMatkul::create($request->all());
        return redirect(route('absensiweb.index'))->with('success', 'New Absensi Successfully');
    }




    public function edit($id)
    {

        $absensimatkul = AbsensiMatkul::select('absensi_matkuls.*', 'users.name', 'schedules.hari', 'schedules.jam_mulai', 'schedules.jam_selesai')
        ->join('users', 'absensi_matkuls.student_id', '=', 'users.id')
        ->join('schedules', 'absensi_matkuls.schedule_id', '=', 'schedules.id')
        ->find($id);

        return view('pages.absensi.edit', compact('absensimatkul'));
    }

 

    
    public function update(Request $request, $id)
    {
        $absensimatkul = AbsensiMatkul::find($id);

        $absensimatkul->update($request->all());

        return redirect()->route('absensiweb.index')->with('success', 'Absensi updated successfully');
    }


 

    public function destroy(string $id)
    {
        $absensi = AbsensiMatkul::select('absensi_matkuls.*', 'users.name', 'schedules.hari')
        ->join('users', 'absensi_matkuls.student_id', '=', 'users.id')
        ->join('schedules', 'absensi_matkuls.schedule_id', '=', 'schedules.id')
        ->find($id);

        $absensi->delete();
        return redirect()->route('absensiweb.index')->with('success', 'Delete KHS Successfully');
    }



}
