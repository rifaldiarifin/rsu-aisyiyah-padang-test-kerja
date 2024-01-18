@extends('layouts.main')

@section('container')
<div class="col-lg-8">
  <h1 class="py-1 pb-3">Tambah Dokter Baru</h1>
    <form action="/dokter" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Dokter</label>
          <input type="text" class="form-control" name="name" id="name">
          {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
</div>
@endsection