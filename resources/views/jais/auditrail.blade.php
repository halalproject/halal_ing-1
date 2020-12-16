@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_page()
{
    var tarikh = $('#tarikh').val();
    var carian = $('#carian').val();
    // alert(tarikh);
    var pathname = window.location.pathname;

    if(tarikh.trim()=='' && carian.trim()==''){
    window.location = pathname;
    } else {
    window.location = pathname+'?tarikh='+tarikh+'&carian='+carian;
    }
}
</script>
@php
$tarikh=isset($_REQUEST["tarikh"])?$_REQUEST["tarikh"]:"";
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
@endphp
		<div class="box" style="background-color:#F2F2F2">
            <div class="box-body">
        	    <input type="hidden" name="soalan_id" value="" />
                <div class="x_panel">
                    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                        <h2 class="panel-title"><font color="#000000"><b>AUDITRAIL</b></font></h2>
                    </header>
                </div>
            </div>
            <br />

            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-2">
                        <input type="date" class="form-control" id="tarikh" name="tarikh" value="{{ $tarikh }}" onchange="do_page()">
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
            <div align="right" style="padding-right:10px"><b>{{ $auditrail->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                  <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                  <th width="18%"><font color="#000000"><div align="left">Nama Pengguna</div></font></th>
                  <th width="7%"><font color="#000000"><div align="center">Tarikh Modifikasi</div></font></th>
                  <th width="75%"><font color="#000000"><div align="left">Statement</div></font></th>
                </tr>
                </thead>
                <tbody>
                    @php $bil = $auditrail->perPage()*($auditrail->currentPage()-1) @endphp
                    @foreach ($auditrail as $rs)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="left">
                            @if (!empty($rs->admin))
                            {{ $rs->admin->username }}
                            @else
                            {{ $rs->client->company_name }}
                            @endif
                        </td>
                        <td valign="top" align="center">
                            {{ date('d/m/Y', strtotime($rs->date)) }}
                        </td>
                        <td valign="top" align="left">
                            {{ $rs->action }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
		</div>
        <div align="center" class="d-flex justify-content-center">
            {!! $auditrail->appends(['tarikh'=>$tarikh,'carian'=>$carian])->render() !!}
        </div>
     </div>
  <!--</div>-->
<!-- DataTables -->

@endsection
