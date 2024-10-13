  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('client.home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('client.listProduct')}}">Sản Phẩm</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Danh mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($list as $lists)
                        <li><a class="dropdown-item" href="{{ route('client.list', $lists->id) }}">{{ $lists->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("client.detail")}}">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Liên hệ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
