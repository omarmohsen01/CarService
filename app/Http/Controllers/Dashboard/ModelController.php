<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\ModelSericeInterface;
use App\Http\Requests\Dashboard\ModelRequest;
use App\Models\Brand;
use App\Models\ModelCar;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    protected $modelService;
    public function __construct(ModelSericeInterface $modelService)
    {
        $this->modelService = $modelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands=Brand::all();
        $models = $this->modelService->modelIndex($request);
        return view('dashboard.model.index', compact('models','brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands=Brand::all();
        return view('dashboard.model.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModelRequest $request)
    {
        try{
            $this->modelService->modelStore($request);
            return redirect()->route('dashboard.models.index')
                ->with('success','Model Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.models.index')
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
        $brands=Brand::all();
        $model=ModelCar::findOrFail($id);
        return view('dashboard.model.edit',compact('model','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModelRequest $request, string $id)
    {
        try{
            $this->modelService->modelUpdate($request, $id);
            return redirect()->route('dashboard.models.index')
                ->with('success','Model Updated Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.models.index')
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
            $this->modelService->modelDestroy($id);
            return redirect()->route('dashboard.models.index')
            ->with('success','Model Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.models.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }
}
