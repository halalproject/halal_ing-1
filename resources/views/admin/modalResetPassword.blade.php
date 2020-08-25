<script>
 function do_close() {
     location.reload();
 }
</script>
@php
$id = $rs->id ?? '';
$bahan_rs = $rs->sumber_bahan_id ?? '';
$negara_rs = $rs->negara_pengilang_id ?? '';
$negeri_rs = $rs->negeri_pembekal_id ?? '';
@endphp
<div class="col-md-6" style="top:200px;left: 50%;transform: translate(-50%, -50%);">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #b0c4de 43%,#ffffff 100%);">
        <!-- <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Maklumat Permohonan</b> [Draf]</font></h6> -->

        <h6 class="panel-title"><font color="#000000" size="3"><b>Tetapkan Kata Laluan</b></font></h6>
    </header>
    <div class="panel-body ">
        <div class="col-md-12">
            <!-- <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}"> -->
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-5 control-label"><font color="#FF0000">*</font> Kata Laluan Baru :</label>
                    <div class="col-sm-7">
                        <input type="text" name="kata_laluan_baru" id="kata_laluan_baru" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-5 control-label"><font color="#FF0000">*</font> Sahkan Kata Laluan :</label>
                    <div class="col-sm-7">
                        <input type="text" name="sahkan_laluan_baru" id="sahkan_laluan_baru" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div align="right">
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_hantar()" id="hantar">
                        <i class="fa fa-arrow-right"></i> Hantar
                    </button>
                </div>
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