<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
use App\Models\Documents;
use RealRashid\SweetAlert\Facades\Alert;

class DocController extends Controller
{
    public function uploadView()
    {
        return view("docupload");
    }

    public function docView(Request $req)
    {
        $id = $req->session()->get('username.id');
        // $data = Documents::all();
        $data = Documents::where('user_id', $id)->get();
        return view('docfile', compact('data'));
    }


    public function store(Request $req)
    {
        $req->validate(
            [
                "file" => "required|mimes:pdf",
            ]
        );
        $data = new Documents();

        $file = $req->file;
        $filename = time() . "." . $file->extension();
        $req->file->move(public_path('/assets'), $filename);

        $data->file = $filename;

        $data->name = $req->name;
        $data->desc = $req->desc;
        $data->file = $filename;

        $data->user_id = $req->session()->get('username.id');

        $data->save();
        // Alert::success("Docuemnt Added Successfully", "Check your documents");
        return redirect("/showdocuments");
    }

    public function download(Request $req, $file)
    {
        $path = public_path('assets/' . $file);
        return response()->download($path);
    }
    public function view($id)
    {
        $data = Documents::find($id);
        return view("View", compact('data'));
    }

    public function delete(Documents $id)
    {
        $id->delete();
        return redirect()->back();
    }


}