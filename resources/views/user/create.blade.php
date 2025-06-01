@extends('web_admin.app')

@section('title', 'Tambah User')

@section('contents')
    <hr />

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <textarea name="Nama" id="Nama" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="Jenis_Kelamin">Jenis Kelamin</label>
            <select id="Jenis_Kelamin" name="Jenis_Kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Usia</label>
            <input type="number" name="Usia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Berat Badan (kg)</label>
            <input type="number" step="0.01" name="Berat_Badan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tinggi Badan (cm)</label>
            <input type="number" step="0.01" name="Tinggi_Badan" class="form-control" required>
        </div>
        <!-- <script>
            const Berat_Badan = document.getElementById('Berat_Badan');
            const TinggiBadan = document.getElementById('Tinggi_Badan');
            const IMT = document.getElementById('IMT');

            function hitungIMT() {
                const Berat_Badan = parseFloat(Berat_Badan.value);
                const Tinggi_Badan = parseFloat(Tinggi_Badan.value);

                if (Berat_Badan > 0 && Tinggi_Badan > 0) {
                    const IMT = Berat_Badan / (Tinggi_Badan * Tinggi_Badan);
                    IMT.value = IMT.toFixed(2); // membulatkan 2 desimal
                } else {
                    IMT.value = '';
                }
            }

            Berat_Badan.addEventListener('input', hitungIMT);
            Tinggi_Badan.addEventListener('input', hitungIMT);
        </script> -->
        <div class="mb-3">
            <label>Email</label>
            <textarea name="email" id="email" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('users.store') }}" class="btn btn-primary">Go Back</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

@endsection