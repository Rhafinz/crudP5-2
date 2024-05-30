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
                            <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama kelas</label>
                                <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror"
                                    name="nama_kelas" value="{{ $kelas->nama_kelas }}" placeholder="Nama Kelas" required>
                                @error('nama_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Wali Kelas</label>
                                <select name="wali_kelas" id="" class="form-control">
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $kelas->id_guru ? 'selected' : '' }}>{{ $item->nama_guru }}
                                        </option>
                                    @endforeach
                                </select>
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
