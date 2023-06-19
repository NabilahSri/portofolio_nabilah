@extends('dashboard.index')
@section('content')
<p class="card-title">Pendidikan</p>
<div class="pb-3"> <a href="{{ route('pendidikan.create') }}" class="btn btn-primary">Tambah Pendidikan</a></div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">No</th>
                <th>Nama Sekolah</th>
                <th>Jurusan</th>
                <th>Sub Jurusan</th>
                <th>Tahun Mulai</th>
                <th>Tahun Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $k=>$v)
                <tr>
                    <td>{{ $k+=1 }}</td>
                    <td>{{ $v->judul }}</td>
                    <td>{{ $v->info1 }}</td>
                    <td>{{ $v->info2 }}</td>
                    <td>{{ $v->tahun_mulai }}</td>
                    <td>{{ $v->tahun_akhir }}</td>
                    <td>
                        <a href="{{ route('pendidikan.edit',$v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form onsubmit="return confirm('Hapus data ini?')" action="{{ route('pendidikan.destroy',$v->id) }}" class="d-inline" method="POST">
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