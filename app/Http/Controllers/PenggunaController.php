<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\update_history;
use Illuminate\Http\Request;
use App\Models\modelUmum;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengguna.index')->with([
            'user' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create', [
            'user' => User::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect('pengguna')->with('success', 'Data Berhasil di Tambah');
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
    public function edit(User $user)
    {
        return view('pengguna.edit', [
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) //ubah
    {
        $messages = [
            'required' => ':attribute ini tidak boleh kosong!',
            'numeric' => ':attribute harus berupa angka!',
            'integer' => ':attribute harus berupa bilangan bulat!',
            'email' => ':attribute harus mengunakan simbol @',
            'unique' => ':attribute ini sudah ada yang menggunakan'
         ];
         
        $validasi = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], $messages);

        if($validasi) :            
            $update = User::find($id);
                $update->nama = $request->nama;
                $update->email = $request->email;
                $update->password = $request->password;
                $update->role = $request->role;
            $update->save();
              if($update) :
               else :
               endif;
        endif;  
        return redirect('pengguna')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(User $user)
    // {
    //     User::destroy($user->id);

    //     return redirect('/pengguna')->with('success', 'Data Berhasil di Hapus');
    // }

    public function destroy($id)
    {
        $pengguna = user::find($id);
        $pengguna->delete();

        return back()->with('success','Data Berhasil di hapus');
    }

    public function trash()
    {
        $pengguna = user::onlyTrashed()->get();
        return view('pengguna.trash', ['user' => $pengguna]);
    }

    public function restore($id = null)
    {
        if($id != null) {
            $pengguna = user::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else {
            $pengguna = Pengguna::onlyTrashed()->restore();
        }

        return redirect('pengguna/trash')->with('status', 'pengguna berhasil di-restore');
    }

    public function history() //tambah
    {
        $update_history = update_history::all();
        
        $update_history = $update_history->map(function ($history) {
            $contexts = json_decode($history->context);
            switch ($history->actionType) {
                case modelUmum::ACTION_UPDATE: 
                    // outlet   
                    if (property_exists($contexts->original, 'outlet_id')) {
                        $original_outlet = \App\Models\Outlet::find($contexts->original->outlet_id);
                        $contexts->original->Outlet = $original_outlet->nama;
                        unset($contexts->original->outlet_id);
                    }
                    if (property_exists($contexts->changed, 'outlet_id')) {
                        $changed_outlet = \App\Models\Outlet::find($contexts->changed->outlet_id);
                        $contexts->changed->Outlet = $changed_outlet->nama;
                        unset($contexts->changed->outlet_id);
                    }
                    if (property_exists($contexts->original, 'member_id')) {
                        $original_member = \App\Models\Member::find($contexts->original->member_id);
                        $contexts->original->Pelangan = $original_member->nama;
                        unset($contexts->original->member_id);
                    }
                    if (property_exists($contexts->changed, 'member_id')) {
                        $changed_member = \App\Models\Member::find($contexts->changed->member_id);
                        $contexts->changed->Pelangan = $changed_member->nama;
                        unset($contexts->changed->member_id);
                    }
                    $history->context = json_encode($contexts);
                break;
            }
            return $history;
        });

        return view ('pengguna.history', [
            'update_history' => $update_history
        ]);
    }
}
