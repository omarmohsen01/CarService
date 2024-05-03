<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\AdminSericeInterface;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;
    public function __construct(AdminSericeInterface $adminService)
    {
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = $this->adminService->adminIndex($request);
        return view('dashboard.admin.index', compact("admins"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $created=$this->adminService->adminStore($request);
        if($created){
            return redirect()->route('dashboard.admins.index')->with('success','Admin Or Vendor Created Successfully');
        }else{
            return redirect()->route('dashboard.admins.index')->with('fail','Something Went Wrong,Please Try Again');
        }
        try{
            $this->adminService->adminStore($request);
            return redirect()->route('dashboard.admins.index')
                ->with('success','Admin Or Vendor Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.admins.index')
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
        $admin=Admin::findOrFail($id);
        return view('dashboard.admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        try{
            $this->adminService->adminUpdate($request, $id);
            return redirect()->route('dashboard.admins.index')
                ->with('success','Admin Or Vendor Updated Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.admins.index')
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
            $this->adminService->adminDestroy($id);
            return redirect()->route('dashboard.admins.index')
            ->with('success','Admin Or Vendor Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.admins.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }

    public function change_admin_status(string $id)
    {
        try{
            $status_changed=$this->adminService->changeAdminStatus($id);
            if($status_changed=='INACTIVATED'){
                return redirect()->route('dashboard.admins.index')
                    ->with('success','Admin Or Vendor Has Become Inactive');
            }elseif($status_changed=='ACTIVEATED'){
                return redirect()->route('dashboard.admins.index')
                    ->with('success','Admin Or Vendor Has Become Active');
            }
        }catch(\Exception $e){
            return redirect()->route('dashboard.admins.index')
                ->with('fail','Something Erorr,Please Try Again');
            throw $e;
        }
    }
}
