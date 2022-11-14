<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\design_and_pm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        $managers = User::where('permision', "1")->get();
        $_SESSION["projectID"] = '';
        return view('boq.users.users', compact('users', 'managers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ],
        [
            'name.unique' => "error",
            'name.required' => "error",
            'name.string' => "error",
            'name.max' => "error",
            'email.required' => "error",
            'email.string' => "error",
            'email.max' => "error",
            'email.unique' => "error",
            'password.required' => "error",
            'password.string' => "error",
            'password.min' => "error",
        ]);
        // dd($request);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permision = $request->permision;
        $user->approver = $request->approver;
        $user->save();

        return back()->with('success', '!!! ADD User Complete !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        return response()->json([
            'dataEdit' => $data,
            'dataName' => DB::table('users')->where('id', $data->approver)->select('name as nameApprove')->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8'],
        // ],
        // [
        //     'name.unique' => "error",
        //     'name.required' => "error",
        //     'name.string' => "error",
        //     'name.max' => "error",
        //     'email.required' => "error",
        //     'email.string' => "error",
        //     'email.max' => "error",
        //     'email.unique' => "error",
        //     'password.required' => "error",
        //     'password.string' => "error",
        //     'password.min' => "error",
        // ]);

        // dd($request);
        $user = User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permision' => $request->permision,
            'approver' => $request->approver,
        ]);
        return back()->with('success', '!!! Edit User Complete !!!');
    }

    public function changeStatus($id)
    {
        // return "dd";
        $data = User::find($id);

        if ($data->status == "1") {
            User::where('id',$data->id)->update([
                'status' => "0",
            ]);
        }else {
            User::where('id',$data->id)->update([
                'status' => "1",
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
