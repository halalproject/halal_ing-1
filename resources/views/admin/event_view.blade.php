<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>{{ $rs->event }}</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <input type="hidden" name="id" id="id" class="form-control" value="{{ $rs->id }}">

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">Catatan:</label>
                        <div class="col-sm-8">
                            {!! $rs->announcement !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label">Dokumen: </label>
                        <div class="col-sm-8">
                            <a href="#">Dokumen.pdf</a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>