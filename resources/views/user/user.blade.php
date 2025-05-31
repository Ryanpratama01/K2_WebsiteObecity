@extends('web_admin.app')

@section('title', 'Data User')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>
    <hr />
    
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>IMT</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count() > 0)
                @foreach($users as $user)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $user->Nama }}</td>
                        <td class="align-middle">{{ $user->Jenis_Kelamin }}</td>
                        <td class="align-middle">{{ $user->Usia }}</td>
                        <td class="align-middle">{{ $user->Berat_Badan }}</td>
                        <td class="align-middle">{{ $user->Tinggi_Badan }}</td>
                        <td class="align-middle">{{ $user->IMT }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $user->Role }}</td>
                        <td class="align-middle">{{ $user->created_at }}</td>
                        <td class="align-middle">{{ $user->updated_at }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group">
                                <a href="{{ route('users.show', $user->id_User) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('users.edit', $user->id_User) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $user->id_User) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="11">Tidak ada data user</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
