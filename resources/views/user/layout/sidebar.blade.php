<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('user.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('jadwal.index') }}">
          <i class="bi bi-person"></i>
          <span>jadwal Pelajaran</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle"></i>
          <span>Raport</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('datadiri.index') }}">
          <i class="bi bi-envelope"></i>
          <span>Data Diri</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <br>

    </ul>

  </aside