<script>
function do_close()
{
    location.reload();
}
</script>

<style media="print" type="text/css">
	.printButton { display: none; }
</style>
@php
$id = $rs->id ?? '';
if((!empty($id)) && ($upload != '')){
    foreach ($upload as $doc) {
        if(!empty($doc->id)){
            $doc_name = $doc->file_name ?? '';
        }
    }
}
@endphp
<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h2 class="panel-title">
                <font color="#000000" size="3"><b>Maklumat Ramuan</b>
                @if($rs->status == 1 && !empty($rs->tarikh_buka)) [Sedang Diproses] @elseif($rs->status == 6) [Tolak] @elseif($rs->is_delete == 1) [Hapus] @else @endif
                </font>

                <button type="button" class="btn btn-md btn-success printButton" style="float: right; background-color:#252396;" onclick="window.print()" id="cetak">
                    <i class="fa fa-print"></i> Cetak
                </button>
            </h2>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <input type="hidden" name="id" id="id" class="form-control" value="{{$rs->id}}">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>No Permohonan :</b></label>
                        <div class="col-sm-5">{{$rs->ing_kod}}</div>

                        <label class="col-sm-2 control-label"><b>Tarikh Permohonan :</b></label>
                        <div class="col-sm-2">{{ date('d/m/Y',strtotime($rs->create_dt)) }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Nama Ramuan :</b></label>
                        <div class="col-sm-5">{{$rs->nama_ramuan}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Nama Saintifik :</b></label>
                        <div class="col-sm-5">{{$rs->nama_saintifik}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName"><b>Sumber Bahan :</b></label>
                        <div class="col-sm-4">{{ optional($rs->sumber)->nama }}</div>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName"><b>Negara Asal Pengilang/Pengeluar: </b></label>
                        <div class="col-sm-4">{{ optional($rs->negara)->nama }}</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Nama Pengilang/Pengeluar : </b></label>
                        <div class="col-sm-5">{{$rs->nama_pengilang}}</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Alamat Pengilang/Pengeluar : </b></label>
                        <div class="col-sm-5">{{$rs->alamat_pengilang_1}} {{$rs->alamat_pengilang_2}} {{$rs->alamat_pengilang_3}} {{$rs->poskod_pengilang}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName"><b>Negeri Asal Pembekal: </b></label>
                        <div class="col-sm-4">{{ optional($rs->negeri)->nama }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Nama Pembekal : </b></label>
                        <div class="col-sm-5">{{$rs->nama_pembekal}}</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Alamat Pembekal : </b></label>
                        <div class="col-sm-5">{{$rs->alamat_pembekal_1}} {{$rs->alamat_pembekal_2}} {{$rs->alamat_pembekal_3}} {{$rs->poskod_pembekal}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Dokumentasi Ramuan : </b></label>
                        <div class="row">
                            <div class="col-sm-5">Sijil Halal: <a href="">sijilhalal.pdf</a></div>
                        </div>
                    </div>
                </div>

                @if($rs->is_delete == '1')
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><b>Sebab Hapus : </b></label>
                        <div class="col-sm-5">{{ strip_tags($rs->delete_comment) }}</div>
                    </div>
                </div>
                @endif
                
                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default printButton" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>