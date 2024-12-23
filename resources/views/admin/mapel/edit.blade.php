@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Mapel</a></li>
                <li class="breadcrumb-item active">edit Mapel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

  
                        <form action="{{ route('mapel.update', $mapels->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Mapel</label>
                                <input type="text" name="kode" class="form-control" id="kode" value="{{ old('kode', $mapels->kode) }}" required>
                                @error('kode') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $mapels->nama) }}" required>
                                @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>


</main>
@endsection
