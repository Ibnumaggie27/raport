@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Paket</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('paket.index') }}">Paket</a></li>
                <li class="breadcrumb-item active">Tambah Paket</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('paket.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-select" required>
                <option value="" selected>Pilih Kelas</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mapel</label><br>
            @foreach ($mapels as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="mapel_id[]" value="{{ $item->id }}" id="mapel{{ $item->id }}">
                    <label class="form-check-label form-label" for="mapel{{ $item->id }}">{{ $item->kode }}-{{ $item->nama }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</main>
@endsection
