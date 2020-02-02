<?php

namespace App\Http\Controllers\Admin;

use App\Models\Albums;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumsController extends Controller
{
    public function index()
    {
     $albums = Albums::all();
     return view('admin.albums')->with('albums', $albums);
    }

    public function save(Request $request)
    {
      $albums = new Albums;

      $albums->name = $request->input('name');
      $albums->year = $request->input('year');
      $albums->singer = $request->input('singer');
      $albums->genre = $request->input('genre');

      $albums->save();
      
      return redirect('/albums')->with('success','Album is added.');
    }

    public function edit($id)
    {
      $albums = Albums::findOrFail($id);
      
      return view('admin.albums.edit') -> with('albums',$albums);
    }

    public function saving(Request $request, $id)
    {
      $albums = Albums::findOrFail($id);
      $albums->name = $request->input('name');
      $albums->year = $request->input('year');
      $albums->singer = $request->input('singer');
      $albums->genre = $request->input('genre');
      $albums->save();

      return redirect('albums')->with('status','The changes have been saved.');
    }

    public function delete($id)
    {
      $albums = Albums::findOrFail($id);
      $albums->delete();

      return redirect('albums')->with('status','The album is deleted.');
    }

}
