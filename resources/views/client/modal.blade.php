<script>
// function do_cb(ids) {
//     if($('#doc_'+ids) >= '18'){
//         $('#dokum_1').hide();
//     } else {
//         $('#dokum_'+ids).show();
//     }
// }

// $(function() {
//     var temp="MYS"; 
//     $("#negara_kilang").val(temp);
// });

function fileValidation() { 
    var fileInput = (($('#upload_1').val()) || ($('#upload_2').val()) || ($('#upload_3').val()) || ($('#upload_4').val()) || ($('#upload_5').val()) || ($('#upload_6').val())); 
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
                $('#hantar').prop('disabled',true);
            }); 
            fileInput.value = ''; 
            return false; 
    } else {
        $('#hantar').prop('disabled',false);
        fileInput.value = ''; 
        return true;
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
                $('#hantar').prop('disabled',true);
            });
        } else {
            $('#hantar').prop('disabled',false);
        }
    }
    {
        var fileInput = (($('#upload_1').val()) || ($('#upload_2').val()) || ($('#upload_3').val()) || ($('#upload_4').val()) || ($('#upload_5').val()) || ($('#upload_6').val())); 
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
                    $('#hantar').prop('disabled',true);
                }); 
                fileInput.value = ''; 
                return false; 
        } else {
            $('#hantar').prop('disabled',false);
            fileInput.value = ''; 
            return true;
        }  
    }
}

function do_able(ids)
{
    // alert(ids)
    var doc = $('#doc_'+ids).prop('checked')
    // alert(doc)

    if(doc){
        if(ids == '1')
        {
            for(i=1;i<=6;i++)
            {
                // $('#doc_1').prop('disabled',true);
            }
        } else if(ids=='6'){
            $('.addrow_6').show();
            // $('#doc_1').prop('disabled',true);
        } else {
            // $('#doc_1').prop('disabled',true);
        }
        
        $('#box_'+ids).show();
    } else {
        if(ids == '1'){
            for(i=1;i<=6;i++)
            {
                // $('#doc_' +i).prop('disabled',false);
            }
            $('#tarikh_tamat_sijil').val('')
        } else if(!$('#doc_2').prop('checked') && !$('#doc_3').prop('checked') && !$('#doc_4').prop('checked') && !$('#doc_5').prop('checked') && !$('#doc_6').prop('checked')){
            // $('#doc_1').prop('disabled',false);
        } else {

        }
        
        if(ids == '6'){
            $('.addrow_6').hide();
            $('#nama_lain').val('');
        }

        $('#upload_'+ids).val('');

        $('#box_'+ids).hide();
    }

}

