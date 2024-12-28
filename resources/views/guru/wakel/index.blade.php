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

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
    <div class="row">
      <div class="col-lg-12">
  
        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Daftar Siswa</h5>
      
              <!-- Tabel Daftar Guru -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $guru)
                            @foreach ($guru->wakels as $wakel)
                                @foreach ($wakel->kelas->siswas as $siswa)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>
                                            <div class="btn-group" role="group"> 
                                                <!-- Add Button -->
                                                <a href="{{ route('wakel.create', ['id' => $siswa->id]) }}" class="btn btn-success btn-sm" title="Edit {{ $siswa->nama }}">Add Evaluasi</a>

                                                <!-- Edit Button -->
                                                <a href="#" class="btn btn-warning btn-sm" title="Edit {{ $siswa->nama }}">Edit</a>

                                                <!-- Delete Button -->
                                                <form action="#" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
          <nav class="d-flex justify-content-center mt-3">
              {{-- {{ $mapels->links('pagination::bootstrap-4') }} --}}
            </nav>
          </div>
      </div>
  
      </div>
    </div>
  </section>
</main>
@endsection
