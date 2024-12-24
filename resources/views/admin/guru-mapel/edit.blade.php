@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guru-mapel.index') }}">Mapel</a></li>
                <li class="breadcrumb-item active">edit Mapel</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

  
        <form action="{{ route('guru-mapel.update', $guruMapels->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="mapel_id" class="form-label">Kode Mapel</label>
                <select name="mapel_id" id="mapel_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Kode Mapel</option>
                    @foreach ($mapel as $item)
                        <option value="{{ $item->id }}" 
                            {{ old('mapel_id', $guruMapels->mapel_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                @error('mapel_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        
            <div class="mb-3">
                <label for="guru_id" class="form-label">Nama Guru</label>
                <select name="guru_id" id="guru_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Nama Guru</option>
                    @foreach ($guru as $item)
                        <option value="{{ $item->id }}" 
                            {{ old('guru_id', $guruMapels->guru_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                @error('guru_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>


</main>
@endsection
