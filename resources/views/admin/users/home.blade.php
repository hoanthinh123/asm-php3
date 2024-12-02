@extends('admin.layout')
@section('title')
    Admin
@endsection
@section('content')
    <!-- Dashboard Content -->
    <div class="container mt-4">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>This is where you can manage your website's content, users, and settings.</p>

        <!-- Cards Row -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Manage users and permissions.</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to Users</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Manage Product</p>
                        <a href="{{ route('admin.perfumes.index') }}" class="btn btn-primary">Go to Settings</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <p class="card-text"> Manage Category.</p>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Go to Category</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <section class="alert alert-secondary" style="justify-content: center">
            <div>
                <h4><a href="#" style="text-decoration: none; color: #000;">Thống kê</a> </h4>
            </div>
            <div class="lich d-flex">
                <div id="days"></div>
                <div id="dates"></div>
                <div class="gach">-</div>
                <div id="times"></div>
            </div>
            <script>
                window.onload = setInterval(clock, 1000);

                function clock() {
                    var d = new Date();
                    var date = d.getDate();
                    var month = d.getMonth();
                    var montharr = ["/1", "/2", "/3", "/4", "/5", "/6", "/7", "/8", "/9", "/10", "/11", "/12"];
                    month = montharr[month];
                    var year = d.getFullYear();
                    var day = d.getDay();
                    var dayarr = ["Chủ Nhật, ", "Thứ 2, ", "Thứ 3, ", "Thứ 4, ", "Thứ 5, ", "Thứ 6, ", "Thứ 7, "];
                    day = dayarr[day];
                    var hour = d.getHours();
                    var min = d.getMinutes();
                    var sec = d.getSeconds();
                    document.getElementById("days").innerHTML = day + " ";
                    document.getElementById("dates").innerHTML = date + "" + month + "/" + year;
                    document.getElementById("times").innerHTML = hour + " giờ " + min + " phút " + sec + " giây";
                }
            </script>
        </section>
        <section class="danhmuc">
            <br>
            <section class="themmoi" style="margin-left:15px ;">
                <h2 style="font-weight: bolder;"> Thống kê sản phẩm theo danh mục </h2>
            </section>

            <section class="danhsach">
                <br>
                <h4>Tổng Sản phẩm : {{$countSP}}</h4>

                <form action="" method="post" style="display: flex; margin: 0 30px;">
                    <div style="width: 900px; height: 200px;margin: 0 30px;">
                        <div id="myChart" style="width: 100%;"></div>
                    </div>
                    <table class="table table-hover border border-danger text-center">
                        <thead>
                            <tr>
                                <th>Tên danh mục</th>
                                <th>Số lượng sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($listsp as $list)
                                <tr>
                                    <td>
                                        {{ $list->tendm }}
                                    </td>
                                    <td>
                                        {{ $list->count_sp }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </form>

    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng sản phẩm'],
                <?php
                foreach ($listsp as $item) {
                    echo '["' . $item->tendm . '", ' . $item->count_sp . '],';
                }
                ?>
            ]);

            const options = {
                title: 'Biểu đồ',
            };

            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>
@endsection
