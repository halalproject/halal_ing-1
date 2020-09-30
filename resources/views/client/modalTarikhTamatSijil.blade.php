<script>
function do_close() {
    location.reload();
}

function do_simpan() {
    var tarikh_tamat_sijil = $('#tarikh_tamat_sijil').val();
    var sijil_halal = $('#sijil_halal').val();
    var curr_doc = $('#curr_doc').val();

    if(tarikh_tamat_sijil == ''){
        swal({
            title: 'Amaran',
            text: 'Maklumat tidak lengkap.\nSila masukkan maklumat yang betul.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else { 
        var formdata = new FormData($('#create')[0]);
        // alert(formdata);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'/client/ramuan/updateSijil',
            type:'POST',
            beforeSend: function () {
                $('#simpan').attr("disabled","disabled");
                $('.dispmodal').css('opacity', '.5');
            },
            data: formdata,
            contentType: false,
            processData: false,
            //data: datas,
            success: function(data){
                // console.log(data);
                if(data =='OK'){ 
                    swal({
                    title: 'Berjaya',
                    text: 'Maklumat telah berjaya disimpan',
                    type: 'success',
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                    }).then(function () {
                        reload = window.location; 
                        window.location = reload;
                    });
                } else if(data =='ERR'){
                    swal({
                    title: 'Amaran',
                    text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya disimpan.',
                    type: 'error',
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                    });
                }
            }
        });
    }
}

function ValidateSize(file) {
    {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 2) {
            swal({
                title: 'Amaran',
                text: 'Fail Anda Melebihi 2MB ! Sila cetak dan hantar dokumen tersebut di Jabatan Agama Islam Selangor.',
                type: 'warning',
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Ok",
                showConfirmButton: true,
            }).then(function () {
                $('#simpan').prop('disabled',true);
            });
        } else {
            $('#simpan').prop('disabled',false);
        }
    }
    {
        var fileInput = ($('#sijil_halal').val()); 
        var filePath = fileInput; 
        // alert(filePath);
        // Allowing file type 
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i; 
            
        if (!allowedExtensions.exec(filePath)) { 
            swal({
                    title: 'Amaran',
                    text: 'Kami hanya menerima format .jpg, .jpeg, .png dan .pdf sahaja.',
                    type: 'warning',
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                }).then(function () {
                    $('#simpan').prop('disabled',true);
                }); 
                fileInput.value = ''; 
                return false; 
        } else {
            $('#simpan').prop('disabled',false);
            fileInput.value = ''; 
            return true;
        }  
    }
}
</script>
@php
$id = $rs->id ?? '';
if(!empty($id)){
    foreach ($upload as $doc) {
        $doc_id = $doc->id ?? '';
        $doc_name = $doc->file_name ?? '';
    }
}
@endphp
<div class="col-md-12" >
    <form name="create" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h2 class="panel-title"><font color="#000000" size="3"><b>Sebab Padam</b></font></h2>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="ramuan_id" id="ramuan_id" class="form-control" value="{{ $id }}">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{ $doc_id }}">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><b><font color="#FF0000">*</font> Tarikh Tamat Sijil :</b></label>
                            <div class="col-sm-3">
                                <input type="date" name="tarikh_tamat_sijil" id="tarikh_tamat_sijil" class="form-control" value="{{$rs->tarikh_tamat_sijil ??''}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"><b><font color="#FF0000">*</font>Dokumen :</b></label>
                            <div class="col-sm-4">
                                <input type="file" name="sijil_halal" id="sijil_halal" value="{{ $doc_name }}" onchange="ValidateSize(this)"> 
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><b><font color="#FF0000">*</font>Sijil Halal :</b></label>
                            <div class="col-sm-3">
                                <a href="/client/dokumen_ramuan/{{ $doc_name }}">
                                    <input  type="text" name="curr_doc" id="curr_doc" value="{{ $doc_name }}" style ="border:none; padding-left:0px;">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                            <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                <i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>