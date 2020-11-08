@extends('components.page')

@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>
<script language="javascript">
function do_save(){
  var perkara = $('#perkara').val();
  @if($surat->type == 'S')
  var no_rujukan = $('#no_rujukan').val();
  @else
  var no_rujukan = 'Null';
  @endif
	var k1Contents = CKEDITOR.instances['kandungan_1'].getData(); 
	document.halal.k1.value=k1Contents;
	var k2Contents = CKEDITOR.instances['kandungan_2'].getData(); 
	document.halal.k2.value=k2Contents;

	//alert("dd");
  if(perkara.trim() == '' ){
    alert('Sila masukkan maklumat perkara surat.');
    $('#tkh_soalan').focus(); return false;
	} else if(no_rujukan.trim() == '' ){
    alert('Sila masukkan no. rujukan surat.');
    $('#no_rujukan').focus(); return false;
	} else if(k1Contents.trim() == '' ){
    alert('Sila masukkan maklumat kandungan 1 surat.');
    $('#k1Contents').focus(); return false;
	} else if(k2Contents.trim() == '' ){
    alert('Sila pilih maklumat kandungan 2 surat.');
    $('#k1Contents').focus(); return false;
	} else {
		$.ajax({
			url:'/admin/surat/store', //&datas='+datas,
			type:'POST',
			//dataType: 'json',
			beforeSend: function () {
				$('#simpan').attr("disabled","disabled");
				$('.dispmodal').css('opacity', '.5');
			},
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='ERR' || data=='null'){
					swal({
					  title: 'Amaran',
					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
					  type: 'error',
					  confirmButtonClass: "btn-warning",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					});
				} else {
					swal({
					  title: 'Berjaya',
					  text: 'Maklumat telah berjaya dikemaskini',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
						window.location = '/admin/surat';
					});
				}
			}
		});
    }
}

function do_back()
{
  window.location = "/admin/surat/"
}
</script>
@php
if($surat->kod == 'S_LULUS'){
  $title = 'Surat Lulus';
} else if($surat->kod == 'S_TOLAK') {
  $title = 'Surat Tolak';
} else if($surat->kod == 'M_PEMOHON') {
  $title = 'Memo Pemohon';
} else if($surat->kod == 'M_PERMOHONAN') {
  $title = 'Memo Permohonan';
} else if($surat->kod == 'M_SEMAK') {
  $title = 'Memo Semakan';
} else if($surat->kod == 'M_TOLAK') {
  $title = 'Memo Tolak';
} else if($surat->kod == 'M_LULUS') {
  $title = 'Memo Lulus';
}
@endphp
<div class="row">
  @csrf
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <div class="tab-content">
        <!-- PROFILE -->
        <div class="active tab-pane" id="profile">
          <div class="box box-info">
            <div class="box-header with-border">
                    
              <div class="box-header with-border">
                <h3 class="box-title"><b> Kemaskini Maklumat Surat Rujukan ( {{ $title }} )</b></h3><br />
              </div>                    
              <!-- /.box-header -->
              <input type="hidden" name="surat_id" value="{{ $surat->id }}" />
              <input type="hidden" name="type" value="{{ $surat->type }}" />
              @csrf
            </div>
            <div class="box-body">
              <div class="form-group">
                <label class="control-label col-md-1 col-xs-12" for="perkara"><b>Perkara :</b></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="perkara" id="perkara" value="{{ $surat->perkara }}" class="form-control" />
                </div>
              </div>

              <div class="form-group" @if ($surat->type != 'S') hidden @endif >
                <label class="control-label col-md-1 col-xs-12" for="perkara"><b>No. Rujukan :</b></label>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" name="no_rujukan" id="no_rujukan" value="{{ $surat->no_rujukan }}" class="form-control" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="kandungan_1"><b>Kandungan 1 :</b><br /><br />
                  <i style="font-size:11px">
                    <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br />
                    <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                  </i>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea name="kandungan_1" id="kandungan_1" cols="70" rows="6" style="width:100%" class="form-control">{!! $surat->kandungan_1 !!}</textarea>
                </div>
              </div>

              <hr />

              <div class="form-group">
                <label class="control-label col-md-2 col-xs-12" for="kandunagn_2"><b>Kandungan 2 :</b><br /><br />
                  <i style="font-size:11px">
                    <img src="{{ asset('images/copy_word.png') }}" />&nbsp;Sila gunakan ikon ini jika dokumen disalin daripada Microsoft Word.<br />
                    <img src="{{ asset('images/create_table.png') }}" />&nbsp;Sila gunakan ikon ini untuk mewujudkan table di dalam laporan.
                  </i>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea name="kandungan_2" id="kandungan_2" cols="70" rows="6" style="width:100%" class="form-control">{!! $surat->kandungan_2 !!}</textarea>
                </div>
              </div>

              <div class="form-group" align="center">
                <input type="button" id="button" value="Simpan" class="btn btn-primary" onclick="do_save()" />
                <input type="button" id="button" value="Kembali" class="btn btn-primary" onclick="do_back()" />
                <textarea name="k1" style="display:none;width:100%" rows="3"></textarea>
                <textarea name="k2" style="display:none;width:100%" rows="3"></textarea>
              </div>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>        
</div>

<script>
CKEDITOR.replace('kandungan_1');
CKEDITOR.replace('kandungan_2');
</script>
@endsection