<!-- FileUpload and Crop -->
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/file-upload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload-ui.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.Jcrop.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
<div class="list-your-property-form">
    <h2 class="page-header">List your property</h2>

    <div class="content">
        <div class="row">
            <div class="span8">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed ante auctor vel gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa.
                </p>
            </div><!-- /.span8 -->
        </div><!-- /.row -->

        <form method="post" id="fileupload" action="<?php echo site_url('immobilier/add');?>" enctype="multipart/form-data">
            	<?php if (isset($success) && $success) {?>
							<div class="alert-user alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php echo $success; ?>
							</div>
						<?php }?>
                        <?php echo validation_errors(); ?>
            <div class="row">
                

                <div class="span4">
                    <h3><strong>1.</strong> <span>Property info</span></h3>

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyLocation">
                            Name
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyLocation" name="libelle">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    <div class="control-group">
                        <label class="control-label" for="inputPropertyLocation">
                            Location
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" class="form-control select-fokotany" name="fokotany" placeholder="Fokotany" value="">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Property type
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select id="inputPropertyPropertyType" name="type_immo">
                               <?php if(isset($type) && count($type)>0){
                                foreach($type as $item){
                                ?>
                            <option value="<?php echo $item->getId(); ?>" id="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
                            <?php 
                                }
                                } ?>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
                            Contract type
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select id="inputPropertyContractType" name="contrat">
                            <?php if(isset($contrat) && count($contrat)>0){
                                foreach($contrat as $item){
                                ?>
                            <option value="<?php echo $item->getId(); ?>" id="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
                            <?php 
                                }
                                } ?>
                              
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyBedrooms">
                            Rooms
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" class="input-mask" id="inputPropertyBedrooms" name="room_number">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->


                    <div class="area control-group">
                        <label class="control-label" for="inputPropertyArea">
                            Area (m2)
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" class="input-mask" id="inputPropertyArea" name="area">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="price control-group">
                        <label class="control-label" for="inputPropertyPrice">
                            Price (Ar)
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" class="input-mask" id="inputPropertyPrice" name="price">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                </div><!-- /.span4 -->

                <div class="span4">
                    <h3><strong>3.</strong> <span>Image upload</span></h3>

                    <div id="test_id" class="image-upload control-group">
                     
                    	<div class="files image-preview-container"></div>
                        <div  class="gdn-file-input gdn-file-multiple upload-profile-picture test">					
						<label data-title="">
			               <input type="file" name="files[]" id="input_file">
						    <span class="upload-picture" data-title="No File ...">
						    	<span class="fa-stack fa-lg">
								  <i class="fa fa-circle fa-stack-2x"></i>
								  <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
								</span>
						    </span>
						</label>
						<a href="#" class="remove"><i class="fa fa-times"></i></a>
				    </div>
                    </div><!-- .fileupload -->
                    
                     <div class="price control-group">
                        <div class="controls"><input class="btn btn-primary pull-right" type="submit" value="Submit" /></div>
                     </div>

                </div><!-- /.span4 -->
            </div><!-- /.row -->
        </form>
    </div><!-- /.content -->
</div><!-- /.list-your-property-form -->



<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-upload image-upload-preview" >
	<span class="preview">
		<div class="upload-progress progress progress-striped active" 
			role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
			<div class="bar progress-bar-green" style="width:0%;"></div>
		</div>
	</span>
	<strong class="error text-error"></strong>
        
	{% if (!i && !o.options.autoUpload) { %}
		<div class="upload-action">
                <a class="start btn-upload-start" href="#">
                    <i class="fa fa-upload"></i>
                </a>
            {% } %}
            {% if (!i) { %}
                <a class="cancel btn-upload-cancel" href="#">
                    <i class="fa fa-times"></i>
                </a>
            {% } %}
		</div>
    </div>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-download image-download-preview">
	    {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}     
            {% if (file.deleteUrl) { %}
                <a href="#" class="delete delete-image remove" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="fa fa-times"></i>
                </a>
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}     
	<span class="preview">
	    {% if (file.mediumUrl) { %}
		<span class="imm-picture"><img src="{%=file.mediumUrl%}" id="{%=file.fileId%}" class="img-polaroid"></span>
	    {% } %}
	</span> 
	<div id="preview-pane" class="hide">
	    <div class="preview-container">
	      <img src="{%=file.mediumUrl%}" class="jcrop-preview" alt="Preview" />
	    </div>	    
	</div>               
    </div>
{% } %}
</script>
<!-- FileUpload and Crop -->
<script src="<?php echo base_url('assets/file-upload/js/tmpl.min.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/load-image.min.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/canvas-to-blob.min.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.iframe-transport.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-process.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-image.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-audio.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-video.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-validate.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.fileupload-ui.js');?>"></script>
<script src="<?php echo base_url('assets/file-upload/js/jquery.Jcrop.js');?>"></script>
<script src="<?php echo base_url('assets/select2/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/additional-methods.min.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.extensions.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.numeric.extensions.js');?>" type="text/javascript"></script>

<script type="text/javascript">
<!--
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";

var fokotany_url = "<?php echo site_url('fokotany/ajax'); ?>";
function format(item) { return item.text + ' - <strong>' + item.district + '</strong>'; };

$(document).ready(function() {
    $(document).one('click', '#test_id .test', function (e) {
        console.log($(this));
        $(document).on('click', '#input_file', function(){});
    });
    
	$('#fileupload').fileupload({
		autoUpload: true,
		maxFileSize: 2000000,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		url: ajaxUrl
	}).bind('fileuploadalways', function(e, data) {
		
		for (var i=0, file; file=data.result.files[i]; i++) {
			console.log(file);	
			$('img#'+file.fileId).after('<input type="hidden" name="fileId[]" value="'+file.id+'">');
		}

    });
    
    //get list fokotany
    
    var fokotany_opts = {};
	
	fokotany_opts = {
		placeholder: "Rechercher fokotany",
		minimumInputLength: 2,
        allowClear: true,
		ajax: {
			url: fokotany_url,
			dataType: 'json',
			quietMillis: 100,
			data: function (term, page) {
				return {
					q: term, // search term
				};
			},
			results: function (data, page) { 
				return {results: data};
			}
		},
		formatSelection: format,
		formatResult: format
	};
	var selectFokotany = jQuery(".select-fokotany").data("s3opts", fokotany_opts).select2(fokotany_opts);
	
    //Validation
    $('#fileupload').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
    		fokotany:'required',
			type_immo: 'required',
			contrat: 'required',
			room_number: 'required',
			area: 'required',
			price: 'required'
		},
		

		invalidHandler: function (event, validator) { //display error alert on form submit   
			$('.alert-error', $('.login-form')).show();
		},

		highlight: function (e) {
			$(e).closest('.control-group').addClass('error');
		},

		success: function (e) {
			$(e).closest('.control-group').removeClass('error');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(':checkbox') || element.is(':radio')) {
				$(element).closest('.control-group').append(error);
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chzn-select')) {
				error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
			form.submit();
		},
		invalidHandler: function (form) {
		}
	});    
    selectFokotany.change(function(){
        $(this).valid();
     });
     
     $('.input-mask').inputmask("decimal");
});
//-->
</script>