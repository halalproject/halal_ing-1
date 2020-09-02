
@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    // Remove advanced tabs for all editors.
    CKEDITOR.config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Language';

    function do_close()
    {
        location.reload();
    }
</script>


    <div class="box" style="background-color:#F2F2F2">
        <div class="box-body">
            <input type="hidden" name="soalan_id" value="" />
            <div class="x_panel">
                <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                    <div class="panel-actions">
                    <!--<a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>-->
                    </div>
                    <h6 class="panel-title"><font color="#000000"><b>SENARAI RAMUAN</b></font></h6> 
                </header>
            </div>
        </div>            
        <br />
        <div class="box-body">
            <div class="form-group">
                <div class="col-md-3">
                    <select name="lj_kategori" onchange="" class="form-control">
                        <option value="">Sijil Halal</option>
                        <option value="">Ada</option>
                        <option value="">Tiada</option>
                    </select>
                </div>
                <div class="col-md-3" >
                    <select name="lj_status" onchange="" class="form-control">
                        <option value="">Sumber Bahan</option>
                        <option value="9">Tumbuhan</option>
                        <option value="1">Kimia</option>
                        <option value="2">Haiwan</option>
                        <option value="2">Semulajadi</option>
                        <option value="2">Lain-Lain</option>
                    </select>
                </div>
                <div class="col-md-4" style="0px">
                    <input type="text" class="form-control" id="l_cari" name="l_cari" value="" placeholder="Maklumat Carian">
                </div>
    
                <div class="col-md-2" align="right" style="padding-right:25px">
                    <button type="button" class="btn btn-success" 
                        onclick="">
                        <i class="fa fa-search"></i> Carian</button>
                </div>
            </div>       
        </div>
        <br>
        <br>
        <div class="box-body">
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                <th width="20%"><font color="#000000"><div align="left">No. Permohonan</div></font></th>
                <th width="25%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                <th width="20%"><font color="#000000"><div align="left">Sumber Bahan</div></font></th>
                <th width="13%"><font color="#000000"><div align="left">Tarikh Permohonan</div></font></th>
                <th width="13%"><font color="#000000"><div align="left">Sijil Halal</div></font></th>
                <th width="7%"><font color="#000000"><div align="left">Tindakan</div></font></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>HQ0012411123</td>
                    <td>Ayam</td>
                    <td>Semulajadi</td>
                    <td>20/8/2020</td>
                    <td>Ada</td>
                    <td align="center">
                        <a href="premohonan/modalSenaraiPermohonan" data-toggle="modal" data-target="#myModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-sm btn-primary">
                                <i class="far fa-folder-open fa-lg" style="color: #FFFFFF;"></i> Buka
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

<script>
    CKEDITOR.replace('dokumen', {height: 250});
</script>

@endsection