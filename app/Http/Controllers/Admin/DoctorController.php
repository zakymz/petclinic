<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::whereNull('delete_at')->orderBy('created_at', 'desc')->get();

        return view('admin.doctor.index', compact('doctors'));
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $name_file = time()."_".$file->getClientOriginalName();
        
        $destination = 'assets_admin/img_doctor';
        $file->move($destination, $name_file);

        Doctor::create([
            'nama'      => $request->nama,
            'keahlian'  => $request->keahlian,
            'tanggal_lahir' => $request->tanggal_lahir,
            'photo'         => $name_file,
            'created_by'    => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Berhasil tambah dokter.',
            'title'     => 'Dokter',
        ];

        return redirect()->back()->with($notif);
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        return view('admin.doctor.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        if($request->photo) {
            $file = $request->file('photo');
            $acak  = $file->getClientOriginalExtension();
            $fileName = time().'-'.$acak; 
            $request->file('photo')->move("assets_admin/img_doctor", $fileName);
            $dokter = $fileName;
        } else {
            $dokter = $request->photo_lama;
        }

        Doctor::where('id', $id)->update([
            'nama'      => $request->nama,
            'keahlian'  => $request->keahlian,
            'tanggal_lahir' => $request->tanggal_lahir,
            'photo'         => $dokter,
            'updated_by'    => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Berhasil update data dokter.',
            'title'     => 'Dokter',
        ];

        return redirect()->route('doctor.index')->with($notif);
    }

    public function delete($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete_at = Carbon::now();
        $doctor->save();

        $notif = [
            'message'   => 'Berhasil menghapus data',
            'title'     => 'Dokter',
        ];

        return redirect()->route('doctor.index')->with($notif);
    }
}
