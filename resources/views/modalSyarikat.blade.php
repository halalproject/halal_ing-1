<script>
    function do_close() {
        location.reload();
    }
</script>

<div class="modal-header" style="background:-webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:10px;">
    <h4 class="modal-title">Maklumat Syarikat</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    @csrf
    <div class="col-md-12">
        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">Nama Syarikat :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control text-uppercase">{{ $company->syarikat->company_name ?? '' }}</b>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">Alamat :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control">{{ $company->syarikat->company_address_1 ?? '' }} <br>
                            {{ $company->syarikat->company_address_2 ?? '' }} <br>
                            {{ $company->syarikat->company_poscode ?? '' }} {{ $company->syarikat->company_address_3 ?? '' }} <br>
                            {{ $company->syarikat->company_city ?? '' }} <br> 
                            {{ $company->syarikat->company_country ?? '' }}</b>
                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">Negeri :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control">{{ $company->syarikat->company_city ?? '' }}</b>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">No. Tel :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control">{{ $company->syarikat->company_tel ?? '' }}</b>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">No. Fax :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control">{{ $company->syarikat->company_fax ?? '' }}</b>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">Emel :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="email" class="form-control" >{{ $company->syarikat->company_email ?? '' }}</b>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">Laman Web :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control">{{ $company->syarikat->company_web ?? '' }}</b>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">No. Rujukan :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control">{{ $company->syarikat->company_reg_code ?? '' }}</b>
                </div>
            </div>
        </div>
        
        <div class="form-group" style="margin:0px;">
            <div class="row">
                <label class="col-sm-3 control-label">Pegawai Rujukan :</label>
                <div class="col-sm-9">
                    <b style="border:none;" type="text" class="form-control text-uppercase">{{ $company->syarikat->contact_name ?? '' }}</b>
                </div>
            </div>
        </div>

        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                <th width="70%"><font color="#000000"><div align="left">Nama Ramuan & Alamat Syarikat</div></font></th>
                <th width="20%"><font color="#000000"><div align="left">Tarikh Luput Sijil Halal</font></th>
                </tr>
            </thead>
            <tbody>
                @php $bil = $list->perPage()*($list->currentPage()-1) @endphp
                    @foreach($list as $l)
                        <tr>
                            <td>{{ ++$bil }}</td>
                            <td>	
                                <b>{{ $l->syarikat->nama_ramuan }} @if(!empty($l->nama_saintifik)) ({{ $l->nama_saintifik }}) @endif </b><br>
                                {{ $l->syarikat->company_name }}<br> 
                                {{ $l->syarikat->company_address_1 }} <br>
                                {{ $l->syarikat->company_address_2 }} <br>
                                {{ $l->syarikat->company_poscode }} {{ $l->syarikat->company_address_3 }} <br>
                                {{ $l->syarikat->company_city }} <br> 
                                {{ $l->syarikat->company_country }}
                            </td>
                            <td>{{ date('d/m/Y', strtotime($l->tarikh_tamat_sijil)) }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>

        <div align="center" class="d-flex justify-content-center">
            {!! $list->render() !!}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
</div>
