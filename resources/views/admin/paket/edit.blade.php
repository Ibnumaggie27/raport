@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Paket</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('paket.index') }}">Paket</a></li>
                <li class="breadcrumb-item active">Edit Paket</li>
            </ol>
        </nav>
    </div>

    <form action="{{ route('paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-select" required>
                <option value="" selected>Pilih Kelas</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}" {{ $paket->kelas_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="mapel_id" class="form-label">Mapel</label>
            <div class="form-check">
                @foreach ($mapels as $item)
                    <input class="form-check-input" type="checkbox" name="mapel_id[]" value="{{ $item->id }}"
                        id="mapel{{ $item->id }}" 
                        {{ in_array($item->id, $paket->mapels->pluck('id')->toArray()) ? 'checked' : '' }}>
                    <label class="form-check-label form-label" for="mapel{{ $item->id }}">
                        {{ $item->nama }}
                    </label><br>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</main>
@endsection
