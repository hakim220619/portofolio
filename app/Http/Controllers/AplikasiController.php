<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AplikasiController extends Controller
{
    public function index()
    {
        $title = "Setting Aplikasi";
        $data = Aplikasi::getapk();
        return view('admin.setting_apk', compact('title', "data"));
    }
    public function updateaplikasi(Request $request, $id)
    {
        $data = Aplikasi::find($id);
        // $data->id = "APK" . rand(000, 999);
        if ($request->has('image') == null) {
            $data->nama_owner = $request->nama_owner;
            $data->alamat = $request->alamat;
            $data->tlp = $request->tlp;
            $data->title = $request->title;
            $data->nama_aplikasi = $request->nama_aplikasi;
            $data->copy_right = $request->copy_right;
            $data->version = $request->version;
        } else {
            $data->nama_owner = $request->nama_owner;
            $data->alamat = $request->alamat;
            $data->tlp = $request->tlp;
            $data->title = $request->title;
            $data->nama_aplikasi = $request->nama_aplikasi;
            $data->copy_right = $request->copy_right;
            $data->version = $request->version;
            if ($request->has('image')) {
                $file_path = public_path() . '/images/aplikasi/' . $data->image;
                File::delete($file_path);

                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('images/aplikasi'), $filename);
                $data->image = $request->file('image')->getClientOriginalName();
            }
        }
        if (!$data->update()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating product.');
        }
        return redirect()->route('aplikasi')->with('success', 'Success, your product have been updated.');
        // $data->save();
        // return redirect()->route('aplikasi');
    }
}
