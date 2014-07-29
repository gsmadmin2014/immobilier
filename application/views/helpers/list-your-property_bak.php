<!-- FileUpload and Crop -->
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

        <form method="post" id="fileupload" action="/sample" enctype="multipart/form-data">
            <div class="row">
                <div class="span4">
                    <h3><strong>1.</strong> <span>Personal info</span></h3>

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyFirstName">
                            First name
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyFirstName">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertySurname">
                            Surname
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertySurname">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyEmail">
                            Email
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyEmail">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyPhone">
                            Phone
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyPhone">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                </div><!-- /.span4 -->

                <div class="span4">
                    <h3><strong>2.</strong> <span>Property info</span></h3>

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyLocation">
                            Location
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyLocation">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Property type
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select id="inputPropertyPropertyType">
                                <option id="apartment1">Apartment</option>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
                            Contract type
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select id="inputPropertyContractType">
                                <option id="apartment2">Rent</option>
                                <option id="apartment3">Sale</option>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="bedrooms control-group">
                        <label class="control-label" for="inputPropertyBedrooms">
                            Bedrooms
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyBedrooms">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="bathrooms control-group">
                        <label class="control-label" for="inputPropertyBathrooms">
                            Bathrooms
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyBathrooms">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="area control-group">
                        <label class="control-label" for="inputPropertyArea">
                            Area
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyArea">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="price control-group">
                        <label class="control-label" for="inputPropertyPrice">
                            Price
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" id="inputPropertyPrice">
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


<script type="text/javascript">
<!--
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";

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
	
});
//-->
</script>