function do_simpan()
{
    var ramuan = $('#ramuan').val();
    var saintifik = $('#saintifik').val();
    var sumber = $('#sumber').val();
    var negara_kilang = $('#negara_kilang').val();
    var nama_pengilang = $('#nama_pengilang').val();
    var kilang_alamat_1 = $('#kilang_alamat_1').val();
    var kilang_poskod = $('#kilang_poskod').val();
    var negeri_bekal = $('#negeri_bekal').val();
    var nama_pembekal = $('#nama_pembekal').val();
    var bekal_alamat_1 = $('#bekal_alamat_1').val();
    var bekal_poskod = $('#bekal_poskod').val();

    if(ramuan.trim() == '' || saintifik.trim() == '' || sumber.trim() == '' || negara_kilang.trim() == '' || nama_pengilang.trim() == '' || kilang_alamat_1.trim() == '' || kilang_poskod.trim() == '' || negeri_bekal.trim() == '' || nama_pembekal.trim() == '' || bekal_alamat_1.trim() == '' || bekal_poskod.trim() == ''){
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
			url:'/client/permohonan/store', //&datas='+datas,
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
                        reloadTab2(data[1]);
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

function reloadTab2(id) {
    $('#myModal .modal-content').load("/client/permohonan/edit/"+id);
}

function do_hantar()
{
    // alert('hai');
    $("input:checked").each(function () {
        var id = $(this).val();
        var file = $('#upload_'+id).val();
        var date = $('#tarikh_tamat_sijil').val();
        var input = $('#nama_lain').val();
        var doc = $('#doc_otherNegara').val();
        var current_file = $('#current_file_' +id).val();

        // alert(current_file);
        
        if(id == 6 && input.trim() == ''){
            swal({
                title: 'Amaran',
                text: 'Sila isi maklumat lain.',
                type: 'warning',
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Ok",
                showConfirmButton: true,
            });
        // } else if(id == 1 && doc == '') { 
        //     swal({
        //         title: 'Amaran',
        //         text: 'Sila pilih CB.',
        //         type: 'warning',
        //         confirmButtonClass: "btn-warning",
        //         confirmButtonText: "Ok",
        //         showConfirmButton: true,
        //     });
        } else if(typeof current_file === 'undefined'){
            if(file == ''){
                swal({
                    title: 'Amaran',
                    text: 'Sila masukkan dokumen yang diperlukan.',
                    type: 'warning',
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                });
            }
            
        } else if((id == 1) && (date.trim() == '')){
            swal({
                title: 'Amaran',
                text: 'Sila masukkan tarikh tamat sijil halal.',
                type: 'warning',
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Ok",
                showConfirmButton: true,
            });
        } else {
            hantar_to();
        }
        
        
    });
}

function hantar_to()
{
    swal({
        title: 'Adakah anda pasti untuk menghantar permohonan ini?',
        //text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Teruskan',
        cancelButtonText: 'Tidak, Batal!',
        reverseButtons: true
    }).then(function () {
        var formdata = new FormData($('#create')[0]);
        // alert(formdata);
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        $.ajax({
			url:'/client/permohonan/upload', //&datas='+datas,
			type:'POST',
			data: formdata,
            contentType: false,
            processData: false,
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Maklumat telah berjaya disimpan dan dihantar',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
                        location.reload();
					});
				} else if(data=='ERR'){
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
    });

}

function negaraChange() {
  $('#tab2').toggleClass('disabled');
  $('#tab-2').removeAttr('data-toggle');
}

function do_close()
{
    location.reload();
}
</script>
@php
$id = $rs->id ?? '';
$status = $rs->status ?? '';
$bahan_rs = $rs->ing_category ?? '';
$negara_rs = $rs->negara_pengilang_id ?? '';
$negeri_rs = $rs->negeri_pembekal_id ?? '';
$nama_dokumen = '';
if(!empty($id)){
    foreach ($upload as $doc) {
        if(!empty($doc->ramuan_id)){
            $cb_select = $doc->cbid ?? '';
        } 

        if($doc->ref_dokumen_id == 6){
            $nama_dokumen = $doc->nama_dokumen ?? '';
        }

        $avail_doc = $doc->file_name ?? ''; 
    }

    foreach ($cb as $cb_list) {
        $cbByNegara = $cb_list->fldcountryid ?? '';
    }
}

@endphp
<div class="col-md-12">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
        <h2 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Maklumat Permohonan</b> @if($status == 0)[Draf] @else [Hantar]@endif</font></h2>
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
					<a id="tab-2" href="#t2" class="nav-link" data-toggle="tab" role="tab"><span class="text-black text-small text-bold">Maklumat Dokumentasi</span></a>
				</li>
			</ul>
            <!-- End Tab Menu -->
			<div id="content" class="tab-content padding-10 bg-light-grey" role="tablist">
                <!-- First Tab -->
				<div id="t1" class="card tab-pane row in active row" role="tabpanel" aria-labelledby="tab-1">
                    <div class="panel-body ">
                        <div class="col-md-12">
                        <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}">
                        <input type="hidden" name="chk" id="chk" class="form-control" value="">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">
                                        <b><font color="#FF0000">*</font> Nama Ramuan 
                                            <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true" 
                                            title="{{ $information[0]->info }}">
                                            </i>:
                                        </b>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ramuan" id="ramuan" class="form-control" value="{{$rs->nama_ramuan??''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label">
                                        <b><font color="#FF0000">*</font> Nama Saintifik 
                                            <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true" 
                                            title="{{ $information[1]->info }}">
                                            </i>:
                                        </b>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="saintifik" id="saintifik" class="form-control" value="{{$rs->nama_saintifik??''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                <label class="col-sm-3 control-label" for="profileLastName">
                                    <b><font color="#FF0000">*</font> Sumber Bahan 
                                        <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true" 
                                        title="{{ $information[2]->info }}">
                                        </i> :
                                    </b>
                                </label>
                                <div class="col-sm-4">
                                <select name="sumber" id="sumber" class="form-control">
                                    <option value="">Pilih Sumber Bahan</option>
                                    @foreach($bahan as $bah)
                                    <option value="{{ $bah->id }}" @if($bahan_rs == $bah->id) selected @endif>{{ $bah->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                                </div>
                            </div> 
                            @php 
                            @endphp
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="profileLastName"><b><font color="#FF0000">*</font> Negara Asal Pengilang/Pengeluar: </b></label>
                                    <div class="col-sm-4">
                                        <select name="negara_kilang" id="negara_kilang" class="form-control" onchange="negaraChange()">
                                            <option value="">Pilih Negara</option>
                                            @if(!empty($rs->negara_pengilang_id)){
                                                @foreach($negara as $negara)
                                                <option value="{{ $negara->kod }}" @if($negara_rs == $negara->kod) selected @endif>{{ $negara->nama }}</option> 
                                                }
                                            
                                                @endforeach
                                            @else
                                                @foreach($negara as $negara)
                                                <option value="{{ $negara->kod }}" @if($negara->kod == 'MYS') selected @endif>{{ $negara->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    @if(!empty($id))
                                        <div class="col-sm-4">
                                            <div align="left">
                                                <font color="#FF0000"><i>*Nota : Jika anda menukar negara, anda dikehendaki klik butang simpan untuk membolehkan anda muat naik dokumen di tab Maklumat Dokumentasi</i></font>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><b><font color="#FF0000">*</font> Nama Pengilang/Pengeluar : </b></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_pengilang" id="nama_pengilang" placeholder="Nama Pengilang/Pengeluar" class="form-control" value="{{$rs->nama_pengilang??''}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><b><font color="#FF0000">*</font> Alamat Pengilang/Pengeluar : </b></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="kilang_alamat_1" id="kilang_alamat_1" placeholder="Alamat 1" class="form-control" value="{{$rs->alamat_pengilang_1??''}}">
                                    </div>
                                    
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8 control-label">
                                        <input type="text" name="kilang_alamat_2" id="kilang_alamat_2" placeholder="Bandar" class="form-control" value="{{$rs->alamat_pengilang_2??''}}">
                                    </div>

                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8 control-label">
                                        <input type="text" name="kilang_bandar" id="kilang_bandar" placeholder="Negeri" class="form-control" value="{{$rs->alamat_pengilang_3??''}}">
                                    </div>
                                    
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-2 control-label">
                                        <input type="text" name="kilang_poskod" id="kilang_poskod" placeholder="Poskod" class="form-control" value="{{$rs->poskod_pengilang??''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="profileLastName"><b><font color="#FF0000">*</font> Negeri Asal Pembekal: </b></label>
                                    <div class="col-sm-4">
                                        <select name="negeri_bekal" id="negeri_bekal" class="form-control">
                                            <option value="">Pilih Negeri</option>
                                            @foreach($negeri as $negeri)
                                            <option value="{{ $negeri->kod }}" @if($negeri_rs == $negeri->kod) selected @endif>{{ $negeri->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><b><font color="#FF0000">*</font> Nama Pembekal : </b></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_pembekal" id="nama_pembekal" placeholder="Nama Pembekal" class="form-control" value="{{$rs->nama_pembekal??''}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><b><font color="#FF0000">*</font> Alamat Pembekal : </b></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="bekal_alamat_1" id="bekal_alamat_1" placeholder="Alamat 1" class="form-control" value="{{$rs->alamat_pembekal_1??''}}">
                                    </div>
                                    
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8 control-label">
                                        <input type="text" name="bekal_alamat_2" id="bekal_alamat_2" placeholder="Bandar" class="form-control" value="{{$rs->alamat_pembekal_2??''}}">
                                    </div>
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-8 control-label">
                                        <input type="text" name="bekal_bandar" id="bekal_bandar" placeholder="Negeri" class="form-control" value="{{$rs->alamat_pembekal_3??''}}">
                                    </div>
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-2 control-label">
                                        <input type="text" name="bekal_poskod" id="bekal_poskod" placeholder="Poskod" class="form-control" value="{{$rs->poskod_pembekal??''}}" maxlength="6"
                                        onkeydown="return (event.ctrlKey || event.altKey 
                                            || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                            || (95<event.keyCode && event.keyCode<106)
                                            || (event.keyCode==8) || (event.keyCode==9) 
                                            || (event.keyCode>34 && event.keyCode<40) 
                                            || (event.keyCode==46) )">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div align="right">
                                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                                    <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                                        <i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div align="right">
                                    <font color="#FF0000"><i>Sila klik butang simpan terlebih dahulu sebelum meletakkan dokumentasi permohonan</i></font>
                                </div>
                            </div>

                            <div class="form-group">
                                <div align="right">
                                    <font color="#FF0000"><i>Sila klik butang hantar di menu maklumat dokumentasi bagi proses pengesahan</i></font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Tab -->
                
                <!-- Second Tab -->
				<div id="t2" name="t2" class="card tab-pane row in" role="tabpanel" aria-labelledby="tab-2">
                    <div class="panel-body ">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-5 control-label" for="sijil"><h4><b><font color="#FF0000">*</font> Dokumen Yang Berkenaan: </b></h4></label>
                                </div>
                            </div>
                            <div class="form-group" @if((!empty($id)) && ($rs->negara_pengilang_id == 'MYS')) hidden @endif>
                                <div class="row" style="padding-left:15px;">
                                    <!-- <div class="col-sm-4 control-label">
                                        <div class="input-group"> -->
                                            <select name="doc_otherNegara" id="doc_otherNegara">
                                                <option value="">Sila Pilih CB</option>
                                                @foreach ($cb as $item)
                                                    @if((!empty($id)) && ($rs->negara_pengilang_id == $item->fldcountryid))
                                                        <option value="{{$item->fldid}}" @if(($cb_select ?? '') == $item->fldid) selected @endif>{{ $item->fldname }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true"
                                                title="{{ $information[3]->info }}" id="questmark" name="questmark"></i>
                                        <!-- </div>
                                    </div> -->
                                </div>
                            </div>
                            
                                


                                @foreach($dokumen as $dokumen)
                                    @php
                                    
                                    $checked = 0;
                                    if(!empty($id)){
                                        foreach ($upload as $up) {
                                            if($dokumen->id == $up->ref_dokumen_id){
                                                $checked = 1; 
                                            } 
                                        }
                                    }                             
                                    @endphp
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-4 control-label">
                                                <div class="input-group">
                                                    <input type="checkbox" name="doc_{{$dokumen->id}}" id="doc_{{$dokumen->id}}" value="{{$dokumen->id}}"
                                                        @if($checked == 1) checked @endif
                                                        onchange="do_able({{ $dokumen->id }})"/>&nbsp;{{ $dokumen->nama }} 
                                                    <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true"
                                                        title="{!! $dokumen->remarks !!}" style="width: 120px;"></i>
                                                </div>
                                                @if($dokumen->id == 6)
                                                <div class="addrow_{{$dokumen->id}}" @if($checked == 0) hidden @endif>
                                                    <input type="text" name="nama_lain" id="nama_lain" class="form-control"value="{{ $nama_dokumen ?? '' }}" />
                                                </div>
                                                @endif
                                            </div>
                                            <div id="box_{{$dokumen->id}}" @if($checked == 0) hidden @endif>
                                                <div class="col-sm-3 control-label">
                                                    <div class="input-group col-sm-3">
                                                        @if(!empty($rs->id))
                                                            <input type="file" name="upload_{{ $dokumen->id }}" id="upload_{{ $dokumen->id }}" value="{{ $dokumen->id }}" onchange="ValidateSize(this)" > 
                                                            @foreach ($upload as $up)
                                                                @if(!empty($upload))
                                                                    @if($up->ref_dokumen_id == $dokumen->id)
                                                                    <a href="/client/dokumen_ramuan/{{ $up->file_name }}">
                                                                    <input type="text" name="current_file_{{ $dokumen->id }}" id="current_file_{{ $dokumen->id }}" value="{{ $up->file_name ?? '' }}" style="border:none;width: 250px;"> 
                                                                    </a>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <input type="file" name="upload_{{ $dokumen->id }}" id="upload_{{ $dokumen->id }}" value="{{ $dokumen->id }}" onchange="ValidateSize(this)"> 
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($dokumen->nama == 'Sijil Halal')
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label" for="sijil" style="padding-right:0px;">Tarikh Tamat Sijil : </label>
                                                        <div class="col-sm-3">
                                                            <input type="date" class="form-control" name="tarikh_tamat_sijil" id="tarikh_tamat_sijil"  value="{{$rs->tarikh_tamat_sijil ?? ''}}" style="padding-left:0px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            <div class="form-group">
                                <div align="right">
                                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_hantar()" id="hantar">
                                        <i class="fa fa-arrow-right"></i> Hantar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Second Tab -->
			</div>
        </div>
        <!-- End Tab -->    
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
    $('#tab-2').attr('data-toggle','tab');

    // alert('hello');
    if($('#doc_1').prop('checked')){
        for(i=2;i<=6;i++)
        {
            // $('#doc_'+i).prop('disabled',true);
        }
    }

    if($('#doc_2').prop('checked') || $('#doc_3').prop('checked') || $('#doc_4').prop('checked') || $('#doc_5').prop('checked') || $('#doc_6').prop('checked')){
        // $('#doc_1').prop('disabled',true);
    }

})
</script>
@endif