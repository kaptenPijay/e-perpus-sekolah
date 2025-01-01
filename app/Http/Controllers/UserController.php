<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->role == 'siswa') {
            return back();
        }
        $user = User::where('kepala', false)->paginate(10);
        if (auth()->user()->kepala == true) {
            $user = User::where('role', 'admin')->paginate(10);
        }
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $user->where('nama', 'like', '%' . $searchTerm . '%');
        }
        return view('user.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:30',
            'alamat' => 'required|string|max:220',
            'telepon' => 'required',
            'email' => 'required|email',
            'identitas' => 'required|string',
            'kelas' => 'nullable|string',
            'role' => 'required',
        ]);
        $validatedData['password'] = bcrypt('123');

        User::create($validatedData);

        return redirect()->to('user')->with('success', 'User berhasil Ditambah Dengan Password Default 123.');
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
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:30',
            'alamat' => 'required|string|max:220',
            'telepon' => 'required',
            'email' => 'required|email',
            'identitas' => 'required|string',
            'kelas' => 'nullable|string',
            'role' => 'required',
        ]);

        $user->update($validatedData);

        return redirect()->to('user')->with('success', 'User berhasil Dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data User berhasil dihapus.');
    }
}
