<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\SpareModel;
use App\Models\SparePart;
use Illuminate\Http\Request;

class AdminSparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $spare_parts=SparePart::filter($request->query())->paginate(10);
        $brands=Brand::all();
        $models=SpareModel::get();
        $admins = Admin::join('spare_parts', 'admins.id', '=', 'spare_parts.admin_id')
                ->distinct()
                ->get(['admins.*']);
        return view('dashboard.spare_part.spare_part_admin.index',compact('spare_parts','brands','models','admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            $spare_part=SparePart::find($id);
            $spare_part->delete();
            return redirect()->route('dashboard.spare-parts.index')
            ->with('success','Spare Part Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.spare-parts.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }
}
