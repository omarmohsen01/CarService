<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\CarTuningSerSericeInterface;
use App\Http\Requests\Dashboard\CarTuningServiceRequest;
use App\Models\Brand;
use App\Models\CarTuning;
use App\Models\ModelCar;
use Illuminate\Http\Request;

class CarTuningServiceController extends Controller
{
    protected $carTuningSerService;
    public function __construct(CarTuningSerSericeInterface $carTuningSerService)
    {
        $this->carTuningSerService=$carTuningSerService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $car_tuning_services=$this->carTuningSerService->carTuningSerIndex($request);
        $brands=Brand::all();
        return view('dashboard.carTuningService.index', compact(["car_tuning_services",'brands']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedBrandId = $request->input('brand_id');
        $models = ModelCar::where('brand_id', $selectedBrandId)->get();
        $brands=Brand::orderBy('name','asc')->get();
        $car_tunings=CarTuning::get();
        return view('dashboard.carTuningService.create',compact(['brands','models','car_tunings']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarTuningServiceRequest $request)
    {
        // dd($request);
        try{
            $this->carTuningSerService->carTuningSerStore($request);
            return redirect()->route('dashboard.car-tuning-services.index')
                    ->with('success','Your Car Tuning Service Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.car-tuning-services.index')
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->carTuningSerService->carTuningSerDestroy($id);
            return redirect()->route('dashboard.car-tuning-services.index')
            ->with('success','Car Tuning Service Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.car-tuning-services.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }
}
