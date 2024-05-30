@extends('layouts.app')

<style>
    .card-title {
        font-weight: bold;
        font-size: 1.5rem;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="float-start">
                            <h4 class="card-title mb-0">{{ __('Dasboard') }}</h4>
                        </div>
                        <div class="float-end">
                            <a href="{{ route('jurusan.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Jurusan</label>
                                <input type="text" class="form-control @error('jurusan') is-invalid @enderror"
                                    name="jurusan" value="{{ $jurusan->nama_jurusan }}" placeholder="Jurusan" required>
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
