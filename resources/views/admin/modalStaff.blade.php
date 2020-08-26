<script>
    $("#upload").click(function() {
        $("input[id='my_file']").click();
    });

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
<div class="col-md-8" style="top:300px;left: 50%;transform: translate(-50%, -50%);">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
        <!-- <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Maklumat Permohonan</b> [Draf]</font></h6> -->

        <h6 class="panel-title"><font color="#000000" size="3"><b>Tambah Staf</b></font></h6>
    </header>
    <div class="panel-body ">
        <div class="col-md-12">
            <!-- <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}"> -->

            <div>
            <!-- gambar -->
                <!-- <table>
                    <img style="margin-left:250px;" src="{{ asset('images/person.jpg') }}" width="200" height="200" />
                    <tr><td><input type="file" name="image" style="padding-left:260px;"></td></tr>
                </table> -->

                <body>
                    <input type="image" src="{{ asset('images/person.jpg') }}" width="200" height="200" style="margin-left:250px;"/>
                    <input type="file" id="my_file" style="padding-left:260px;display: none;" /><br>
                    <button type="button" class="btn btn-info" style="margin-left:263px;" id="upload"><i class="fa fa-upload" aria-hidden="true"></i> Muat Naik Gambar</button>
                </body>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Nama :</label>
                    <div class="col-sm-10">
                        <input type="text" name="ramuan" id="ramuan" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. KP :</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_kp" id="no_kp" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. Tel :</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_tel" id="no_tel" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Emel :</label>
                    <div class="col-sm-10">
                        <input type="text" name="emel" id="emel" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label" for="level_pengguna"><font color="#FF0000">*</font> Level Pengguna : </label>
                    <div class="col-md-4">
                        <select name="level_pengguna" onchange="" class="form-control">
                            <option value="">Pilih Level Pengguna</option>
                            <option value="">Admin</option>
                            <option value="">Penyemak</option>
                            <option value="">Pelulus</option>
                        </select>
                    </div>
                    
                    <label class="col-sm-2 control-label " for="status"><font color="#FF0000">*</font> Status : </label>
                    <div class="col-md-4">
                        <select name="status" onchange="" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="">Ada</option>
                            <option value="">Tiada</option>
                        </select>
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