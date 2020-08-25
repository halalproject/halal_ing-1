
@php
$id = $rs->id ?? '';
$bahan_rs = $rs->sumber_bahan_id ?? '';
$negara_rs = $rs->negara_pengilang_id ?? '';
$negeri_rs = $rs->negeri_pembekal_id ?? '';
@endphp
<div class="col-md-12">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #b0c4de 43%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Maklumat Permohonan</b> [Draf]</font></h6>
    </header>
    <div class="panel-body">
    
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