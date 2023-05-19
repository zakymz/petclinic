<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::whereNull('delete_at')->orderBy('created_at', 'desc')->get();
        $customers = User::where('role', 'user')->orderBy('created_at', 'desc')->get();

        return view('admin.pet.index', compact('pets', 'customers'));
    }

    public function store(Request $request)
    {
        Pet::create([
            'user_id'       => $request->user_id,
            'name'          => $request->name,
            'alias_name'    => $request->alias_name,
            'age'           => $request->age,
            'weight'        => $request->weight,
            'height'        => $request->height,
            'complaint'     => $request->complaint,
            'created_by'    => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Berhasil simpan data.',
            'title'     => 'Hewan'
        ];

        return redirect()->back()->with($notif);
    }

    public function edit($id)
    {
        $pet = Pet::find($id);

        return view('admin.pet.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        Pet::where('id', $id)->update([
            'name'              => $request->name,
            'alias_name'        => $request->alias_name,
            'age'               => $request->age,
            'weight'            => $request->weight,
            'height'            => $request->height,
            'complaint'         => $request->complaint,
            'updated_by'        => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Berhasil update data.',
            'title'     => 'Hewan'
        ];

        return redirect()->route('pet.index')->with($notif);
    }

    public function delete($id)
    {
        $pet = Pet::find($id);
        $pet->delete_at = Carbon::now();
        $pet->save();

        $notif = [
            'message'   => 'Berhasil hapus data',
            'title'     => 'Hewan',
        ];

        return redirect()->route('pet.index')->with($notif);
    }

    public function checkPet(Request $request)
    {
        $pets = Pet::where('user_id', $request->get('id'))->whereNull('delete_at')->pluck('id', 'alias_name');

        return response()->json($pets);
    }
}
