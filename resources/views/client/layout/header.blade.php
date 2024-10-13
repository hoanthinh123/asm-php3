
    <!-- Header -->
    <header class="bg-light py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h1 class="h3"><a href="{{route('client.home')}}" class="text-dark text-decoration-none"><img src="{{ asset('storage/avatars/logo.png')}}" width="180" alt=""></a></h1>
                </div>
                <div class="col-md-6">
                    <form class="d-flex" action="{{ route('client.listProduct') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                    </form>
                </div>
                
                @if (Auth::check())
                <div class="col-md-3 text-end">
                    <b>{{ Auth::user()->fullname }}</b>
                    <a href="{{ route('logout') }}" class="btn btn-primary me-2">Logout</a>
                   <a href="{{ route('client.index') }}"><i class="bi bi-person-circle"> you </i></a> 

                </div>
                @else
                <div class="col-md-3 text-end">
                    <a href="{{ route('login')}}" class="btn btn-primary me-2"> Đăng nhập</a>
                    <a href="{{route('register')}}" class="btn btn-outline-secondary">Đăng ký</a>
                </div>
                @endif
            </div>
        </div>
    </header>

  