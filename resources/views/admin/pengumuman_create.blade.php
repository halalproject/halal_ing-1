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
        var announcement = $('#announcement').val();
        var is_public = $('#pengumuman_untuk').val();

        if(event.trim() == '' || start_date.trim() == '' || end_date.trim() == '' || kategori.trim() == '' || announcement.trim() == '' || is_public.trim() == '' ){
            swal({
                title: 'Amaran',
                text: 'Maklumat tidak lengkap.\nSila masukkan maklumat yang betul.',
                type: 'warning',
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Ok",
                showConfirmButton: true,
            });
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/dashboard/store', //&datas='+datas,
                type:'POST',
                data: $("#create").serialize(),
                //data: datas,
                success: function(data){
                    console.log(data);
                    //alert(data);
                    if(data[0]=='OK'){
                        swal({
                        title: 'Berjaya',
                        text: 'Maklumat telah berjaya disimpan',
                        type: 'success',
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        showConfirmButton: true,
                        }).then(function () {
                            $('#id').val(data[1]);
                            $('#tab2').removeClass('disabled');
                            $('#tab-2').attr('data-toggle','tab');
                        });
                    } else if(data[0]=='ERR'){
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

<div class="col-md-12">
    <form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h6 class="panel-title"><font color="#000000" size="3"><b>Tambah Pengumuman</b></font></h6>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id" class="form-control" value="">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tajuk :</label>
                            <div class="col-sm-9">
                                <input type="text" name="event" id="event" class="form-control" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Tarikh Mula : </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="start_date" id="start_date"  value="" style="padding-left:0px;">
                            </div>

                            <label class="col-sm-3 control-label" style="padding-left:50px;"><font color="#FF0000">*</font>Tarikh Tamat : </label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="end_date" id="end_date"  value="" style="padding-left:0px;">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Kategori :</label>
                            <div class="col-sm-3">
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <option value="1">Pengumuman</option>
                                    <option value="2">Aktiviti</option>
                                    <option value="3">Mesyuarat</option>
                                    <option value="4">SOP</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Pengumuman :</label>
                            <div class="col-sm-9">
                                <textarea name="announcement" cols="50" rows="10" id="announcement" style="width:100%"></textarea>
                            </div>
                        </div>
                    </div>                

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Dokumen :</label>
                            <div class="col-sm-4">
                                <input type="file" name="doc" id="doc" class="form-control" value="" style ="border:none; padding-left:0px;">
                            </div>
                        </div>
                    </div> 

                    <div class="form-group" id="pengumumanKategori">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Pengumuman Untuk: </label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="specificComp" value="4" onclick="ShowHideCompList()" checked> Syarikat Tertentu
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="awam" value="1" onclick="ShowHideCompList()" > Awam
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="dalaman" value="2" onclick="ShowHideCompList()"> Dalaman
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="pengumuman_untuk" id="syarikat" value="3" onclick="ShowHideCompList()"> Syarikat
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="listComp" name="listComp">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Syarikat :</label>
                            <div class="col-sm-3">
                                <select name="level" id="level" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    <option value="1">Pengumuman</option>
                                    <option value="2">Aktiviti</option>
                                    <option value="3">Mesyuarat</option>
                                    <option value="4">SOP</option>
                                </select>
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
CKEDITOR.replace('pengumuman', {height: 250});
</script>