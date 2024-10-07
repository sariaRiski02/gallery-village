<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Throwable;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{


    public function listImage()
    {
        $url = Images::all();
        $container = [];
        $url->each(function ($item) use (&$container) {
            $container[] = collect([
                'id' => $item->id,
                'url' => Storage::url($item->url),
            ]);
        });

        $result = collect($container)->chunk(ceil(collect($container)->count() / 3));
        return view('app', compact('result'));
    }


    public function singleImage($id)
    {
        $image = Images::find($id);
        $data = [
            'url' => Storage::url($image->url),
            'image' => $image
        ];
        return view('image', compact('data'));
    }


    public function add(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        $file = $request->file('image');
        $path = Storage::disk('s3')->put('images', $file, 'public');
        if (!$path) {
            return redirect()->back()->with([
                "error" => "Gagal mengupload"
            ]);
        }
        $url = Images::create([
            'url' => $path
        ]);
        if (!$url) {
            return redirect()->back()->with([
                "error" => "Gagal mengupload"
            ]);
        }
        return redirect()->back()->with([
            "success" => "Anda berhasil mengupload image"
        ]);
    }
    public function delete($id)
    {


        $image = Images::find($id);
        if (!$image) {
            return redirect()->back()->with([
                'error' => "gambar tidak ditemukan"
            ]);
        }
        $result = Storage::disk('s3')->delete($image->url);
        if (!$result) {
            return redirect()->back()->with([
                'error' => "gambar gagal dihapus"
            ]);
        }
        $image->delete();
        return redirect()->route('home');
    }
}
