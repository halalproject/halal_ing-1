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
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
        <!-- <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Maklumat Permohonan</b> [Draf]</font></h6> -->

        <h6 class="panel-title"><font color="#000000" size="3"><b>Tetapkan Kata Laluan</b></font></h6>
    </header>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
                <div align="center">
                    <p>Anda Pasti Ingin Tetapkan Kata Laluan Sebagai Lalai ?</p>
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                    <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan"> Ya</button>
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