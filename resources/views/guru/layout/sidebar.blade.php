<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
          </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('nilai.index') }}">
              <i class="bi bi-person"></i>
              <span>Nilai</span>
          </a>
      </li>

      {{-- Menampilkan menu Wali Kelas hanya jika guru sudah terdaftar di tabel wakels --}}
      @php
    $guru = auth()->user()->guru; // Mengambil data guru milik user yang sedang login
@endphp

@if($guru && $guru->wakels->isNotEmpty())
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('wakel.index') }}">
            <i class="bi bi-question-circle"></i>
            <span>Wali Kelas</span>
        </a>
    </li>
@endif
<br>


  </ul>
</aside>
