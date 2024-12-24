@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Siswa</a></li>
                <li class="breadcrumb-item active">edit siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

  
                        <form action="{{ route('student.update', $siswas->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $siswas->nama) }}" required>
                                @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" name="nis" class="form-control" id="nis" value="{{ old('nis', $siswas->nis) }}" required>
                                @error('nis') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $siswas->email) }}">
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select name="kelas_id" class="form-control" id="kelas" required>
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach($kelass as $kelas)
                                        <option value="{{ $kelas->id }}" 
                                            {{ old('kelas_id') == $kelas->id ? 'selected' : '' }}>
                                            {{ $kelas->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kelas_id') 
                                    <div class="text-danger">{{ $message }}</div> 
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>


</main>
@endsection
