<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Whoops\Run;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::all();
        return view('datalaptop', compact('data'));
    }

    public function tambahitem()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $data = Item::create($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $result = CloudinaryStorageController::upload($image->getRealPath(), $image->getClientOriginalName());
            $data->update(['image' => $result]);
        }

        return redirect()->route('laptop')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function ubahdata($id)
    {
        $data = Item::find($id);
        // dd($data);
        return view('ubahdata', compact('data'));
    }

    public function updatedata(Request $request, Item $item, $id)
    {
        // testing
        $data = Item::find($id);
        $file = $request->file('image');
        $result = CloudinaryStorageController::replace($item->image, $file->getRealPath(), $file->getClientOriginalName());
        $data->update($request->all());
        $data->update(['image' => $result]);
        return redirect()->route('laptop')->with('success', 'Data Berhasil Diperbarui');
    }

    public function deletedata($id)
    {
        $data = Item::find($id);
        $data->delete();
        return redirect()->route('laptop')->with('success', 'Data Berhasil Dihapus');
    }

    public function uploadfile() {
        return view('uploadfile');
    }

    // public function showUploadForm()
    // {
    //     return view('uploadfile');
    // }

    public function cloudUploads(Request $request)
    {
        $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();
        dd($response);
        return back()->with('success', 'File uploaded successfully');
    }
}
