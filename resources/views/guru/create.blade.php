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
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">{{ __('Dasboard') }}</h4>
                            </div>
                            <div>
                                <a href="{{ route('guru.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- nip --}}
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="number" id="nip" class="form-control @error('nip') is-invalid @enderror"
                                    name="nip" value="{{ old('nip') }}" placeholder="NIP" required>
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="nama_guru" class="form-label">Nama Guru</label>
                                <input type="text" id="nama_guru"
                                    class="form-control @error('nama_guru') is-invalid @enderror" name="nama_guru"
                                    value="{{ old('nama_guru') }}" placeholder="Nama guru" required>
                                @error('nama_guru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- jk --}}
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div>
                                    <input type="radio" id="laki" name="jk"
                                        class="form-check-input @error('jk') is-invalid @enderror" value="0"
                                        {{ old('jk') == '0' ? 'checked' : '' }}>
                                    <label for="laki" class="form-check-label">Laki-laki</label>
                                </div>
                                <div>
                                    <input type="radio" id="perempuan" name="jk"
                                        class="form-check-input @error('jk') is-invalid @enderror" value="1"
                                        {{ old('jk') == '1' ? 'checked' : '' }}>
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                                @error('jk')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            {{-- agama --}}
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" id="agama"
                                    class="form-control @error('agama') is-invalid @enderror" name="agama"
                                    value="{{ old('agama') }}" placeholder="Agama" required>
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- tgl --}}
                            <div class="mb-3">
                                <label for="tgl" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tgl" class="form-control @error('tgl') is-invalid @enderror"
                                    name="tgl" value="{{ old('tgl') }}" placeholder="Tanggal lahir" required>
                                @error('tgl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- tempat --}}
                            <div class="mb-3">
                                <label for="tmpt" class="form-label">Tempat Lahir</label>
                                <input type="text" id="tmpt"
                                    class="form-control @error('tmpt') is-invalid @enderror" name="tmpt"
                                    value="{{ old('tmpt') }}" placeholder="Tempat lahir" required>
                                @error('tmpt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" id="image"
                                    class="form-control @error('image') is-invalid @enderror" name="image" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary me-md-2">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
