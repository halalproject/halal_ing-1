<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
// Remove advanced tabs for all editors.
CKEDITOR.config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Language';

function do_close()
{
    location.reload();
}
</script>

<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Tambah Pengumuman</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <input type="hidden" name="id" id="id" class="form-control" value="">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tajuk :</label>
                        <div class="col-sm-8">
                            <input type="text" name="tajuk" id="tajuk" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Kategori :</label>
                        <div class="col-sm-8">

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Pengumuman :</label>
                        <div class="col-sm-8">
                            <textarea name="pengumuman" cols="50" rows="10" id="pengumuman" style="width:100%"></textarea>
                        </div>
                    </div>
                </div>                

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Dokumen :</label>
                        <div class="col-sm-4">
                            <input type="file" name="doc" id="doc" class="form-control" value="">
                        </div>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label" for="profileLastName"><font color="#FF0000">*</font> Pengumuman Untuk: </label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" name="pengumuman_untuk" id="awam" value="0"> Awam
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="pengumuman_untuk" id="dalaman" value="1"> Dalaman
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="pengumuman_untuk" id="syarikat" value="2"> Syarikat
                            </label>
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
</div>
<script>
CKEDITOR.replace('pengumuman', {height: 250});
</script>