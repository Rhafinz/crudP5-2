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
                            <h4 class="card-title mb-0">{{ __('Dashboard') }}</h4>
                        </div>
                        <div class="float-end">
                            <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                    placeholder="Nama siswa" required>
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div>
                                    <input type="radio" id="laki" name="jk"
                                        class="@error('jk') is-invalid @enderror" value="0"
                                        {{ old('jk', $siswa->jk) == 0 ? 'checked' : '' }}>
                                    <label for="laki">Laki-laki</label>
                                </div>
                                <div>
                                    <input type="radio" id="perempuan" name="jk"
                                        class="@error('jk') is-invalid @enderror" value="1"
                                        {{ old('jk', $siswa->jk) == 1 ? 'checked' : '' }}>
                                    <label for="perempuan">Perempuan</label>
                                </div>
                                @error('jk')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                    name="agama" value="{{ old('agama', $siswa->agama) }}" placeholder="Agama" required>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl"
                                    value="{{ old('tgl', $siswa->tgl) }}" placeholder="Tanggal Lahir" required>
                                @error('tgl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tmpt') is-invalid @enderror"
                                    name="tmpt" value="{{ old('tmpt', $siswa->tmpt) }}" placeholder="Tempat Lahir"
                                    required>
                                @error('tmpt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kelas</label>
                                <select name="id_kelas" id="" class="form-control">
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $siswa->id_kelas ? 'selected' : '' }}>
                                            {{ $item->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Jurusan</label>
                                <select name="id_jurusan" id="" class="form-control">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $siswa->id_jurusan ? 'selected' : '' }}>
                                            {{ $item->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
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
