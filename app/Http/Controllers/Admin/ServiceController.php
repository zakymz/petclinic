<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->whereNull('delete_at')->get();

        return view('admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'price'         => 'required',
        ]);

        $file = $request->file('image');
        $name_file = time()."_".$file->getClientOriginalName();
        
        $destination = 'assets_admin/img_service';
        $file->move($destination, $name_file);

        Service::create([
            'name'      => $request->name,
            'description'   => $request->description,
            'image'         => $name_file,
            'price'         => str_replace('.', '', $request->price),
            'created_by'    => Auth::user()->id,
        ]);

        $notif = array(
            'message'   => 'Berhasil tambah layanan.',
            'title'     => 'Layanan'
        );

        return redirect()->back()->with($notif);
    }

    public function edit($id)
    {
        $service = Service::where('id', $id)->first();

        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        if($request->image) {
            $file = $request->file('image');
            $acak  = $file->getClientOriginalExtension();
            $fileName = time().'-'.$acak; 
            $request->file('image')->move("assets_admin/img_service", $fileName);
            $cover = $fileName;
        } else {
            $cover = $request->image_lama;
        }

        Service::where('id', $id)->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $cover,
            'price'         => str_replace('.', '', $request->price),
            'updated_by'    => Auth::user()->id,
        ]);

        $notif = [
            'message'   => 'Berhasil update layanann.',
            'title'     => 'Layanan',
        ];

        return redirect()->route('service.index')->with($notif);
    }

    public function delete($id)
    {
        Service::where('id', $id)->update([
            'delete_at' => Carbon::now(),
            'updated_by'    => Auth::user()->id,
        ]);

        $service = Service::find($id);

        // $image_path = public_path().'/assets_admin/img_service/'.$service->image;
        // unlink($image_path);

        $notif = [
            'message'   => 'Berhasil hapus layanan.', 
            'title'     => 'Layanan',
        ];

        return redirect()->route('service.index')->with($notif);
    }

    public function checkService(Request $request)
    {
        $price = Service::where('id', $request->get('id'))->pluck('id', 'price');

        return response()->json($price);
    }
}
