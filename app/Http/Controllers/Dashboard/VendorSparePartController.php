<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\VendorSparePartServiceInterface;
use App\Http\Requests\Dashboard\VendorSparePartRequest;
use App\Models\Brand;
use App\Models\ModelCar;
use App\Models\SpareModel;
use App\Models\SparePart;
use Illuminate\Http\Request;

class VendorSparePartController extends Controller
{
    protected $sparePartService;
    public function __construct(VendorSparePartServiceInterface $sparePartService)
    {
        $this->sparePartService = $sparePartService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $spare_parts=$this->sparePartService->sparePartIndex($request);
        $brands=Brand::all();
        $models=SpareModel::get();
        return view('dashboard.spare_part.spare_part_vendor.index', compact(["spare_parts",'brands']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $selectedBrandId = $request->input('brand_id');
        $models = ModelCar::where('brand_id', $selectedBrandId)->get();
        $brands=Brand::orderBy('name','asc')->get();
        return view('dashboard.spare_part.spare_part_vendor.create',compact(['brands','models']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorSparePartRequest $request)
    {
        try{
            // dd($request);
            $this->sparePartService->sparePartStore($request);
            return redirect()->route('dashboard.vendor-spare-parts.index')->with('success','Your Spare Part Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.vendor-spare-parts.index')
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
            $this->sparePartService->sparePartDestroy($id);
            return redirect()->route('dashboard.vendor-spare-parts.index')
            ->with('success','Spare Part Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.vendor-spare-parts.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }

}
