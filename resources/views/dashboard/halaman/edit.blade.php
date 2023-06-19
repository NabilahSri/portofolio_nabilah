@extends('dashboard.index')
@section('content')
    <div class="pb-3"><a href="{{ route('dashboard') }}" class="btn btn-secondary"><< Kembali</a></div>
    <form action="{{ route('dashboard.update',$data->id) }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">Isi</label>
          <textarea class="form-control summernote" name="isi" id="isi" rows="5">{{ $data->isi }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection