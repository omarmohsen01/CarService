<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\UserSericeInterface;
use App\Http\Requests\Dashboard\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserSericeInterface $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = $this->userService->userIndex($request);
        return view('dashboard.user.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $created=$this->userService->userStore($request);
        if($created){
            return redirect()->route('dashboard.users.index')->with('success','User Created Successfully');
        }else{
            return redirect()->route('dashboard.users.index')->with('fail','Something Went Wrong,Please Try Again');
        }
        try{
            $this->userService->userStore($request);
            return redirect()->route('dashboard.users.index')
                ->with('success','User Created Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.users.index')
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
        $user=User::findOrFail($id);
        return view('dashboard.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try{
            $this->userService->userUpdate($request, $id);
            return redirect()->route('dashboard.users.index')
                ->with('success','User Updated Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.users.index')
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
            $this->userService->userDestroy($id);
            return redirect()->route('dashboard.users.index')
            ->with('success','User Deleted Successfully');
        }catch(\Exception $e){
            return redirect()->route('dashboard.users.index')
                ->with('fail','Not Deleted,Please Try Again');
            throw $e;
        }
    }

    public function change_user_status(string $id)
    {
        try{
            $status_changed=$this->userService->changeUserStatus($id);
            if($status_changed=='INACTIVATED'){
                return redirect()->route('dashboard.users.index')
                    ->with('success','User Has Become Inactive');
            }elseif($status_changed=='ACTIVEATED'){
                return redirect()->route('dashboard.users.index')
                    ->with('success','User Has Become Active');
            }
        }catch(\Exception $e){
            return redirect()->route('dashboard.users.index')
                ->with('fail','Something Erorr,Please Try Again');
            throw $e;
        }
    }

}
