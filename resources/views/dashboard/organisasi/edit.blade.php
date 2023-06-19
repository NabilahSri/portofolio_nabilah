@extends('dashboard.index')
@section('content')
    <div class="pb-3"><a href="{{ route('organisasi.index') }}" class="btn btn-secondary"><< Kembali</a></div>
    <form action="{{ route('organisasi.update',$data->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="judul" class="form-label">Posisi Organisasi</label>
          <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Posisi Organisasi" value="{{ $data->judul }}">
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Nama sekolah" value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">Isi</label>
          <textarea class="form-control summernote" name="isi" id="isi" rows="5">{{ $data->info1 }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection