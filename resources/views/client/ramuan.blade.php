@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_page()
{
    var sijil = $('#sijil').val();
    var kategori = $('#kategori').val();
    var carian = $('#carian').val();
//   alert(sijil);
    var pathname = window.location.pathname;

    if(sijil.trim()=='' && kategori.trim()=='' && carian.trim()==''){
    window.location = pathname;
    } else {
    window.location = pathname+'?sijil='+sijil+'&kategori='+kategori+'&carian='+carian;
    }
}

// function do_hapus(id)
// {
//     // alert(id);
//     swal({
//         title: 'Adakah anda pasti untuk menghapuskan ramuan ini?',
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Ya, Teruskan',
//         cancelButtonText: 'Tidak, Batal!',
//         reverseButtons: true
//     }).then(function () {
//         $.ajax({
// 			url:'/client/ramuan/delete/'+id, //&datas='+datas,
// 			type:'POST',
// 			data: $("form").serialize(),
// 			//data: datas,
// 			success: function(data){
// 				console.log(data);
// 				//alert(data);
// 				if(data=='OK'){
// 					swal({
// 					  title: 'Berjaya',
// 					  text: 'Permohonan telah dihapuskan',
// 					  type: 'success',
// 					  confirmButtonClass: "btn-success",
// 					  confirmButtonText: "Ok",
// 					  showConfirmButton: true,
// 					}).then(function () {
//                         location.reload();
// 					});
// 				} else if(data=='ERR'){
// 					swal({
// 					  title: 'Amaran',
// 					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
// 					  type: 'error',
// 					  confirmButtonClass: "btn-warning",
// 					  confirmButtonText: "Ok",
// 					  showConfirmButton: true,
// 					});
// 				}
// 			}
// 		});
//     });
// }
</script>

<style media="print" type="text/css">
	.printButton { display: none; }
</style>
@php 
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
$sijil=isset($_REQUEST["sijil"])?$_REQUEST["sijil"]:"";
$kategori=isset($_REQUEST["kategori"])?$_REQUEST["kategori"]:"";
@endphp
		<div class="box printButton" style="background-color:#F2F2F2">

            <div class="box-body">
        	<input type="hidden" name="soalan_id" value="" />
            <div class="x_panel">
			<header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <div class="panel-actions">
                <!--<a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>-->
                </div>
                <h2 class="panel-title"><font color="#000000"><b>SENARAI RAMUAN</b></font></h2> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                <div class="form-group  ">
                @csrf
                    <div class="col-md-2">
                        <select name="sijil" id="sijil" onchange="do_page()" class="form-control">
                            <option value="">Sijil Halal</option>
                            <option value="1" @if($sijil == '1') selected @endif>Ada</option>
                            <option value="0" @if($sijil == '0') selected @endif>Tiada</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="kategori" id="kategori" onchange="do_page()" class="form-control">
                            <option value="">Kategori Bahan</option>
                            @foreach ($cat as $cat)
                            <option value="{{$cat->id}}" @if($kategori == $cat->id) selected @endif>{{$cat->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
                    </div>
        
        			<div class="col-md-2" align="right">
                        <button type="button" class="btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
                    </div>
                </div>
            </div>
            <br>
            <div align="right" style="padding-right:10px"><b>{{ $ramuan->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                    <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                    <th width="14%"><font color="#000000"><div align="left">No. Permohonan</div></font></th>
                    <th width="18%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                    <th width="10%"><font color="#000000"><div align="left">Kategori</font></th>
                    <th width="18%"><font color="#000000"><div align="left">Nama & Alamat Pengilang/Pengeluar</font></th>
                    <th width="10%"><font color="#000000"><div align="center">Status Sijil Halal</font></th>
                    <th width="10%"><font color="#000000"><div align="center">Tarikh Tamat Sijil</font></th>
                    <th width="15%"><font color="#000000"><div align="center">Tindakan</div></font></th>
                </tr>
                </thead>
                <tbody>
                    @php $bil = $ramuan->perPage()*($ramuan->currentPage()-1) @endphp
                    @foreach($ramuan as $ing)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="left">{{ $ing->ing_kod }}</td>
                        <td valign="top" align="left">
                            {{ $ing->nama_ramuan }}
                            <br>
                            ({{ $ing->nama_saintifik }})
                        </td>
                        <td valign="top" align="left">{{ optional($ing->sumber)->nama }}</td>
                        <td valign="top" align="left">
                            <u><b>{{ $ing->nama_pengilang }}</b></u>
                            <br>
                            {{ $ing->alamat_pengilang_1 }} {{ $ing->alamat_pengilang_2 }} {{ $ing->alamat_pengilang_3 }}
                        </td>
                        <td valign="top" align="center">
                        @if ($ing->is_sijil == 0)
                            Tiada
                        @else
                            Ada
                        @endif
                        </td>
                        <td valign="top" align="center">
                            <p>{{ date('d/m/Y', strtotime($ing->tarikh_tamat_sijil)) }}</p>
                            @php
                            $tkh = $ing->tarikh_tamat_sijil;
                            $date1 = time();
                            $y = substr($tkh,0,4);
                            $m = substr($tkh,5,2);
                            $d = substr($tkh,8,2);
                            $date2 = mktime(0,0,0,$m,$d,$y);
                            $dateDiff = $date2 - $date1;
                            $fullDays = floor($dateDiff/(60*60*24));
                            if($fullDays<=7) {
                                if($fullDays<0) { 
                                    $fd=0-$fullDays; 
                                    $fd="( -".$fd.")"; 
                                } else { 
                                    $fd=$fullDays; 
                                }
                                print "<span class='label label-danger'><b>".$fd." Hari Lagi</b></span>";
                            } else if($fullDays <= 30) {
                                print "<span class='label label-warning'><b>".$fullDays." Hari Lagi</b></span>";
                            } else if($fullDays <= 90){
                                print "<span class='label label-success'><b>".$fullDays." Hari Lagi</b></span>";
                            }
                            @endphp
                        </td>
                        <td align="center">
                            <!-- <a href="/client/ramuan/view/{{ $ing->id }}" data-toggle="modal" data-target="#myModal" title="Cetak Maklumat Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-dark">
                                    <i class="fa fa-print fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a> -->
                            <a href="/client/ramuan/view/{{ $ing->id }}" data-toggle="modal" data-target="#myModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-text fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            @if($ing->is_sijil == '1')
                                <a href="/client/ramuan/edit/{{ $ing->id }}" data-toggle="modal" data-target="#myModalm" title="Kemaskini Ramuan" class="fa" data-backdrop="static">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                    </button>
                                </a>
                            @endif
                            <a href="/client/ramuan/delete_comment/{{ $ing->id }}" data-toggle="modal" data-target="#myModal" title="Hapus Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                    <!-- </span> -->
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
		</div>
        <div align="center" class="d-flex justify-content-center">
          {!! $ramuan->appends(['sijil'=>$sijil,'kategori'=>$kategori,'carian'=>$carian])->render() !!}
        </div>
     </div>
  <!--</div>-->    
<!-- DataTables -->

@endsection