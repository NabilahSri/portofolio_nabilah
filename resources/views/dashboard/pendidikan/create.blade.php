@extends('dashboard.index')
@section('content')
    <div class="pb-3"><a href="{{ route('pendidikan.index') }}" class="btn btn-secondary"><< Kembali</a></div>
    <form action="{{ route('pendidikan.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId" placeholder="Nama Sekolah" value="{{ Session::get('judul') }}">
        </div>
        <div class="mb-3">
          <label for="info1" class="form-label">Jurusan</label>
          <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Jurusan" value="{{ Session::get('info1') }}">
        </div>
        <div class="mb-3">
          <label for="info2" class="form-label">Sub Jurusan</label>
          <input type="text" class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId" placeholder="Sub Jurusan" value="{{ Session::get('info2') }}">
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-auto">Tahun Mulai</div>
            <div class="col-auto">
              <input type="number" name="tahun_mulai" id="tahun_mulai" placeholder="yyyy" value="{{ Session::get('tahun_mulai') }}" class="form-control">
            </div>
            <div class="col-auto">Tahun Akhir</div>
            <div class="col-auto">
              <input type="number" name="tahun_akhir" id="tahun_akhir" placeholder="yyyy" value="{{ Session::get('tahun_akhir') }}" class="form-control">
            </div>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection