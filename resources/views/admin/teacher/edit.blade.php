@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">Guru</a></li>
                <li class="breadcrumb-item active">edit Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

  
                        <form action="{{ route('teacher.update', $gurus->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Guru</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $gurus->nama) }}" required>
                                @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nip" class="form-control" id="nip" value="{{ old('nip', $gurus->nip) }}" required>
                                @error('nip') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $gurus->email) }}">
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3" required>{{ old('alamat', $gurus->alamat) }}</textarea>
                                @error('alamat') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>


</main>
@endsection
