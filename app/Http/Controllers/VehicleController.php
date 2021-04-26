<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Type;
use App\Models\Document;
use App\Models\Photo;
use App\Models\InfoVehicle;
use App\Models\Brand;
use App\Models\Axle;
use Illuminate\Http\Request;
use App\Http\Requests\CreateVehicleRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;
use Storage;

class VehicleController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Type $types, $id)
    {
        //$type = $types->whereName($id)->first(); //injecting Model in function
        try {
            $type = Type::whereName($id)->first();
            //$vehicles = $type->vehicles;
            $vehicles = Vehicle::with('photos','documents')->whereType_id($type->id)->get();
            return view('vehicles.index',compact('type','vehicles'))->with('info','BUENOS DIAS');
        } catch (\Throwable $th) {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $brands = Brand::all();
        return view('vehicles.create',compact('types','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\CreateVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request)
    {
        $brakes = collect();
        $vehicle = Vehicle::create($request->all());

        for($x=0;$x<count($request->brake);$x++){
            if($request->brake[$x]){
                $brakes->add($request->brake[$x]);
                $axle = Axle::create(['brake'=>$request->brake[$x],'suspension'=>$request->suspension[$x]]);
                $vehicle->axles()->save($axle);
            }
            if(!$request->suspension[$x]){
                $brakes->add($request->suspension[$x]);
            }
        }

        if($request->has('photo')){
            $rules=[];
            $x = 1;
            foreach($request->photo as $photo){
                $rules = array('photo'=>'mimes:pdf,png,jpeg,jpg,gif|max:20000');
                $validator = Validator::make(array('photo' => $photo), $rules);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $path = 'photos/'.$vehicle->registration;
                $response = Storage::makeDirectory('public/'.$path);
                $filename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $filename = $vehicle->registration.'_'.$x.'.'.$extension;
                $url = Storage::putFileAs('public/'.$path, $photo, $filename);
                $url = str_replace('public','storage',$url);
                $photo = Photo::create(['url'=>$url]);
                $vehicle->photos()->save($photo);
                $x += 1;
            }
        }

        if($request->has('document')){
            $rules=[];
            $y=1;
            foreach($request->document as $document){
                $rules = array('document'=>'mimes:pdf,png,jpeg,jpg,gif|max:2000');
                $validator = Validator::make(array('document' => $document), $rules);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $path = 'public/documents/'.$vehicle->registration;
                $response = Storage::makeDirectory($path);
                $extension = $document->getClientOriginalExtension();
                $documentname = $vehicle->registration.'_'.$y.'.'.$extension;
                $url = Storage::putFileAs($path, $document, $documentname);
                $url = str_replace('public','storage',$url);
                $document = Document::create(['url'=>$url]);
                $vehicle->documents()->save($document);
                $y += 1;
            }
        }

        /** Generamos pdf y almacenamos en Storage*/
        $pdf = PDF::loadView('vehicles.infopdf',['vehicle' => $vehicle]);
        $pdf->setPaper('a4');
        $url = 'storage/pdf/'.$vehicle->registration.'.pdf';
        $pdf->save('storage/pdf/'.$vehicle->registration.'.pdf');
        $vehiclepdf = InfoVehicle::create(['url'=>$url]);
        $vehicle->pdf()->save($vehiclepdf);

        return redirect()->route('vehicles.create')->with('info','Vehículo dado de alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $photos = $vehicle->photos()->pluck('url');
        $i = 0;
        $j = $vehicle->photos()->count();
        return view('vehicles.show',compact('photos','vehicle','i','j'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $photos = $vehicle->photos()->pluck('url');
        return view('vehicles.edit',compact('photos','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        if(!$vehicle->pdf){
            $pdf = PDF::loadView('vehicles.infopdf',['vehicle' => $vehicle]);
            $pdf->setPaper('a4');
            $url = 'storage/pdf/'.$vehicle->registration.'.pdf';
            $pdf->save('storage/pdf/'.$vehicle->registration.'.pdf');
            $vehiclepdf = InfoVehicle::create(['url'=>$url]);
            $vehicle->pdf()->save($vehiclepdf);
        }
        return back()->with('info', 'Vehículo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
