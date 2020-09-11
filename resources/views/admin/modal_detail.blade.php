<div class="col-md-12">
    <form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Ramuan</b></font></h6>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id" id="id" class="form-control" value="{{ $rs->id }}">

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">No Permohonan :</label>
                        <div class="col-sm-5">
                            <b>{{ $rs->ing_kod }}</b>
                        </div>

                        <label class="col-sm-2 control-label">Tarikh Permohonan :</label>
                        <div class="col-sm-2">
                            <b>{{ date('d/m/Y',strtotime($rs->create_dt)) }}</b>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Ramuan :</label>
                        <div class="col-sm-5">
                            {{ $rs->nama_ramuan }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Saintifik :</label>
                        <div class="col-sm-5">
                            {{ $rs->nama_saintifik }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Sumber Bahan :</label>
                        <div class="col-sm-5">
                            {{ optional($rs->sumber)->nama }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Status :</label>
                        <div class="col-sm-5">
                            @if($rs->status == 6)
                                <span class='label label-danger'>Tolak</span>
                            @else
                                <span class='label label-success'>Lulus</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Negara Asal Pengilang/Pengeluar :</label>
                        <div class="col-sm-5">
                            {{ $rs->negara_pengilang_id }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Pengilang/Pengeluar :</label>
                        <div class="col-sm-5">
                            {{ $rs->nama_pengilang }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Alamat Pengilang/Pengeluar :</label>
                        <div class="col-sm-5">
                            {{ $rs->alamat_pengilang_1 }}, {{ $rs->alamat_pengilang_2 }}, {{ $rs->alamat_pengilang_3 }}, {{ $rs->poskod_pengilang }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Negeri Asal Pembekal :</label>
                        <div class="col-sm-5">
                            {{ $rs->negeri_pembekal_id }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Pembekal :</label>
                        <div class="col-sm-5">
                            {{ $rs->nama_pembekal }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Alamat Pembekal :</label>
                        <div class="col-sm-5">
                            {{ $rs->alamat_pembekal_1 }}, {{ $rs->alamat_pembekal_2 }}, {{ $rs->alamat_pembekal_3 }}, {{ $rs->poskod_pembekal }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Dokumentasi Ramuan : </label>
                        <div class="row">
                            <div class="col-sm-5">Sijil Halal: <a href="">Sijil Halal.pdf</a></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
                    </div>
                </div>
            
            </div>

        </section>
    </form>
</div>