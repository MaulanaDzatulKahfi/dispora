<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use DataTables;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('permission:user-archive', ['only' => ['archive']]);
        $this->middleware('permission:user-restore', ['only' => ['restore']]);
        $this->middleware('permission:user-restoreall', ['only' => ['restoreall']]);
        $this->middleware('permission:user-permanent', ['only' => ['permanent']]);
        $this->middleware('permission:user-permanentall', ['only' => ['permanentall']]);
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        $tittle = 'user';
        if ($request->ajax()) {
            // $user = User::orderBy('id','DESC')->paginate(100);
            $user = User::latest()->get();
            return Datatables::of($user)
                    ->addIndexColumn()
                    ->addColumn('action', function($user){
                        $btn = '
                            <div class="flex">
                                <a href="'.route("users.edit", $user->id).'" class="bg-blue-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none text-center">edit</a>
                                <form action="'.route("users.destroy", $user->id).'" method="POST" class="bg-red-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none text-center">
                                    '.csrf_field().'
                                    '. method_field('DELETE').'
                                    <button type="submit" onclick="return confirm(`Yakin? Data Ini Akan Dihapus?`)" class="focus:outline-none">
                                        Hapus
                                    </button>
                                </form>
                            </div>
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
    public function edit($id)
    {
        $tittle = 'role';
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole', 'tittle'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => 'required'
        ]);

        $user = User::find($id);
        $user->update([
            'roles' => $request->roles,
        ]);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User Berhasil DiUpdate!');
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
        return redirect()->route('users.index')->with('success','User Berhasil Dihapus!');
    }
    public function archive()
    {
        $tittle = 'Sampah';
        $users = User::onlyTrashed()->get();
        return view('users.sampah', compact('users', 'tittle'));
    }
    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        return redirect()->route('users.archive')->with('success', 'User Berhasil Dipulihkan!');
    }
    public function restoreall()
    {
        $user = User::onlyTrashed();
        $user->restore();

        return redirect()->route('users.archive')->with('success', 'Semua User Berhasil Dipulihkan!');
    }
    public function permanent($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->forceDelete();

        return redirect()->route('users.archive')->with('success', 'User Berhasil Dihapus!');
    }
    public function permanentall()
    {
        $user = User::onlyTrashed();
        $user->forceDelete();

        return redirect()->route('users.archive')->with('success', 'Semua User Berhasil Dihapus!');
    }
}
