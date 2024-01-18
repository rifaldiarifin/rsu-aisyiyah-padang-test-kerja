@extends('layouts.main')

@section('container')
<div>
    <h1>Soal</h1>
    <div class="soal-group">
        <h2>Deret Angka 1-100</h2>
        <p>{{ $soal_1 }}</p>
    </div>
    <div class="soal-group">
        <h2>Deret Angka Kelipatan 5 angka 1-100</h2>
        <p>{{ $soal_2 }}</p>
    </div>
    <div class="soal-group">
        <h2>Deret Angka Bilangan Genap 1-100</h2>
        <p>{{ $soal_3 }}</p>
    </div>
</div>
@endsection