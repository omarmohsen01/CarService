<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\BrandSericeInterface;
use App\Http\Requests\Dashboard\BrandRequest;
use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Monarobase\CountryList\CountryListFacade;

class BrandController extends Controller
{
    protected $brandService;
    public function __construct(BrandSericeInterface $brandService)
    {
        $this->brandService = $brandService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Gate::authorize('accessBrandController',Admin::class);
        $countries = CountryListFacade::getList();
        $brands = $this->brandService->brandIndex($request);
        return view('dashboard.brand.index', compact('brands','countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Gate::authorize('createBrand',Admin::class);
        $countries = CountryListFacade::getList();
        return view('dashboard.brand.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        // Gate::authorize('createBrand',Admin::class);
        try{
            $this->brandService->brandStore($request);
            return redirect()->route('dashboard.brands.index')
                ->with('success','Brand Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.brands.index')
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
        // Gate::authorize('editBrand',Admin::class);

        $countries = CountryListFacade::getList();
        $brand=Brand::findOrFail($id);
        return view('dashboard.brand.edit',compact(['brand','countries']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        // Gate::authorize('editBrand',Admin::class);

        try{
            $this->brandService->brandUpdate($request, $id);
            return redirect()->route('dashboard.brands.index')
                ->with('success','Brand Updated Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.brands.index')
                ->with('fail','Not Updated,Please Try Again');
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Gate::authorize('deleteBrand',Admin::class);

        try{
            $this->brandService->brandDestroy($id);
            return redirect()->route('dashboard.brands.index')
            ->with('success','Brand Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.brands.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }
}
