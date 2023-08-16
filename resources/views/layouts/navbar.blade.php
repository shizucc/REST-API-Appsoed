<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; z-index:100; width:100%; top:0">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AppSoed API</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKost" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kost
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownKost">
            <li><a class="dropdown-item" href="{{route('admin.kost.index')}}">Semua Kost</a></li>
            <li><a class="dropdown-item" href="{{route('admin.kost.create')}}">Tambahkan Kost</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('kost.index')}}">Kost JSON</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFakultas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fakultas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownFakultas">
            <li><a class="dropdown-item" href="{{route('admin.faculty.index')}}">Semua Fakultas</a></li>
            <li><a class="dropdown-item" href="{{route('admin.faculty.create')}}">Tambahkan Fakultas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('faculty.index')}}">Fakultas JSON</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKomik" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Komik
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownKomik">
            <li><a class="dropdown-item" href="{{route('admin.comic.index')}}">Semua Komik</a></li>
            <li><a class="dropdown-item" href="{{route('admin.comic.create')}}">Tambahkan Komik</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('comic.index')}}">Komik JSON</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMerch" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            GensoedMerch
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMerch">
            <li><a class="dropdown-item" href="{{route('admin.gensoedmerch.index')}}">Semua GensoedMerch</a></li>
            <li><a class="dropdown-item" href="{{route('admin.gensoedmerch.create')}}">Tambahkan GensoedMerch</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('gensoedmerch.index')}}">GensoedMerch JSON</a></li>
          </ul>
        </li>

      </ul>
      <form class="d-flex" action="{{route('logout')}}" method="post">
          @csrf
          @method('post')
        
        <button class="btn btn-outline-warning" type="submit" >Log Out</button>
      </form>
    </div>
  </div>
</nav>