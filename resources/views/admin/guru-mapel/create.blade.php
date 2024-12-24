@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Mapel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guru-mapel.index') }}">Mapel</a></li>
                <li class="breadcrumb-item active">Tambah Guru Mapel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <form action="{{ route('guru-mapel.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama Mapel</label>
            <select name="mapel_id" id="mapel_id" class="form-control" required>
                <option value="" disabled selected>Pilih Mapel</option>
                @foreach ($mapels as $mapel)
                    <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="nama" class="form-label">Nama Guru</label>
            <select name="guru_id" id="guru_id" class="form-control" required>
                <option value="" disabled selected>Pilih Guru</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('guru-mapel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</main>
@endsection
