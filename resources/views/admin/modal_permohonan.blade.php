<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
// Remove advanced tabs for all editors.
CKEDITOR.config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Language';
</script>
<script>
function do_close()
{
    location.reload();
}

function do_simpan()
{
	var docContents = CKEDITOR.instances['catatan'].getData(); 
	document.halal.catatan_text.value=docContents;

    if(!$("input:checkbox").is(":checked")){
        swal({
            title: 'Amaran',
            text: 'Sila lengkapkan maklumat sebelum simpan.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else {
        $.ajax({
            url:'/admin/semak/komen', //&datas='+datas,
            type:'POST',
            //dataType: 'json',
            beforeSend: function () {
                $('#simpan').attr("disabled","disabled");
                $('.dispmodal').css('opacity', '.5');
            },
            data: $('form').serialize(),
            //data: datas,
            success: function(data){
                console.log(data);
                //alert(data);
                if(data=='OK'){
                    swal({
                    title: 'Berjaya',
                    text: 'Maklumat telah berjaya dikemaskini',
                    type: 'success',
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                    }).then(function () {
                        reload = window.location; 
                        window.location = reload;
                    });
                } else if(data=='ERR'){
                    swal({
                    title: 'Amaran',
                    text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
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
</script>

<div class="col-md-12">
    @csrf
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Permohonan (@if(empty($rs->is_semak)) Semakan @else Kelululsan @endif)</b></font></h6>
        </header>
        <div class="panel-body">
            <!-- Start Tab -->
            <div class="tabbable">
                <!-- Tab Menu -->
                <ul id="tabs" class="nav nav-tabs printnone" role="tablist">
                    <li class="nav-item active">
                        <a id="tab-1" href="#t1" class="nav-link" data-toggle="tab" role="tab"><span class="text-black text-small text-bold">Maklumat Permohonan</span></a>
                    </li>
                    <li id="tab2" class="nav-item">
                        <a id="tab-2" href="#t2" class="nav-link" data-toggle="tab" role="tab"><span class="text-black text-small text-bold">Process Pengesahan</span></a>
                    </li>
                </ul>
                <!-- End Tab Menu -->
                <div id="content" class="tab-content padding-10 bg-light-grey" role="tablist">
                    <!-- First Tab -->
                    <div id="t1" class="card tab-pane row in active row" role="tabpanel" aria-labelledby="tab-1">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <input type="hidden" name="id" id="id" class="form-control" value="{{ $rs->id }}">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">No Permohonan :</label>
                                        <div class="col-sm-5">
                                            <b>{{ $rs->ing_kod }}</b>
                                        </div>

                                        <label class="col-sm-2 control-label">Tarikh Permohonan :</label>
                                        <div class="col-sm-2">
                                            <b>{{ date('d/m/Y',strtotime($rs->create_dt)) }}</b>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Nama Ramuan :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->nama_ramuan }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Nama Saintifik :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->nama_saintifik }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Sumber Bahan :</label>
                                        <div class="col-sm-5">
                                            {{ optional($rs->sumber)->nama }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Negara Asal Pengilang/Pengeluar :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->negara_pengilang }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Nama Pengilang/Pengeluar :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->nama_pengilang }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Alamat Pengilang/Pengeluar :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->alamat_pengilang_1 }}, {{ $rs->alamat_pengilang_2 }}, {{ $rs->alamat_pengilang_3 }}, {{ $rs->poskod_pengilang }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Negeri Asal Pembekal :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->negeri_pembekal_id }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Nama Pembekal :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->nama_pembekal }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Alamat Pembekal :</label>
                                        <div class="col-sm-5">
                                            {{ $rs->alamat_pembekal_1 }}, {{ $rs->alamat_pembekal_2 }}, {{ $rs->alamat_pembekal_3 }}, {{ $rs->poskod_pembekal }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Dokumentasi Ramuan : </label>
                                        <div class="row">
                                            <div class="col-sm-5">Sijil Halal: <a href="">Sijil Halal.pdf</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div align="right">
                                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End First Tab -->
                    
                    <!-- Second Tab -->
                    <div id="t2" class="card tab-pane row in" role="tabpanel" aria-labelledby="tab-2">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-3 pt-0"><font color="#FF0000">*</font> Status :</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="semak" id="semak" value="semak">
                                                <label class="form-check-label" for="semak">
                                                Semak
                                                </label>

                                                <input class="form-check-input" type="checkbox" name="lulus" id="lulus" value="lulus">
                                                <label class="form-check-label" for="lulus">
                                                Lulus
                                                </label>

                                                <input class="form-check-input" type="checkbox" name="tolak" id="tolak" value="tolak">
                                                <label class="form-check-label" for="tolak">
                                                Tolak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <br>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label" for="exampleFormControlTextarea1">Catatan :</label>
                                        <div class="col-sm-9">
                                        <textarea name="catatan" cols="50" rows="10" id="catatan" style="width:100%"></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <textarea name="catatan_text"  style="display:none;"></textarea>
                            </div>

                            <div class="form-group">
                                <div align="right">
                                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                                    <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                                        <i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Second Tab -->
            </div>
            <!-- End Tab -->  
        </div>
    </section>
</div>

<script>
	CKEDITOR.replace('catatan');

    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
</script>