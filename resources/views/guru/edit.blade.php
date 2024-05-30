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
                        <a href="{{ route('guru.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nip" class="form-label">{{ __('NIP') }}</label>
                            <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip"
                                value="{{ old('nip', $guru->nip) }}" placeholder="{{ __('NIP') }}" required>
                            @error('nip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama_guru" class="form-label">{{ __('Nama Guru') }}</label>
                            <input type="text" class="form-control @error('nama_guru') is-invalid @enderror"
                                name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}"
                                placeholder="{{ __('Nama Guru') }}" required>
                            @error('nama_guru')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Jenis Kelamin') }}</label><br>
                            <div>
                                <input type="radio" id="laki" name="jk" class="form-check-input @error('jk') is-invalid @enderror" value="0"
                                    {{ old('jk', $guru->jk) == 0 ? 'checked' : '' }}>
                                <label for="laki">{{ __('Laki-laki') }}</label>
                            </div>
                            <div>
                                <input type="radio" id="perempuan" name="jk" class="form-check-input @error('jk') is-invalid @enderror" value="1"
                                    {{ old('jk', $guru->jk) == 1 ? 'checked' : '' }}>
                                <label for="perempuan">{{ __('Perempuan') }}</label>
                            </div>
                            @error('jk')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">{{ __('Agama') }}</label>
                            <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                name="agama" value="{{ old('agama', $guru->agama) }}" placeholder="{{ __('Agama') }}" required>
                            @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl" class="form-label">{{ __('Tanggal Lahir') }}</label>
                            <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl"
                                value="{{ old('tgl', $guru->tgl) }}" placeholder="{{ __('Tanggal Lahir') }}" required>
                            @error('tgl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tmpt" class="form-label">{{ __('Tempat Lahir') }}</label>
                            <input type="text" class="form-control @error('tmpt') is-invalid @enderror"
                                name="tmpt" value="{{ old('tmpt', $guru->tmpt) }}" placeholder="{{ __('Tempat Lahir') }}"
                                required>
                            @error('tmpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('Image') }}</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('Simpan') }}</button>
                            <button type="reset" class="btn btn-sm btn-warning">{{ __('Reset') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
