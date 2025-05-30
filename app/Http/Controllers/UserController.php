<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('user.user', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('user.create');
    } 
    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'Nama' => 'required|string',
             'Jenis_Kelamin' => 'required',
             'Usia' => 'required',
             'Berat_Badan' => 'required',
             'Tinggi_Badan' => 'required',    
             'IMT' => 'nullable',
             'email' => 'required|email',
             'password' => 'required|confirmed',
             'Role' => 'required|string'
         ]);

        User::create([
            'Nama' => $request->Nama,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'Usia' => $request->Usia,
            'Berat_Badan' => $request->Berat_Badan,
            'Tinggi_Badan' => $request->Tinggi_Badan,
            'IMT' => $request->IMT,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Role' => $request->Role,
        ]);

        return redirect()->route('users')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified user.
     */
    public function show(string $id)
    {
        $user = User::where('id_User', $id)->firstOrFail();
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $user = User::where('id_User', $id)->firstOrFail();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id_User', $id)->firstOrFail();

        $request->validate([
            'Nama' => 'required|string',
            'Jenis_Kelamin' => 'required|in:Laki-laki,Perempuan',
            'Usia' => 'required|numeric',
            'Berat_Badan' => 'required|numeric',
            'Tinggi_Badan' => 'required|numeric',
            'IMT' => 'required|numeric',
            'email' => 'required|email|unique:users,email,' . $user->id_User . ',id_User',
            'password' => 'nullable|confirmed',
            'Role' => 'required|string'
        ]);

        $data = $request->except(['password']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users')->with('success', 'User berhasil diperbarui');

    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
{
    $user = User::where('id_User', $id)->firstOrFail();
    $user->delete();

    return redirect()->route('users')->with('success', 'User berhasil dihapus');
}

    public function profile()
    {
        return view('profile');
    } 
}