<?php

namespace App\Http\Controllers;

use App\Church;
use App\Denomination;
use Illuminate\Http\Request;

class ChurchesController extends Controller
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
        //$churches = Church::all();
        $churches = \DB::table('churches')->paginate(5);
        return view('back-end.church.create', compact('churches'));
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
            'church' => 'required',
            'location' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg',
            'route' => 'required'
        ]);
        $formInput = $request -> except('logo');
        //logo upload
        $logo = $request -> logo;
        if($logo)
        {
            $logoName = $logo -> getClientOriginalName();
            $logo -> move('church-logos', $logoName);
            $formInput['logo'] = "/QuickSermon/public/church-logos/".$logoName;
        }
        Church::create($formInput);

        \Session::flash("success_message", "Church added successfully");
        return redirect('create-church');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $church = Church::findOrFail($id);
        return view('back-end.church.view', compact('church'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $church = Church::findOrFail($id);
        return view('back-end.church.edit', compact('church'));
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
        $church = Church::findOrFail($id);
        $church->church = $request->church;
        $church->location = $request->location;
        $church->route = $request->route;
        $logo = $request -> logo;
        if($logo)
        {
            $logoName = $logo -> getClientOriginalName();
            $logo -> move('church-logos', $logoName);
            $formInput['audio'] = $logoName;
            $church->logo = $logoName;
        }
        $church->save();


        //$sermon->update($request->all());
        \Session::flash("update_message", "Church updated successfully");
        return redirect('create-church');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sermon = Church::findOrFail($id);
        $sermon->forceDelete();

        \Session::flash("deletion_message", "Church Deleted");
        return redirect('create-church');
    }
}
