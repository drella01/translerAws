<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\MachineryPart;
use Validator;
use Storage;
use File;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Vehicle $vehicle)
    {
        return $vehicle->photos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vehicle $vehicle)
    {
        $x = Photo::where('vehicle_id',$vehicle->id)->count();
        $rules=[];
        foreach($request->photo as $photo){
            $rules = array('photo'=>'mimes:pdf,png,jpeg,jpg,gif|max:20000');
            $validator = Validator::make(array('photo' => $photo), $rules);
            if($validator->fails())
            {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors);
            }

            $extension = $photo->getClientOriginalExtension();
            $filename = $vehicle->registration.'_'.uniqid().'.'.$extension;
            $path = Storage::disk('s3')->putFileAs('photos/'.$vehicle->registration, $photo,$filename);
            $path = Storage::disk('s3')->url($path);
            $photo = Photo::create(['url'=>$path,'ordered'=>$x]);
            $vehicle->photos()->save($photo);
            $x += 1;
        }
        return redirect()->back()->with('info','Foto/s añadida '.$path);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo, Vehicle $vehicle)
    {
        return $photo;//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo, Request $request)
    {
        $photos=Photo::where('vehicle_id',$photo->vehicle_id)->get();
        $item1 = explode('/',$photo->url)[1];
        $item2 = explode('/',$photo->url)[2];
        $item3 = explode('/',$photo->url)[3];
        $url = $item1.'/'.$item2.'/'.$item3;
        if(File::exists('storage/app/public/'.$url)){
            File::delete('storage/app/public/'.$url);
        }
        dd($photo);
        $photo->delete();
        return back();
    }

    /**
     * Remove select specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroyselection(Vehicle $vehicle,Request $request)
    {
        $photos = Photo::where('vehicle_id',$vehicle->id)->orderBy('ordered')->get();
        $test=collect();
        $test1=collect();
        $items=count($request->testing);
        foreach($request->testing as $item){
            $test->push($item);
            $item1 = explode('/',$item)[1];
            $item2 = explode('/',$item)[2];
            $item3 = explode('/',$item)[3];
            $url = $item1.'/'.$item2.'/'.$item3;
            if(File::exists('storage/app/public/'.$url)){
                File::delete('storage/app/public/'.$url);
            }
            Storage::disk('s3')->delete($item);
            $photo=Photo::where('url',$item)->first();
            $photo->delete();
        }
        return back()->with('info',$items.' fotos seleccionadas eliminadas');
    }

    public function destroyall(Vehicle $vehicle,Request $request)
    {
        $photos = Photo::where('vehicle_id',$vehicle->id)->orderBy('ordered')->get();
        foreach($photos as $photo){
            $item1 = explode('/',$photo)[1];
            $item2 = explode('/',$photo)[2];
            $item3 = explode('/',$photo)[3];
            $url = $item1.'/'.$item2.'/'.$item3;
            if(File::exists('storage/app/public/'.$url)){
                File::delete('storage/app/public/'.$url);
            }
            $photo->delete();
            Storage::disk('s3')->delete($photo);
        }
        $dir = 'photos/'.$vehicle->registration;
        Storage::disk('public')->deleteDirectory($dir);
        return back()->with('info',' Todas las fotos del vehículo eliminadas');
    }


    public function reorderAll(Vehicle $vehicle)
    {
        $photos = Photo::where('vehicle_id',$vehicle->id)->orderBy('ordered')->get();
        return view('reorder', compact('photos','vehicle'));
    }

    public function reorder(Request $request)
    {
        $photos = Photo::where('vehicle_id',$request->vehicle)->get();

        foreach ($request->values as $key => $value) {
            $photo = $photos->find($value);
            $photo->ordered = $key;
            $photo->update();
        }

        return response()->json(['redirect' => url('/photos')]);
    }

    public function reorderAllMachinery(MachineryPart $machineryPart)
    {
        $photos = Photo::where('machinery_part_id',$machineryPart->id)->orderBy('ordered')->get();
        return view('machineryparts.reorder', compact('photos','machineryPart'));
    }

    public function reorderMachinery(Request $request)
    {
        $photos = Photo::where('machinery_part_id',$request->vehicle)->get();

        foreach ($request->values as $key => $value) {
            $photo = $photos->find($value);
            $photo->ordered = $key;
            $photo->update();
        }

        return response()->json(['redirect' => url('/photos')]);
    }
}
