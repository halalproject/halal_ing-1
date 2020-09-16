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
        var kategori = $('#kategori').val();
        var is_public = $('#pengumuman_untuk').val();
        var docContents = CKEDITOR.instances['announcement'].getData();
	    document.create.catatan_text.value=docContents;
        var file = $('#doc').val();
        var compName = $('#compName').val();
        var curr_doc = $('#curr_doc').val();
        
        if(event == '' || start_date == '' || end_date == '' || kategori == '' || docContents == '' || is_public == '' ){
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
                url:'/admin/pengumuman/store',
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

    function ShowHideCompList() {
        var specificComp = document.getElementById("specificComp");
        var listComp = document.getElementById("listComp");
        listComp.style.display = specificComp.checked ? "block" : "none";
    }
    
</script>
@php
$id = $calendar->id ?? '';
$syarikat = $calendar->company_id ?? '';
$kategori = $calendar->kategori ?? '';
$pub = $calendar->is_public ?? '';
@endphp
<div class="col-md-12">
    <form name="create" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Pengumuman</b></font></h6>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{ $id }}">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tajuk :</label>
                            <div class="col-sm-9">
                                <input type="text" name="event" id="event" class="form-control" value="{{ $calendar->event ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Tarikh Mula : </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="start_date" id="start_date"  value="{{ $calendar->start_date ?? '' }}" style="padding-left:0px;">
                            </div>

                            <label class="col-sm-3 control-label" style="padding-left:50px;"><font color="#FF0000">*</font>Tarikh Tamat : </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="end_date" id="end_date"  value="{{ $calendar->end_date ?? '' }}" style="padding-left:0px;">
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Kategori :</label>
                            <div class="col-sm-3">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($cat as $cat)
                                    <option value="{{ $cat->id }}" @if($kategori == $cat->id) selected @endif>{{ $cat->kategori_event }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Pengumuman :</label>
                            <div class="col-sm-9">
                                <textarea name="announcement" cols="50" rows="10" id="announcement" style="width:100%">{{ $calendar->announcement ?? '' }}</textarea>
                            </div>
                        </div>

                        <textarea name="catatan_text"  style="display:none;"></textarea>
                    </div>                

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"> Dokumen :</label>
                            <div class="col-sm-4">
                                <input type="file" name="doc" id="doc" class="form-control" value="" style ="border:none; padding-left:0px;">
                            </div>

                            @if(!empty($id) && $calendar->file_name != '')
                            <div class="col-sm-4">
                                <!-- <input type="text" name="file_name" id="file_name" class="form-control" value="{{ $calendar->file_name ?? '' }}" style ="border:none; padding-left:0px;" disabled> -->

                                <!-- <a name="curr_file" id="curr_file" href="/admin/dokumen_pengumuman/{{ $calendar->file_name }}"><i class="fa fa-download"></i> {{ $calendar->file_name  }} </a> -->
                                <a href="/admin/dokumen_pengumuman/{{ $calendar->file_name }}">
                                    <i class="fa fa-download">
                                    <input  type="text" name="curr_doc" id="curr_doc" value="{{ $calendar->file_name }}" style ="border:none; padding-left:0px;">
                                    </i>
                                </a>
                                
                            </div>
                            @endif
                        </div>
                    </div> 

                    <div class="form-group" id="pengumumanKategori">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="pengumuman_kategori"><font color="#FF0000">*</font> Pengumuman Untuk: </label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="awam" value="1" onclick="ShowHideCompList()" @if($pub == '1') checked @endif> Awam
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="dalaman" value="2" onclick="ShowHideCompList()" @if($pub == '2') checked @endif> Dalaman
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="syarikat" value="3" onclick="ShowHideCompList()" @if($pub == '3') checked @endif> Syarikat
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="specificComp" value="4" onclick="ShowHideCompList()" @if($pub == '4') checked @endif> Syarikat Tertentu
                                </label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group" id="listComp" name="listComp">
                        @if($pub == '4')
                            <div class="row">
                                <label class="col-sm-3 control-label" for="compName"><font color="#FF0000">*</font> Nama Syarikat : </label>
                                <div class="col-md-9">
                                    <select name="compName" id="compName" class="form-control">
                                        <option value="">Pilih Nama Syarikat</option>
                                        @foreach ($comp as $comp)
                                        <option value="{{ $comp->userid }}" @if($syarikat == $comp->userid) selected @endif>{{ $comp->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <label class="col-sm-3 control-label" for="compName"><font color="#FF0000">*</font> Nama Syarikat : </label>
                                <div class="col-md-9">
                                    <select name="compName" id="compName" class="form-control">
                                        <option value="">Pilih Nama Syarikat</option>
                                        @foreach ($comp as $comp)
                                        <option value="{{ $comp->userid }}" @if($syarikat == $comp->userid) selected @endif>{{ $comp->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
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

    var specificComp = document.getElementById("specificComp");
    var listComp = document.getElementById("listComp");
    listComp.style.display = specificComp.checked ? "block" : "none";
</script>