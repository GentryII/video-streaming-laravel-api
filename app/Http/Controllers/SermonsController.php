<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateSermonsRequest;
use App\Sermon;
use App\Sermo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Alert;

class SermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$today = Carbon::now() -> addDay();
        //$lastweek = Carbon::now() -> subWeek();
        //$sermons = Sermon::whereBetween('created_at', [$lastweek, $today])->get();
        $categories = Category::pluck('name');
        $sermons = \DB::table('sermos')->paginate(5);

        //return view('back-end.sermon.create', ['users' => $sermons, 'categories' => $categories]);
        return view('back-end.sermon.create', compact('categories', 'sermons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                //validation
        $this -> validate($request, [
        'title' => 'required',
        'album' => 'required',
        'artist' => 'required',
        'genre' => 'required',
        'source' => 'required|mimes:mpga',
        'image' => 'required',
        'trackNumber' => 'required',
        'totalTrackCount' => 'required',
        'duration' => 'required',
        'site' => 'required'
        ]);
        $formInput = $request -> except('source');
            //audio and image upload
        $audio = $request -> source;
        $image = $request -> image;
        if($audio)
        {
        $audioName = $audio -> getClientOriginalName();
        $audio -> move('source', $audioName);
        $formInput['source'] = "http://10.0.3.2/QuickSermon/public/audios/".$audioName;

        /*$imageName = $image -> getClientOriginalName();
        $image -> move('img', $imageName);
        $formInput['image'] = "http://10.0.3.2/QuickSermon-local/public/img".$imageName;*/
        }
        Sermo::create($formInput);
        \Session::flash("success_message", "Sermon uploaded successfully");

        return redirect('create');
    }



   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $sermon = Sermo::findOrFail($id);
        return view('back-end.sermon.view', compact('sermon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sermon = Sermo::findOrFail($id);
        $categories = Category::pluck('name');
        return view('back-end.sermon.edit', compact('sermon', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sermon = Sermo::findOrFail($id);
        $sermon->title = $request->title;
        $sermon->album= $request->album;
        $sermon->artist = $request->artist;
        //$sermon->genre = $request->genre;
        $sermon->genre = $request->genre;
        $audio = $request -> source;
        if($audio)
        {
            $audioName = $audio -> getClientOriginalName();
            $audio -> move('audios', $audioName);
            $formInput['source'] = $audioName;
            $sermon->audio = $audioName;
        }
        $sermon->image = $request->image;
        $sermon->trackNumber = $request->trackNumber;
        $sermon->totalTrackCount = $request->totalTrackCount;
        $sermon->duration = $request->duration;
        $sermon->site = $request->site;
        $sermon->save();


        //$sermon->update($request->all());
        \Session::flash("update_message", "Sermon updated successfully");
        return redirect('create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sermon = Sermon::findOrFail($id);
        $sermon->forceDelete();

        \Session::flash("deletion_message", "Sermon Deleted");
        return redirect('create');
    }

    public function api($id = null)
    {
            if ($id == null) {
                $products = Sermon::all(array('id', 'title', 'audio'));
            } else {
                $products = Sermon::find($id, array('id', 'name', 'audio'));
            }
            return \Response::json(
                    array('sermons'=>$products)
            );
    }
}
