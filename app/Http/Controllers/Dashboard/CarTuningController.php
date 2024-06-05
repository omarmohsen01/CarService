<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\CarTuningServiceInterface;
use App\Models\CarTuning;
use Illuminate\Http\Request;

class CarTuningController extends Controller
{
    protected $carTuningService;
    public function __construct(CarTuningServiceInterface $carTuningService)
    {
        $this->carTuningService = $carTuningService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carTunings = $this->carTuningService->carTuningIndex();
        return view('dashboard.carTuning.index', compact('carTunings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.carTuning.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:3|max:255',
            'description'=>'nullable'
        ]);
        try{
            $this->carTuningService->carTuningStore($request);
            return redirect()->route('dashboard.car-tunings.index')
                ->with('success','Car Tuning Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.Car-tunings.index')
                ->with('fail','Something Went Wrong,Please Try Again');
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $carTuning=CarTuning::findOrFail($id);
        return view('dashboard.carTuning.edit',compact('carTuning'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $this->carTuningService->carTuningUpdate($request, $id);
            return redirect()->route('dashboard.car-tunings.index')
                ->with('success','Car Tuning Updated Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.car-tunings.index')
                ->with('fail','Not Updated,Please Try Again');
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->carTuningService->carTuningDestroy($id);
            return redirect()->route('dashboard.car-tunings.index')
            ->with('success','Car Tuning Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.car-tunings.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }
}
