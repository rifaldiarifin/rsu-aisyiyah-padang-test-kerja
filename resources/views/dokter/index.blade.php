@extends('layouts.main')

@section('container')
<div class="col-lg-8">
    <h1 class="py-1 pb-3 ">Data Dokter</h1>
    <div class="my-3 d-flex justify-content-start">
        <a href="/dokter/create" class="btn btn-primary d-flex align-items-center  gap-2">
            <i data-feather="plus"></i>Tambah
        </a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <td class="opacity-50" scope="col">#</td>
            <td class="opacity-50" scope="col">Name</td>
            <td class="opacity-50" style="width: 50px" scope="col">Action</td>
          </tr>
        </thead>
        <tbody>
            @foreach ($dokter as $dr)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $dr["name"] }}</td>
                    <td class="d-flex gap-1">
                        <button type="button" class="btn btn-sm btn-show-data" data-href="/api/dokter/{{ $dr["id"] }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i style="pointer-events: none" data-feather="info"></i>
                          </button>
                        <a class="btn btn-sm" href="/dokter/{{ $dr["id"] }}/edit">
                            <i data-feather="edit-2"></i>
                        </a>
                        <form action="/dokter/{{ $dr["id"] }}" method="post">
                            @method("delete")
                            @csrf
                            <button class="btn btn-sm" type="submit" onclick="return confirm('Are you sure?')">
                                <i data-feather="trash-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Info Dokter</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center gap-2">
                    <p class="py-lg-3 name">...</p>
                </div>
                {{-- <div class="modal-footer d-flex justify-content-center "> --}}
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                {{-- </div> --}}
            </div>
            </div>
        </div>
      @section('scripts')
          <script>
            const inputs = document.querySelectorAll('.btn-show-data');
            const name = document.querySelector(".modal .name");

            const getData = async (event) => {
                name.innerHTML = "...";
                const response = await fetch(event.target.dataset.href);
                const json = await response.json();
                name.innerHTML = json.body.name;
            }

            inputs.forEach(input => {
                input.addEventListener("click", getData);
            });
          </script>
      @endsection
</div>
@endsection