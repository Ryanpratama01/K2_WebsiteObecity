@extends('web_admin.app')

@section('title', 'Profile')

@section('contents')
    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="Nama" disabled class="form-control" placeholder="Nama"
                                value="{{ auth()->user()->Nama}}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control"
                                value="{{ auth()->user()->email }}" placeholder="email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Tinggi Badan</label>
                            <input type="text" name="Tinggi_Badan" disabled class="form-control" placeholder="Tinggi Badan"
                                value="{{ auth()->user()->Tinggi_Badan}}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Berat Badan</label>
                            <input type="text" name="Berat_Badan" disabled class="form-control" placeholder="Berat Badan"
                                value="{{ auth()->user()->Berat_Badan}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('dashboard.index') }}" class="btn btn-primary profile-button">Go Back</a>
            </div>

        </div>

    </form>
@endsection