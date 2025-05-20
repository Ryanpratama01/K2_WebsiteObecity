<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('Date', 'DESC')->get();
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
        // $request->validate([
        //     'Nama' => 'required|string',
        //     'Jenis_Kelamin' => 'required',
        //     'Usia' => 'required',
        //     'Tinggi_Badan' => 'required',    
        //     'Berat_Badan' => 'required',
        //     'IMT' => 'nullable',
        //     'Date' => 'required|date',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed',
        //     'Role' => 'required|string'
        // ]);

        User::create([
            'Nama' => $request->Nama,
            'Jenis_Kelamin' => $request->Jenis_Kelamin,
            'Usia' => $request->Usia,
            'Tinggi_Badan' => $request->Tinggi_Badan,
            'Berat_Badan' => $request->Berat_Badan,
            'IMT' => $request->IMT ?? null,
            'Date' => $request->Date,
            'email' => $request->Email,
            'password' => Hash::make($request->Password),
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
            'Tinggi_Badan' => 'required|numeric',
            'Berat_Badan' => 'required|numeric',
            'IMT' => 'nullable|numeric',
            'Date' => 'required|date',
            'email' => 'required|email|unique:users,Email,' . $user->id_User . ',id_User',
            'Password' => 'nullable|confirmed',
            'Role' => 'required|string'
        ]);

        $data = $request->except(['password']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->Password);
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