<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Traits\Common;
 

class CarController extends Controller
{
    
    // private $columns = ['title','description', 'published'];

    use common;

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $cars = Car::get();
        return view("cars", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return dd($request->request) ; 
        // //------- Static insertions----------------
        // $car = new Car();
        // $car->title = $request->title;
        // $car->description = $request->description;
        // if(isset($request->published)){
        //     $car->published = 1 ;
        // }
        // else{
        //     $car->published = 0 ;
        // }
        // $car->save();

        // return 'Data added successfully';

        // // -----------------------------------------------

        // $data = $request->only($this->columns);
        $errorMessages= $this->messages();
        $data= $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',

        ], $errorMessages);
        $fileName= $this->uploadFile($request->image,'assets/images');
        $data['published'] = isset($request->published);
        $data['image'] = $fileName;
        Car::create($data);
        return redirect("cars");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = car::findOrFail($id);
        return view('showCar', compact('car') );

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = car::findOrFail($id);
        return view('updateCar', compact('car') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // -------------- task Day 7 ---------------

        $errorMessagesUpdate= $this->messages();
        $data= $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        ], $errorMessagesUpdate);
        $fileName= $this->uploadFile($request->image,'assets/images');
        $data['published'] = isset($request->published);        
        Car::where('id', $id)->update($data);
        return redirect("cars");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        car::where('id', $id)->delete();
        return redirect("cars");
    }

    public function trashed()
    {
        $cars = car::onlyTrashed()->get();
        return view('trashedCar',compact('cars'));
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect("cars");
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect("cars");
    }

    public function messages(){
       return[
            'title.required'=>'العنوان مطلوب',
            'title.string'=>'Should be string',
            'description.required'=> 'should be text',
            'image.required'=> 'Please selcet car image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',


            ];
    }
}
