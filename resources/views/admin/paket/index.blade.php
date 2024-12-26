@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Paket</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('paket.create') }}" class="btn btn-custom">Tambah Paket</a>
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
              <h5 class="card-title">Daftar Mapel</h5>
      
              <!-- Tabel Daftar Guru -->
              <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Nama Mapel</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pakets as $dataPaket)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $dataPaket->kelas->nama_kelas }}</td> <!-- Menampilkan nama kelas yang terkait -->
                                <td>
                                    <ul>
                                        @foreach($dataPaket->mapels as $mapel)
                                            <li>{{ $mapel->nama }}</li> <!-- Menampilkan mapel yang terkait dengan paket -->
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <!-- Edit Button -->
                                        <a href="{{ route('paket.edit', $dataPaket->id) }}" class="btn btn-warning btn-sm" title="Edit Data Paket">
                                            Edit
                                        </a>
                                        
                                        <!-- Delete Button -->
                                        <form action="{{ route('paket.destroy', $dataPaket->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
          <nav class="d-flex justify-content-center mt-3">
              {{ $pakets->links('pagination::bootstrap-4') }}
            </nav>
          </div>
      </div>
  
      </div>
    </div>
  </section>
</main>
@endsection
