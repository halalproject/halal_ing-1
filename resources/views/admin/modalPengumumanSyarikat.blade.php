<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    // Remove advanced tabs for all editors.
    CKEDITOR.config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Language';
    function do_close()
    {
        location.reload();
    }

    function do_simpan() {

        var event = $('#event').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var docContents = CKEDITOR.instances['announcement'].getData();
	    document.create.catatan_text.value=docContents;
        var file = $('#doc').val();
        var curr_doc = $('#curr_doc').val();
        
        if(event == '' || start_date == '' || end_date == '' || docContents == '' ){
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
                url:'/admin/syarikat/pengumuman/simpan',
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
            var fileInput = ($('#doc').val()); 
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
    
@endphp

<div class="col-md-12">
    <form name="create" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($event->id)) Tambah @else Kemaskini @endif Pengumuman</b></font></h6>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="id_comp" id="id_comp" class="form-control" value="{{ $comp->userid ?? '' }}">
                    <input type="hidden" name="id_event" id="id_event" class="form-control" value="{{ $event->id ?? '' }}">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tajuk :</label>
                            <div class="col-sm-9">
                                <input type="text" name="event" id="event" class="form-control" value="{{ $event->event ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Tarikh Mula : </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="start_date" id="start_date"  value="{{ $event->start_date ?? '' }}" style="padding-left:0px;">
                            </div>

                            <label class="col-sm-3 control-label" style="padding-left:50px;"><font color="#FF0000">*</font>Tarikh Tamat : </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="end_date" id="end_date"  value="{{ $event->end_date ?? '' }}" style="padding-left:0px;">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Pengumuman :</label>
                            <div class="col-sm-9">
                                <textarea name="announcement" cols="50" rows="10" id="announcement" style="width:100%">{{ $event->announcement ?? '' }}</textarea>
                            </div>
                        </div>

                        <textarea name="catatan_text"  style="display:none;"></textarea>
                    </div>                

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"> Dokumen :</label>
                            <div class="col-sm-4">
                                <input type="file" name="doc" id="doc" class="form-control" value="" style ="border:none; padding-left:0px;" onchange="ValidateSize(this)">
                            </div>

                            
                            <div class="col-sm-4">
                                <a href="/admin/dokumen_pengumuman/{{ $event->file_name ?? '' }}">
                                    <input  type="text" name="curr_doc" id="curr_doc" value="{{ $event->file_name ?? '' }}" style ="border:none; padding-left:0px;">
                                </a>
                            </div>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                            <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                <i class="fa fa-arrow-right"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>

<script>
	CKEDITOR.replace('announcement');

    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
</script>