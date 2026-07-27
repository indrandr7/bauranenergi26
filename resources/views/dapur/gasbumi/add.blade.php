<style>
.margin1{margin-bottom:5px;}
.margin2{margin-bottom: -8px;}
.margin3{margin-bottom: 7px;}
.warnafont{color: #000000 !important;}
.labelku{margin-top: 5px !important; margin-bottom: 2px !important;font-weight: bold;font-size: 13px;}
.warnamerah{color:red};
</style>

<div class="modal-header" style="background-color:#128D93;">
    <h5 class="modal-title h5" id="formProdukTambah_judul" style="color:#ffffff;">
    {{ $judulmodal }}
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body" id="formtambah_body">
    <form id="formulir" name="formulir" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-1">
                <label class="labelku" style="color: #626365;font-size:13px;"><b>Jenis Gas Bumi:</b></label>
	            <select class="form-control" id="id_jenisgasbumi" name="id_jenisgasbumi" style="width: 40%;">
                    @if ($jenisgasbumi->count() != 0)
                        @foreach ($jenisgasbumi->get() as $jen)
                            <option value="{{ $jen->id_jenisgasbumi }}">{{ $jen->jenis_gasbumi }}</option>
                        @endforeach
                    @else
                        <option>Jenis Gas tidak ditemukan</option>
                    @endif
                </select>
            </div>
            <div class="form-group mb-1">
                <label class="labelku" style="color: #626365;font-size:13px;"><b>Sektor Gas Bumi:</b></label>
	            <select class="form-control" id="id_sektorgasbumi" name="id_sektorgasbumi" style="width: 40%;">
                    @if ($sektorgasbumi->count() != 0)
                        @foreach ($sektorgasbumi->get() as $sek)
                            <option value="{{ $sek->id_sektorgasbumi }}">{{ $sek->sektor_gasbumi }}</option>
                        @endforeach
                    @else
                        <option>Sektor gas tidak ditemukan</option>
                    @endif
                </select>
            </div>
            <div class="form-group mb-1">
                <label class="labelku" style="color: #626365;font-size:13px;"><b>Volume:</b></label>
	            <input type="input" class="form-control form-control-sm" id="volume" name="volume" style="width: 100%;">
            </div>
            <div class="form-group mb-1">
                <label class="labelku" style="color: #626365;font-size:13px;"><b>Penyedia:</b></label>
	            <input type="input" class="form-control form-control-sm" id="penyedia" name="penyedia" style="width: 100%;">
            </div>
        </div>

        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-info btn-sm" value="Simpan"><i class="feather icon-save"></i> Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Batal</button>
        </div>
    </div>
    </form>
</div>

<script type="text/javascript">
$.validator.setDefaults({
  submitHandler: function(){
    event.preventDefault();
    proceed = true;

    $.ajax({
        url: "{{ url('/gasbumi/save') }}",
        type: 'POST',
        data: new FormData($('#formulir')[0]),
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(resp){
            if (resp.result == "success"){
                swal({
                    title: "",
                    text: resp.message,
                    icon: "success",
                }).then(function(){
                    $('#modalku').modal('toggle');
                    reloadTable();
                });
            }else{
                var span = document.createElement("span");
                span.innerHTML = resp.message+'<br><br>'+resp.errors;
                swal({
                    html: true,
                    title: "",
                    content: span,
                    icon: "error",
                }).then(function(){
                    $('#modalku').modal('toggle');
                    reloadTable();
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown){
                console.log('jqXMLHTTReq: '+jqXHR+', Status: '+textStatus+', Error: '+errorThrown);
            },
    });
  },
  errorPlacement: function errorPlacement(error, element) {
    var $parent = $(element).parents('.form-group');
    if ($parent.find('.jquery-validation-error').length) {
        return;
    }
    $parent.append(error.addClass('jquery-validation-error small form-text invalid-feedback'));
  },
  highlight: function(element) {
    var $el = $(element);
    var $parent = $el.parents('.form-group');
    $el.addClass('is-invalid');
    if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
        $el.parent().addClass('is-invalid');
    }
  },
  unhighlight: function(element) {
      $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
  },
});

$(document).ready(function(e){
    $('.datepicker').datepicker({
        language: "en",
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $('#judul').focus();
    $('.summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 200,
    });

    $('#formulir').validate({
    rules: {
        id_jenisgasbumi: {
            required: true
        },
        id_sektorgasbumi: {
            required: true
        },
        volume: {
            required: true, number: true
        },
        penyedia: {
            required: true
        },
    }
    });
});
</script>