<script>

function do_close()
{
    location.reload();
}

</script>
<div class="col-md-12">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>MYHALAL: PELANGGAN</b></font></h6>
    </header>

    <div class="panel-body">
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Syarikat :</label>
                <div class="col-sm-9">
                    TESTING HALAL JAKIM
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Kategori :</label>
                <div class="col-sm-9">
                    Pembekal
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nombor Syarikat :</label>
                <div class="col-sm-9">
                    000000
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Orang yang Dihubungi:</label>
                <div class="col-sm-9">
                    Ali Bin Abu
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> H/P :</label>
                <div class="col-sm-9">
                    0137057666
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> E-mel :</label>
                <div class="col-sm-9">
                    ICTHALAL@ISLAM.GOV.MY
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Alamat :</label>
                <div class="col-sm-9">
                    Blok A, A-3-2A, Taman Ostia Bangi,
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"> </label>
                <div class="col-sm-9">
                 
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
               
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Bandar :</label>
                <div class="col-sm-9">
                    Bandar Baru Bangi
                </div>
            </div>
        </div>
       
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Poskod :</label>
                <div class="col-sm-9">
                    43650
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Negeri :</label>
                <div class="col-sm-9">
                    Selangor
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