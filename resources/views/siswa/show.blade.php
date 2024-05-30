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
                    <div class="card-header">
                        <div class="float-start">
                            <h4 class="card-title mb-0">{{ __('Data Siswa') }}</h4>
                        </div>
                        <div class="float-end">
                            <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="card-body">
                        <div class="card-content text-center">
                            <img src="{{ asset('storage/siswas/' . $siswa->image) }}" class="img-thumbnail rounded"
                                style="max-width: 300px;">
                            <p>
                            <h4>{{ $siswa->nama_siswa }}</h4>
                            </p>
                            <p class="mt-3">
                                <strong>Jenis Kelamin : </strong>
                                @if ($siswa->jk === 0)
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif
                            </p>

                            <p class="mt-3">
                                <strong>Agama :</strong> {{ $siswa->agama }}
                            </p>

                            <p class="mt-3">
                                <strong>Tempat Lahir :</strong> {{ $siswa->tmpt }}
                            </p>

                            <p class="mt-3">
                                <strong>Tanggal Lahir :</strong> {{ $siswa->tgl }}
                            </p>
                            <p class="mt-3">
                                <strong>Kelas :</strong> {{ $siswa->kelas->nama_kelas }}
                            </p>
                            <p class="mt-3">
                                <strong>Jurusan :</strong> {{ $siswa->jurusan->nama_jurusan }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
