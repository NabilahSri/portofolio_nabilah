@extends('dashboard.index')
@section('content')
<p class="card-title">Organisasi</p>
<div class="pb-3"> <a href="{{ route('organisasi.create') }}" class="btn btn-primary">Tambah Organisasi</a></div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th>Posisi Organisasi</th>
                <th>Nama Sekolah</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k=>$v)
                <tr>
                    <td>{{ $k+=1 }}</td>
                    <td>{{ $v->judul }}</td>
                    <td>{{ $v->info1 }}</td>
                    <td>
                        <a href="{{ route('organisasi.edit',$v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form onsubmit="return confirm('Hapus data ini?')" action="{{ route('organisasi.destroy',$v->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection