@extends('admin.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Wali Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('walikelas.create') }}" class="btn btn-custom">Tambah Wakel</a>
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
    {{-- <section class="section">
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
                               <th scope="col">Nama</th>
                               <th scope="col">NIS</th>
                               <th scope="col">email</th>
                               <th scope="col">kelas</th>
                               <th scope="col">Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($siswas as $dataSiswa)
                               <tr>
                                   <th scope="row">{{ $loop->iteration }}</th>
                                   <td>{{ $dataSiswa->nama }}</td>
                                   <td>{{ $dataSiswa->nis }}</td>
                                   <td>{{ $dataSiswa->email }}</td>
                                   <td>{{ $dataSiswa->kelas->nama_kelas }}</td>
                                   <td>
                                       <div class="btn-group" role="group">
                                           <!-- Edit Button -->
                                           <a href="{{ route('student.edit', $dataSiswa->id) }}" class="btn btn-warning btn-sm" title="Edit Data Guru">
                                               Edit
                                           </a>
                                           
                                           <!-- Delete Button -->
                                           <form action="{{ route('student.destroy', $dataSiswa->id) }}" method="POST" style="display:inline;">
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
                 {{ $siswas->links('pagination::bootstrap-4') }}
               </nav>
             </div>
         </div>
     
         </div>
       </div>
     </section> --}}
</main>
@endsection
