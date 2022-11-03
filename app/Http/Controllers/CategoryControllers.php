<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryControllers extends Controller
{
    public function index()
    {

        $title = "Category";
        $data = DB::table('category')->get();
        return view('admin.category', ['title' => $title, 'data' => $data]);
    }
    public function LoadData()
    {
        $data = DB::table('category')->get();
        echo json_encode($data);
    }
    public function edit($id)
    {
        $data = DB::table('category')->where('id', $id)->first();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function proses_add_category(Request $request)
    {
        // dd($request->all());
        // $validated = $request->validate([
        //     'name_category' => 'required',
        // ]);
        // if ($validated == true) {
        //     # code...
        // }
        DB::table('category')->insert([
            'name_category' => $request->name_category
        ]);
        Alert::success('Success', 'Category Added Successfully');
        return redirect()->route('Category');
    }
    public function proses_edit_category(Request $request, $id)
    {
        // dd($request->all());
        DB::table('category')->where('id', $id)->update([
            'name_category' => $request->name_category
        ]);
        Alert::success('Success', 'Category Modified Successfully');
        return redirect()->route('Category');
    }
    public function DeleteCategory(Request $request)
    {
        DB::table('category')->where('id', $request->id)->delete();
        return $this->LoadData;
    }
}
