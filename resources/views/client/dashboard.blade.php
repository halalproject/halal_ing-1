@extends('components.page')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <marquee behavior="scroll" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
                @foreach ($pengumuman as $umum)
                        <i style="color: #fa0000;" href="/client/announce/{{ $umum->id }}"  data-toggle="modal" data-target="#myModalm" data-backdrop="static">
                            {{ strip_tags($umum->event) }}
                        </i>
                        <span style="color:#000;"><i class="fa fa-leaf" aria-hidden="true"></i></span>
                @endforeach
            </marquee>
            <div class="x_title">
                <h2><b>Paparan Utama MyHalal Ingredient</b> </h2>
                <div class="clearfix"></div>
            </div>
            <!-- MULA BARIS PERTAMA -->
            <div class="clearfix"></div>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                
                    <div class="col-md-12 col-lg-3 col-xl-3">
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
                                            <h4 class="title">Daftar Permohonan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $mohon->count() }}</strong>
                                                <!--<span class="text-primary">(14 unread)</span>-->
                                            </div>
                                        </div>
                                        
                                        <div class="summary-footer">
                                            <a href="/client/permohonan" class="text-muted text-uppercase">Papar Maklumat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="col-md-12 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-secondary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fa fa-ban"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Permohonan Ditolak</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $tolak->count() }}</strong>
                                                <!--<span class="text-primary">(14 unread)</span>-->
                                            </div>
                                        </div>
                                        
                                        <div class="summary-footer">
                                            <a href="/client/tolak" class="text-muted text-uppercase">Papar Maklumat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-tertiary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-tertiary">
                                            <i class="fa fa-list"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Senarai Ramuan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $ramuan->count() }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a href="/client/ramuan" class="text-muted text-uppercase">Paparan Maklumat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-quartenary">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-quartenary">
                                            <i class="fa fa-trash-o"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Ramuan Yang Dihapuskan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $hapus->count() }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a href="/client/hapus" class="text-muted text-uppercase">Papar Maklumat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- AKHIR BARIS PERTAMA -->
			
            <!-- MULA BARIS KEDUA -->
            <div class="clearfix"></div>
			<h2><b>Tamat Tempoh Sijil</b> </h2>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">

                    @php
                    
                    @endphp
                
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-success">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-success">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">3 Bulan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $rstm->count() }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a href="/client/ramuan?days=90" class="text-muted text-uppercase">(Papar Maklumat)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-warning">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-warning">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">1 Bulan</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $rsom->count() }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a href="/client/ramuan?days=30" class="text-muted text-uppercase">(Papar Maklumat)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <section class="panel panel-featured-left panel-featured-danger">
                            <div class="panel-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-danger">
                                            <i class="fa fa-exclamation"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">1 Minggu</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $rsod->count() }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a href="/client/ramuan?days=7" class="text-muted text-uppercase">(Papar Maklumat)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- AKHIR BARIS KEDUA -->
        </div>
    </div>
</div>                        
@endsection