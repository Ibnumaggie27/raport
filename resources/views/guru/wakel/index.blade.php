@extends('guru.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        @foreach ($gurus as $guru)
            @foreach ($guru->wakels as $wakel)
            <h1>Selamat Datang Wali Kelas {{ $wakel->kelas->nama_kelas }}</h1>
            @endforeach
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination-container mt-3">
        {{ $gurus->links() }} <!-- Pagination links -->
    </div>

</main>
@endsection
