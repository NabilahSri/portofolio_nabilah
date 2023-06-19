@extends('dashboard.index')
@section('content')
<p class="card-title">Halaman</p>
<div class="pb-3"> <a href="dashboard/create" class="btn btn-primary">Tambah Halaman</a></div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th>Judul</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k=>$v)
                <tr>
                    <td>{{ $k+=1 }}</td>
                    <td>{{ $v->judul }}</td>
                    <td>
                        <a href="{{ route('dashboard.edit',$v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('dashboard.destroy',$v->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection