<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/file-upload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload-ui.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.Jcrop.css');?>">

<div class="page-header position-relative">
	<h1>
		User
		<small>
			<i class="icon-double-angle-right"></i>
			Create user
		</small>
	</h1>
</div><!--/.page-header-->
<div class="offset1 span8 widget-container-span ui-sortable">
	<div class="widget-box">
		<div class="widget-header widget-header-small header-color-blue">
			<h5>User form</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<form action="" method="post" class="form-horizontal">
					<?php echo validation_errors(); ?>
					<h4 class="header blue bolder smaller">General</h4>
					<div class="row-fluid">
						<div class="span3">
							<a href="#" class="fileinput-button show-modal">								
								<span class="upload-profile-picture crop change-image">									
									<label data-title="Change image" class="">
										<span class="img-preview" data-title="No File ..."><i class="icon-picture"></i></span>									
									</label>
								</span>
							</a>
						</div>
	
						<div class="vspace"></div>
	
						<div class="span9">
							<div class="control-group">
								<label for="username" class="control-label">
									Username
									<span class="red" title="This field is required.">*</span>
								</label>
	
								<div class="controls">
									<input type="text" value="" placeholder="" id="form-field-username" name="username">
								</div>
							</div>
	
							<div class="control-group">
								<label for="name" class="control-label">
									Name
									<span class="red" title="This field is required.">*</span>
								</label>
	
								<div class="controls">
									<input type="text" value="" placeholder="" name="name">
								</div>
							</div>
						</div>
					</div><!-- /.row-fluid -->
					<hr/>
					<div class="control-group">
						<label class="control-label" for="inputRegisterPassword">
							Password
							<span class="red" title="This field is required.">*</span>
						</label>

                        <div class="controls">
                        	<input type="password" id="inputRegisterPassword" name="password">
                        </div><!-- /.controls -->
                    </div>
                    <!-- /.control-group -->

                    <div class="control-group">
                    	<label class="control-label" for="inputRegisterRetype">
                    		Retype
                    		<span class="red" title="This field is required.">*</span>
                    	</label>

                        <div class="controls">
                        	<input type="password" id="inputRegisterRetype" name="passwordVerify">
                       	</div>
                        <!-- /.controls -->
                    </div>
                    <!-- /.control-group -->
                    <div class="space"></div>
                    <h4 class="header blue bolder smaller">Contact</h4>
                    <div class="control-group">
						<label for="form-field-email" class="control-label">Email</label>

						<div class="controls">
							<span class="input-icon input-icon-right">
								<input type="email" value="" id="form-field-email" name="email">
								<i class="icon-envelope"></i>
							</span>
						</div>
					</div>
					<div class="control-group">
						<label for="form-field-phone1" class="control-label">Phone 1</label>

						<div class="controls">
							<span class="input-icon input-icon-right">
								<input type="text" id="form-field-phone1" class="input-mask-phone" name="phone1">
								<i class="icon-phone icon-flip-horizontal"></i>
							</span>
						</div>
					</div>
					<div class="control-group">
						<label for="form-field-phone2" class="control-label">Phone 2</label>

						<div class="controls">
							<span class="input-icon input-icon-right">
								<input type="text" id="form-field-phone2" class="input-mask-phone" name="phone2">
								<i class="icon-phone icon-flip-horizontal"></i>
							</span>
						</div>
					</div>
					<div class="space"></div>
                    <h4 class="header blue bolder smaller">Role</h4>
                    
					<?php if (isset($roles) && count($roles)) {?>
					<span class="span5">
					<div class="control-group">
						<label for="role" class="control-label">
							Role
							<span class="red" title="This field is required.">*</span>
						</label>
						<div class="controls">
							<select name="role" class="select-role">
								<option></option>
								<?php foreach ($roles as $item) {?>
								<option value="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					</span>
					<div class="clearfix"></div>
					<?php } ?>
					<div class="form-actions">
						<button type="submit" class="btn btn-info">
							<i class="icon-ok bigger-110"></i>
							Save
						</button>

						&nbsp; &nbsp; &nbsp;
						<button type="reset" class="btn">
							<i class="icon-undo bigger-110"></i>
							Reset
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal hide fade" id="uploadModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue">Modifier profile</h4>
	</div>

	<form class="no-margin" id="fileupload" action="" method="POST" enctype="multipart/form-data">
	<div class="modal-body">
		<div class="space-4"></div>
		<div style="width:94%;margin-left:3%;">
		    <div class="gdn-file-input gdn-file-multiple upload-profile-picture crop">					
				<label data-title="Choose an image">
	                <input type="file" name="files[]" id="input_file">
				    <span data-title="No File ..."><i class="icon-picture"></i></span>
				</label>
				<a href="#" class="remove"><i class="icon-remove"></i></a>
		    </div>
		    <div class="gdn-file-preview">
				<div class="files"></div>
		    </div>
		</div>
	</div>
	
	<div class="modal-footer center">
		<button type="button" class="btn btn-small btn-success submit-button"><i class="fa fa-check"></i> Valider</button>
		<button type="reset" class="btn btn-small btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Annuler</button>
	</div>
	</form>
</div><!-- /.modal -->
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-upload">
	<span class="preview crop"></span>
	<strong class="error red"></strong>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar progress-bar-green" style="width:0%;"></div></div>
	{% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary btn-small start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel btn-small btn-upload-cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
    </div>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-download gdn-dashed">
	    {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}     
            {% if (file.deleteUrl) { %}
                <a href="#" class="delete delete-image remove" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="icon-remove"></i>
                </a>
            {% } else { %}
                <button class="btn btn-warning btn-small cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}     
	<span class="preview">
	    {% if (file.mediumUrl) { %}
		<span class="profile-picture"><img src="{%=file.mediumUrl%}" id="{%=file.fileId%}"></span>
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
<!--<script src="<?php echo base_url();?>assets/ace/js/jquery-ui-1.10.3.custom.min.js"></script>-->
<script src="<?php echo base_url();?>assets/ace/js/jquery.ui.touch-punch.min.js"></script>



<script src="<?php echo base_url();?>assets/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.extensions.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/input-mask/jquery.inputmask.phone.extensions.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>
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
<script src="<?php echo base_url('assets/file-upload/js/jquery.gdn-imageupload-ui.js');?>"></script>
<script src="<?php echo base_url('assets/js/detect-browser.js');?>"></script>

<script type="text/javascript">
<!--
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";
function format(item) { return item.text; };

$(document).ready(function() {
	if (BrowserDetect.browser == 'Firefox' && BrowserDetect.version <= 19) {
		$(document).on("click",".gdn-file-input label", function(e) {
			console.log("click");
			if(e.currentTarget === this && e.target.nodeName !== 'INPUT') {
		      	$(this.control).click();
		    }
		});
	}
	var selectRole = $(".select-role").select2({
		minimumResultsForSearch: 10, 
		placeholder: 'Choose role',
		allowClear: true
	})
	var showmodal = $('.show-modal').imageupload({
		doCrop: true,
		uploadUrl: ajaxUrl + '?type=user',
		cropUrl: cropUrl,
		fileName: 'userFileId',
		xs: 60,
		sm: 100,
        md: 140
	}).bind('imageuploadcomplete', function(event, data) {
		var deleteLink = '<a href="#" class="delete-all remove-all remove-cropped" data-type="'+data.deleteType+'" \
		data-url="'+data.deleteUrl+'" > \
        <i class="icon-remove"></i> \
        </a>';
        $('.upload-profile-picture.change-image > label').toggleClass("cropped");        
		$(this).before(deleteLink);
	});

	$(document).on('click', '.delete-all', function(e) {
		e.preventDefault();
		var that = $(this);
		$.ajax({
			url: that.data("url"),
			type: that.data("type"),
			dataType: 'json',
			success: function(res) {
				if (res) {
					$('.img-preview').html('<i class="icon-picture"></i>');
					$('.upload-profile-picture.change-image > label').toggleClass("cropped");
					that.detach();
				}
			}
		});	
    }); 
    
	$('.input-mask-phone').inputmask('(999) 99 999 99');
});
//-->
</script>