@extends('dashboard.index')
@section('content')
    <form action="{{ route('skill.update') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">PROGRAMMING LANGUAGES & TOOLS</label>
          <input type="text" class="form-control form-control-sm skill" name="_language" id="judul" aria-describedby="helpId" placeholder="programming languages & tools" value="{{ get_meta_value('_language') }}">
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label"></label>
          <textarea class="form-control summernote" name="_workflow" id="workfow" rows="5">{{ get_meta_value('_workflow') }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
@push('child-scripts')
<script>
  $(document).ready(function() {
      $('.skill').tokenfield({
          autocomplete: {
              source: [{!! $skill !!}],
              delay: 100
          },
          showAutocompleteOnFocus: true
      });
  });
</script>
@endpush