@extends('components.page')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/vendor/fullcalendar/main.css') }}">
<script src="{{ asset('assets/vendor/fullcalendar/lib/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/lib/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/fullcalendar/main.js') }}"></script>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><b>Paparan Utama MyHalal Ingredient</b> </h2>
                <div class="clearfix"></div>
            </div>
            <!-- MULA BARIS PERTAMA -->
            <div class="clearfix"></div>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-primary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa fa-list-alt"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Permohonan Baru</h4>
                                            <div class="info">
                                                <strong class="amount">54</strong>
                                            </div>
                                        </div>
                                        
                                        <div class="summary-footer">
                                            <a href="" class="text-muted text-uppercase">Papar Maklumat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-8 col-xl-8">
                        <div class="row">
                            <section class="panel" style="cursor: pointer" onclick="do_berita()">
                                <div class="panel-body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>
                                      
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                          <div class="item active">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Pengumuman</h4>
                                                        <div class="info">
                                                            <i class="">Kak Ayu Hebat</i>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer" style="text-align: left">
                                                        <i class="fa fa-clock-o"></i> 2019-10-12 &nbsp; <i class="fa fa-play-circle-o"></i> Lihat 1
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="item">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Pengumuman</h4>
                                                        <div class="info">
                                                            <i class="">Sila pakai mask ye kalau nk keluar</i>
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer" style="text-align: left">
                                                        <i class="fa fa-clock-o"></i> 2019-10-12 &nbsp; <i class="fa fa-play-circle-o"></i> Lihat 1
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="row">
                            <section class="panel">
                                <div class="panel-body">
                                    {!! $calendar->calendar() !!}
                                </div>
                            </section>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- AKHIR BARIS PERTAMA -->
        </div>
    </div>
</div>


{!!  $calendar->script() !!}
<script>
$('.carousel').carousel({
  interval: 4000
})

</script>
@endsection