@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Kelas</a></li>
                <li class="breadcrumb-item active">edit Kelas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

  
                        <form action="{{ route('kelas.update', $kelass->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{ old('nama_kelas', $kelass->nama_kelas) }}" required>
                                @error('nama_kelas') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>


</main>
@endsection
