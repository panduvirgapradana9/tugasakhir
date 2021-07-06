@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6 col-lg-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$produk}}</h3>

                    <p>Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$kategori}}</h3>

                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('kategori.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$user}}</h3>

                    <p>Member</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('customer.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$supplier}}</h3>

                    <p>Supplier</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                </div>
                <a href="{{ route('supplier.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$produkpromo}}</h3>

                    <p>Diskon</p>
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
                <a href="{{ route('promo.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{$cart}}</h3>

                    <p>Transaksi</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('transaksi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div>
            <canvas id="charttransaksi" style="height:350px;" height="200"></canvas>
        </div>
    </div>
    <div class="row">
        <div>
            <canvas id="chartkategori" style="height:350px;" height="200"></canvas>
        </div>
    </div>
    <div class="row">
        <div>
            <canvas id="chartsupplier" style="height:350px;" height="200"></canvas>
        </div>
    </div>
</div>
@php
$transaksi = DB::select("select b.total, a.name from  users a, cart b where a.id=b.user_id order by total DESC limit 10");
$kategori = DB::select("select count(a.id) as jumlah, b.nama_kategori from produk a, kategori b where a.kategori_id=b.id group by a.kategori_id");
$supplier = DB::select("select count(a.id) as jumlah, b.nama from produk a, suppliers b where a.supplier_id=b.id group by a.supplier_id");

@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var user = [<?php foreach ($transaksi as $key) { ?>
            '<?php echo $key->name ?>',
        <?php }?>];
    var total = [<?php foreach ($transaksi as $key) { ?>
            '<?php echo $key->total ?>',
        <?php }?>];
    var barChartTransaksi = {
        labels: user,
        datasets: [{
            label: 'Total Pembelian (Rupiah)',
            backgroundColor: "pink",
            data: total
        }]
    };

    var kategori = [<?php foreach ($kategori as $key) { ?>
            '<?php echo $key->nama_kategori ?>',
        <?php }?>];
    var jumlah = [<?php foreach ($kategori as $key) { ?>
            '<?php echo $key->jumlah ?>',
        <?php }?>];
    var barChartKategori = {
        labels: kategori,
        datasets: [{
            label: 'Jumlah Produk',
            backgroundColor: "lightblue",
            data: jumlah
        }]
    };

    var supplier = [<?php foreach ($supplier as $key) { ?>
            '<?php echo $key->nama ?>',
        <?php }?>];
    var jmlproduk = [<?php foreach ($supplier as $key) { ?>
            '<?php echo $key->jumlah ?>',
        <?php }?>];
    var barChartSupplier = {
        labels: supplier,
        datasets: [{
            label: 'Jumlah Produk',
            backgroundColor: "grey",
            data: jmlproduk
        }]
    };


    window.onload = function() {
        var chart1 = document.getElementById("charttransaksi").getContext("2d");
        window.myBarTransaksi = new Chart(chart1, {
            type: 'bar',
            data: barChartTransaksi,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                },scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero:true
                        }
                    }]
                }
            }
        });
        var chart2 = document.getElementById("chartkategori").getContext("2d");
        window.myBarKategori = new Chart(chart2, {
            type: 'bar',
            data: barChartKategori,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                },scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero:true
                        }
                    }]
                }
            }
        });
        var chart3 = document.getElementById("chartsupplier").getContext("2d");
        window.myBarSupplier = new Chart(chart3, {
            type: 'bar',
            data: barChartSupplier,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                },scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero:true
                        }
                    }]
                }
            }
        });
        
    };
</script>

@endsection
