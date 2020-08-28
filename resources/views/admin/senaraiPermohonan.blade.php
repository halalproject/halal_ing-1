
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
                        <option value="">Status Sijil</option>
                        <option value="">Ada</option>
                        <option value="">Tiada</option>
                    </select>
                </div>
                <div class="col-md-3" >
                    <select name="lj_status" onchange="" class="form-control">
                        <option value="">Kategori</option>
                        <option value="9">Belum Diagihkan</option>
                        <option value="1">Belum Dijawab</option>
                        <option value="2">Telah Dijawab</option>
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
                <th width="30%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                <th width="15%"><font color="#000000"><div align="left">Kategori</div></font></th>
                <th width="13%"><font color="#000000"><div align="left">Tarikh Permohonan</div></font></th>
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
                    <td align="center">
                        <a href="" data-toggle="modal" data-target="#maklumatRamuanModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
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

    <!-- Modal -->
    <div class="modal fade" id="maklumatRamuanModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top:350px;left: 50%;transform: translate(-50%, -50%);width:max-content;">
            <div class="modal-header" style="background:-webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:10px;">
            <h4 class="modal-title">Maklumat Syarikat</h4>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <fieldset class="form-group">
                        <div class="row">
                            <label class="col-form-label col-sm-2 pt-0">Status :</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="semak" id="semak" value="semak">
                                        <label class="form-check-label" for="semak">
                                        Semak
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="semula" id="semula" value="semula">
                                        <label class="form-check-label" for="semula">
                                            Semak Semula
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="lulus" id="lulus" value="lulus">
                                        <label class="form-check-label" for="gridRadios3">
                                        Lulus
                                        </label>
                                    </div>
                                    <div class="form-check">
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
                            <label class="col-sm-2 control-label" for="exampleFormControlTextarea1">Catatan :</label>
                            <div class="col-sm-10">
                            <textarea name="dokumen" cols="50" rows="10" id="story" style="width:100%"></textarea>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                        <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                            <i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </div>
  <!--</div>-->    
<!-- DataTables -->

<script>
    CKEDITOR.replace('dokumen', {height: 250});
</script>

@endsection