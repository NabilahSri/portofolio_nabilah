@extends('dashboard.index')
@section('content')
    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
          <div class="col-md-5">
            <h3>Profile</h3>
            <div class="mb-3">
              @if (get_meta_value('_foto'))
                  <img src="{{ asset('foto')."/".get_meta_value('_foto') }}" alt="" srcset="" style="max-width: 100px;max-height: 100px"><br>
              @endif
              <label for="_foto" class="form-label">Foto</label>
              <input type="file" name="_foto" id="_foto" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_kota" class="form-label">Kota/Kabupaten</label>
              <input type="text" name="_kota" id="_kota" value="{{ get_meta_value('_kota') }}" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_provinsi" class="form-label">Provinsi</label>
              <input type="text" name="_provinsi" id="_provinsi" value="{{ get_meta_value('_provinsi') }}" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_nohp" class="form-label">No. Telepon</label>
              <input type="text" name="_nohp" id="_nohp" value="{{ get_meta_value('_nohp') }}" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_email" class="form-label">Email</label>
              <input type="email" name="_email" id="_email" value="{{ get_meta_value('_email') }}" class="form-control form-control-sm">
            </div>
          </div>
          <div class="col-md-5">
            <h3>Akun Media Sosial</h3>
            <div class="mb-3">
              <label for="_facebook" class="form-label">Facebook</label>
              <input type="text" name="_facebook" id="_facebook" value="{{ get_meta_value('_facebook') }}" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_instagram" class="form-label">Instagram</label>
              <input type="text" name="_instagram" value="{{ get_meta_value('_instagram') }}" id="_instagram" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_tiktok" class="form-label">TikTok</label>
              <input type="text" name="_tiktok" id="_tiktok" value="{{ get_meta_value('_tiktok') }}" class="form-control form-control-sm">
            </div>
            <div class="mb-3">
              <label for="_github" class="form-label">Github</label>
              <input type="text" name="_github" value="{{ get_meta_value('_github') }}" id="_github" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
