<script>

function do_close()
{
    location.reload();
}

</script>
<div class="col-md-8" style="top:300px;left: 50%;transform: translate(-50%, -50%);">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #b0c4de 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>MYHALAL: PELANGGAN</font></h6>
    </header>

    <div class="panel-body">
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Syarikat :</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" id="nama" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Kategori :</label>
                <div class="col-sm-9">
                    <input type="text" name="kategori" id="kategori" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nombor Syarikat :</label>
                <div class="col-sm-9">
                    <input type="text" name="syarikat" id="syarikat" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Orang yang Dihubungi:</label>
                <div class="col-sm-9">
                    <input type="text" name="orang" id="orang" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> H/P :</label>
                <div class="col-sm-9">
                    <input type="text" name="hp" id="hp" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> E-mel :</label>
                <div class="col-sm-9">
                    <input type="email" name="emel" id="emel" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Alamat :</label>
                <div class="col-sm-9">
                    <input type="text" name="alamat1" id="alamat1" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"> </label>
                <div class="col-sm-9">
                    <input type="text" name="alamat2" id="alamat2" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <input type="text" name="alamat3" id="alamat3" class="form-control" value="">
                </div>
            </div>
        </div>
       
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Poskod :</label>
                <div class="col-sm-3">
                    <input type="text" name="poskod" id="poskod" class="form-control" value="">
                </div>

                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Bandar :</label>
                <div class="col-sm-3">
                    <input type="text" name="bandar" id="bandar" class="form-control" value="">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Negeri :</label>
                <div class="col-sm-3">
                    <input type="text" name="negeri" id="negeri" class="form-control" value="">
                    </div>
            </div>
        </div>


        <div class="form-group">
            <div align="right">
                <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
            </div>
        </div>
    </div>
</section>
</form>
</div>
@if(empty($id))
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('#tab2').toggleClass('disabled');
  $('#tab-2').removeAttr('data-toggle');
})
</script>
@else
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('#tab2').toogleClass('disabled');
    $('#tab-2').attr('data-toggle','tab');
})
</script>
@endif