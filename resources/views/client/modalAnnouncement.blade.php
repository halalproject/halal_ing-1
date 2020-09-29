<script>
    function do_close()
    {
        location.reload();
    }
</script>


<div class="col-md-12">
    <form name="create" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h6 class="panel-title"><font color="#000000" size="3"><b>Pengumuman</b></font></h6>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label">Tajuk :</label>
                            <div class="col-sm-9">
                                {{ $event->event}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName">Pengumuman :</label>
                            <div class="col-sm-9">
                                {!! $event->announcement !!}
                            </div>
                        </div>
                    </div>                

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="profileLastName"> Dokumen :</label>
                            <div class="col-sm-4">
                                <a href="/admin/dokumen_pengumuman/{{ $event->file_name }}">
                                    {{ $event->file_name }}
                                </a>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>