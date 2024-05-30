@extends('layouts.app')

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

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="float-start">
                            <h4 class="card-title mb-0">{{ __('Data Jurusan') }}</h4>
                        </div>
                        <div class="float-end">
                            <a href="{{ route('jurusan.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($jurusan as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_jurusan }}</td>
                                            <td>
                                                <form action="{{ route('jurusan.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('jurusan.edit', $data->id) }}"
                                                        class="btn btn-sm btn-success">Edit</a>
                                                    |
                                                    <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                        class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                Data belum tersedia.
                                            </td>
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
