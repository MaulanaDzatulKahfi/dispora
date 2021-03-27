<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        $tittle = 'user';
        if ($request->ajax()) {
            $user = User::latest()->get('*');
            // $user = DB::table('users')->select('*')->get();
            return Datatables::of($user)
                    ->addIndexColumn()
                    ->addColumn('action', function($user){
                        $btn = '
                            <a href="'.route("users.edit", $user->id).'" class="bg-blue-500 text-white rounded w-16 h-6 text-sm focus:outline-none">edit</a>
                            <form action="'.route("users.destroy", $user->id).'" method="POST">
                                '.csrf_field().'
                                '. method_field('DELETE').'
                                <button type="submit" class="bg-red-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none" onclick="return confirm(`Yakin? Data Ini Akan Dihapus?`)">
                                    Hapus
                                </button>
                            </form>
                            ';
                        return $btn;
                    })
                    ->addColumn('role', function($user){
                        foreach ($user->getRoleNames() as $v ) {
                            return $v;
                        }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('users.index',compact('tittle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tittle = 'role';
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles', 'tittle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $tittle = 'show user';
        return view('users.show',compact('user', 'tittle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tittle = 'role';
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole', 'tittle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
