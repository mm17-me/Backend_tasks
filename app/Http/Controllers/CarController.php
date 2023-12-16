<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $columns = ['title','description', 'published'];


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

        $data = $request->only($this->columns);
        $data['published'] = isset($request->published);
        car::create($data);
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
        $data = $request->only($this->columns);
        $data['published'] = isset($request->published);
        car::where('id', $id)->update($data);
        return redirect("cars");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
