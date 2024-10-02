<header class="bg-light py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h1 class="h3"><a href="{{ route('page.home') }}" class="text-dark text-decoration-none"><img
                            src="{{ asset('images/logo.png') }}" width="180"  class="img-fluid">
                    </a></h1>
            </div>
            <div class="col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                </form>
            </div>
            <div class="col-md-3 text-end">
                <a href="#" class="btn btn-primary me-2">Đăng nhập</a>
                <a href="#" class="btn btn-outline-secondary">Giỏ hàng (0)</a>
            </div>
        </div>
    </div>
</header>
    