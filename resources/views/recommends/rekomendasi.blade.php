@extends('web_admin.app')

@section('title', 'Data Rekomendasi')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('recommends.create') }}" class="btn btn-primary">Add Recomen</a>
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
                <th>Kategori BMI</th>
                <th>Saran Makanan</th>
                <th>Saran Aktivitas</th>
                <th>Saran Lain</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($recommends->count() > 0)
                @foreach($recommends as $recommend)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $recommend->kategori_bmi }}</td>
                        <td class="align-middle">{{ $recommend->saran_makanan }}</td>
                        <td class="align-middle">{{ $recommend->saran_aktivitas }}</td>
                        <td class="align-middle">{{ $recommend->saran_lain }}</td>
                        <td class="align-middle">
                        <div class="btn-group" role="group">
                                <a href="{{ route('recommends.show', $recommend->id_rekomendasi) }}" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('recommends.edit', $recommend->id_rekomendasi) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('recommends.destroy', $recommend->id_rekomendasi) }}" method="POST" onsubmit="return confirm('Hapus rekomendasi ini?')">
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
                    <td class="text-center" colspan="11">Tidak ada data rekomendasi</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
