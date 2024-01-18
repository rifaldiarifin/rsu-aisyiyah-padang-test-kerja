@extends('layouts.main')

@section('container')
<div class="col-lg-8">
  <h1 class="py-1 pb-3 ">Edit Data Dokter</h1>
    <form action="/dokter/{{ $dokter["id"] }}" method="POST">
        @csrf
        @method("put")
        <input type="hidden" name="id" value="{{ $dokter["id"] }}">
        <div class="mb-3">
          <label for="name" class="form-label">Nama Dokter</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ old("name", $dokter["name"]) }}">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
</div>
@endsection