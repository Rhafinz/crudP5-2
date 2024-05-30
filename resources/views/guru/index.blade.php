@extends('layouts.app')

@section('content')
    <style>

        .card-title {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table img {
            max-width: 100px;
            height: auto;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="float-start">
                            <h4 class="card-title mb-0">{{ __('Data Guru') }}</h4>
                        </div>
                        <div class="float-end">
                            <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($guru as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nip }}</td>
                                            <td>{{ $data->nama_guru }}</td>
                                            <td>
                                                @if ($data->jk === 0)
                                                    Laki-laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>{{ $data->agama }}</td>
                                            <td>{{ $data->tmpt }}</td>
                                            <td>{{ $data->tgl }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/gurus/' . $data->image) }}" class="rounded">
                                            </td>
                                            <td>
                                                <form action="{{ route('guru.destroy', $data->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('guru.show', $data->id) }}"
                                                        class="btn btn-sm btn-dark">Show</a>
                                                    <a href="{{ route('guru.edit', $data->id) }}"
                                                        class="btn btn-sm btn-success">Edit</a>
                                                    <button type="submit" onclick="return confirm('Are You Sure ?');"
                                                        class="btn btn-sm btn-danger" id="delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Data belum tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
