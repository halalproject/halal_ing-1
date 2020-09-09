<script>
function do_able(ids)
{
    // alert(ids)
    var doc = $('#doc_'+ids).prop('checked')
    // alert(doc)
    if(doc){
        if(ids == '1')
        {
            for(i=2;i<=6;i++)
            {
                // $('#doc_'+i).prop('disabled',true);
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
                // $('#doc_'+i).prop('disabled',false);
            }
            $('#tarikh_tamat_sijil').val('')
        } else if(!$('#doc_2').prop('checked') && !$('#doc_3').prop('checked') && !$('#doc_4').prop('checked') && !$('#doc_5').prop('checked') && !$('#doc_6').prop('checked')){
            // $('#doc_1').prop('disabled',false);
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

function do_hantar()
{
    $("input:checked").each(function () {
        var id = $(this).val();
        // alert(id);
        var file = $('#upload_'+id).val();
        var date = $('#tarikh_tamat_sijil').val();
        var input = $('#nama_lain').val();

        if(id == 6 && input.trim() == ''){
            swal({
                title: 'Amaran',
                text: 'Sila masukkan maklumat dokumen yang dihantar.',
                type: 'warning',
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Ok",
                showConfirmButton: true,
            });
        } else if(file == ''){
            swal({
                title: 'Amaran',
                text: 'Sila masukkan dokumen yang diperlukan.',
                type: 'warning',
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Ok",
                showConfirmButton: true,
            });
        } else if(id == 1 && date.trim() == ''){
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

function do_close()
{
    location.reload();
}
</script>
@php
$id = $rs->id ?? '';
$status = $rs->status ?? '';
$bahan_rs = $rs->sumber_bahan_id ?? '';
$negara_rs = $rs->negara_pengilang_id ?? '';
$negeri_rs = $rs->negeri_pembekal_id ?? '';
$nama_dokumen = '';
if(!empty($id)){
    foreach ($upload as $doc) {
        if($doc->ref_dokumen_id == 6){
            $nama_dokumen = $doc->nama_dokumen ?? '';
        }
    }
}
@endphp
<div class="col-md-12">
<form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="panel panel-featured panel-featured-info">
    <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
        <h6 class="panel-title"><font color="#000000" size="3"><b>@if(empty($id)) Tambah @else Kemaskini @endif Maklumat Permohonan</b> @if($status == 0)[Draf] @else [Hantar]@endif</font></h6>
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
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Ramuan :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ramuan" id="ramuan" class="form-control" value="{{$rs->nama_ramuan??''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Saintifik :</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="saintifik" id="saintifik" class="form-control" value="{{$rs->nama_saintifik??''}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Sumber Bahan 
                                    <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true" 
                                        title="This is tooltips <br> for information.Thank you"></i> :
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

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Negara Asal Pengilang/Pengeluar: </label>
                                    <div class="col-sm-4">
                                        <select name="negara_kilang" id="negara_kilang" class="form-control">
                                            <option value="">Pilih Negara</option>
                                            @foreach($negara as $negara)
                                            <option value="{{ $negara->kod }}" @if($negara_rs == $negara->kod) selected @endif>{{ $negara->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Pengilang/Pengeluar : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_pengilang" id="nama_pengilang" placeholder="Nama Pengilang/Pengeluar" class="form-control" value="{{$rs->nama_pengilang??''}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Alamat Pengilang/Pengeluar : </label>
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
                                    <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Negeri Asal Pembekal: </label>
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
                                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Pembekal : </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama_pembekal" id="nama_pembekal" placeholder="Nama Pembekal" class="form-control" value="{{$rs->nama_pembekal??''}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Alamat Pembekal : </label>
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
                                        <input type="text" name="bekal_poskod" id="bekal_poskod" placeholder="Poskod" class="form-control" value="{{$rs->poskod_pembekal??''}}">
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
                                    <label class="col-sm-12 control-label">Sila klik butang simpan terlebih dahulu sebelum meletakkan dokumentasi permohonan</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div align="right">
                                    <label class="col-sm-12 control-label">Sila klik butang hantar di menu maklumat dokumentasi bagi proses pengesahan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Tab -->
                
                <!-- Second Tab -->
				<div id="t2" class="card tab-pane row in" role="tabpanel" aria-labelledby="tab-2">
                    <div class="panel-body ">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-5 control-label" for="sijil"><h4><font color="#FF0000">*</font> Dokumen Yang Berkenaan: </h4></label>
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
                                                onchange="do_able({{$dokumen->id}})"/>&nbsp;{{ $dokumen->nama }} 
                                            <i class="fa fa-question-circle" style="cursor:pointer;color:#0040FF" data-toggle="tooltip" data-placement="right" data-html="true"
                                                title="{!! $dokumen->remarks !!}"></i>
                                        </div>
                                        @if($dokumen->id == 6)
                                        <div class="addrow_{{$dokumen->id}}" @if($checked == 0) hidden @endif>
                                            <input type="text" name="nama_lain" id="nama_lain" class="form-control"value="{{ $nama_dokumen }}" />
                                        </div>
                                        @endif
                                    </div>
                                    <div id="box_{{$dokumen->id}}" @if($checked == 0) hidden @endif>
                                        <div class="col-sm-3 control-label">
                                            <div class="input-group col-sm-3">
                                                <input type="file" name="upload_{{ $dokumen->id }}" id="upload_{{ $dokumen->id }}">
                                                @if(!empty($upload))
                                                @foreach ($upload as $up)
                                                    @if($up->ref_dokumen_id == $dokumen->id)
                                                        {{ $up->file_name }}
                                                    @endif
                                                @endforeach
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
            $('#doc_'+i).prop('disabled',true);
        }
    }

    if($('#doc_2').prop('checked') || $('#doc_3').prop('checked') || $('#doc_4').prop('checked') || $('#doc_5').prop('checked') || $('#doc_6').prop('checked')){
        $('#doc_1').prop('disabled',true);
    }

})
</script>
@endif