<script>

function do_close()
{
    location.reload();
}

</script>
<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h2 class="panel-title"><font color="#000000" size="3"><b>MYHALAL: PELANGGAN</b></font></h2>
        </header>

        <div class="panel-body"><div class="col-md-12">
            <input type="hidden" name="id" id="id" class="form-control" value="{{ $client->userid }}">
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Nama Syarikat :</b></label>
                    <div class="col-sm-5">{{ $client->company_name }}</div>
                    <label class="col-sm-3 control-label"><b>No Pendaftaran Syarikat :</b></label>
                    <div class="col-sm-2">{{ $client->company_reg_code }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Tarikh Pendaftaran Syarikat :</b></label>
                    <div class="col-sm-10">{{ date('d/m/Y',strtotime($client->company_reg_dt)) }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Jenis Syarikat :</b></label>
                    <div class="col-sm-5">{{ $client->company_type }}</div>
                    <label class="col-sm-3 control-label"><b>Kategori Syarikat :</b></label>
                    <div class="col-sm-2">{{ $client->company_category }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Alamat Syarikat :</b></label>
                    <div class="col-sm-5">{{ $client->company_address_1 }} {{ $client->company_address_2 }} {{ $client->company_address_3 }} {{ $client->company_city }} {{ $client->company_poscode }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Waktu Pejabat :</b></label>
                    <div class="col-sm-8">{{ $client->company_open }} - {{ $client->company_close }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Web :</b></label>
                    <div class="col-sm-5">{{ $client->company_web }}</div>
                    <label class="col-sm-3 control-label"><b>No. Fax :</b></label>
                    <div class="col-sm-2">{{ $client->company_fax }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"><b>Emel :</b></label>
                    <div class="col-sm-5">{{ $client->company_email }}</div>
                    <label class="col-sm-3 control-label"><b>No. Telefon :</b></label>
                    <div class="col-sm-2">{{ $client->company_tel }}</div>
                </div>
            </div>

            <hr>
            
            <div class="form-group">
                <div class="row">
                    <h6 class="panel-title"><b>Pegawai Yang Dilantik</b></h6>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label"><b> Nama pegawai :</b></label>
                    <div class="col-sm-8">{{ $client->contact_name }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label"><b> No K/P :</b></label>
                    <div class="col-sm-3">{{ $client->contact_ic }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label"><b> Jawatan :</b></label>
                    <div class="col-sm-8">{{ $client->contact_position }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label"><b> No. Telefon :</b></label>
                    <div class="col-sm-3">{{ $client->contact_tel }}</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label"><b> Email Pegawai :</b></label>
                    <div class="col-sm-4">{{ $client->contact_email }}</div>
                </div>
            </div>

            <div class="form-group">
                <div align="right">
                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                </div>
            </div>
        </div>
    </section>
</div>