<script>
function do_close()
{
    location.reload();
}
</script>

<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Ramuan</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <input type="hidden" name="id" id="id" class="form-control" value="{{$rs->id}}">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">No Permohonan :</label>
                        <div class="col-sm-5"><b>{{$rs->ing_kod}}</b></div>

                        <label class="col-sm-2 control-label">Tarikh Permohonan :</label>
                        <div class="col-sm-2"><b>{{ date('d/m/Y',strtotime($rs->create_dt)) }}</b></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Ramuan :</label>
                        <div class="col-sm-5">{{$rs->nama_ramuan}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Saintifik :</label>
                        <div class="col-sm-5">{{$rs->nama_saintifik}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName">Sumber Bahan :</label>
                        <div class="col-sm-4">{{ optional($rs->sumber)->nama }}</div>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName">Negara Asal Pengilang/Pengeluar: </label>
                        <div class="col-sm-4">{{ optional($rs->negara)->nama }}</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Pengilang/Pengeluar : </label>
                        <div class="col-sm-5">{{$rs->nama_pengilang}}</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Alamat Pengilang/Pengeluar : </label>
                        <div class="col-sm-5">{{$rs->alamat_pengilang_1}} {{$rs->alamat_pengilang_2}} {{$rs->alamat_pengilang_3}} {{$rs->poskod_pengilang}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName">Negeri Asal Pembekal: </label>
                        <div class="col-sm-4">{{ optional($rs->negeri)->nama }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Pembekal : </label>
                        <div class="col-sm-5">{{$rs->nama_pembekal}}</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Alamat Pembekal : </label>
                        <div class="col-sm-5">{{$rs->alamat_pembekal_1}} {{$rs->alamat_pembekal_2}} {{$rs->alamat_pembekal_3}} {{$rs->poskod_pembekal}}</div>
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
                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>