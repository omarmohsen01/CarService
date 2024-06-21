<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\VendorSparePartServiceInterface;
use App\Http\Requests\Dashboard\VendorSparePartRequest;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\ModelCar;
use App\Models\SpareModel;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        Gate::authorize('accessSparePartController',Admin::class);
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
        Gate::authorize('createSparePart',Admin::class);
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
        Gate::authorize('createSparePart',Admin::class);

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
        Gate::authorize('editSparePart',Admin::class);

        $spare_part = SparePart::find($id);
        return view('dashboard.spare_part.spare_part_vendor.edit', compact(['spare_part']));
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
        Gate::authorize('deleteSparePart',Admin::class);

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
