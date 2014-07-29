<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" type="text/css">
<!-- FileUpload and Crop -->
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/file-upload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.fileupload-ui.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/file-upload/css/jquery.Jcrop.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/immo-map.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
<div class="page-header position-relative">
	<h1>
		Immobilier
		<small>
			<i class="icon-double-angle-right"></i>
			Create immobilier
		</small>
	</h1>
</div><!--/.page-header-->

<div class="row-fluid">
	<div class="span12">
		<!--PAGE CONTENT BEGINS-->

		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-header widget-header-blue widget-header-flat">
						<h4 class="lighter">Immobilier form</h4>
						
					</div>

					<div class="widget-body">
						<div class="widget-main">
							<div class="row-fluid">
								<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container">
									<ul class="wizard-steps">
										<li data-target="#step1" class="active">
											<span class="step">1</span>
											<span class="title">Property Info</span>
										</li>
										
										<li data-target="#step2">
											<span class="step">2</span>
											<span class="title">Description</span>
										</li>

										<li data-target="#step3">
											<span class="step">3</span>
											<span class="title">Image Upload</span>
										</li>

										<li data-target="#step4" class="map-step">
											<span class="step">4</span>
											<span class="title">Map Info</span>
										</li>
									</ul>
								</div>

								<hr />
								<div class="step-content row-fluid position-relative" id="step-container">
									<form method="post" id="fileupload" class="form-horizontal" action="" enctype="multipart/form-data">
									<div class="step-pane active" id="step1">
										<h3 class="lighter block green">Enter the following information</h3>
                                        <?php if (!get_session_value('agence_id')) {?>
										<div class="property-type control-group">
					                        <label class="control-label" for="inputAgence">
					                            Agence
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
						                            <select id="inputAgence" name="agence">
						                            	<option></option>
						                               <?php if(isset($agences) && count($agences)){
							                                foreach($agences as $item){
							                                ?>
							                            <option value="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
							                            <?php 
						                                	}
						                                } ?>
						                            </select>
					                            </div>
					                        </div><!-- /.controls -->
					                    </div>
                                        <?php } ?>
					                    <div class="control-group">
					                        <label class="control-label" for="inputPropertyLocation">
					                            Name
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<input type="text" id="inputPropertyLocation" name="libelle" class="span12">
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					                    <div class="control-group">
					                        <label class="control-label" for="inputPropertyLocation">
					                            Location
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<input type="text" class="form-control select-fokotany" name="fokotany" value="">
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					                    <div class="property-type control-group">
					                        <label class="control-label" for="inputPropertyType">
					                            Property type
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
						                            <select id="inputPropertyType" name="type_immo">
						                            	<option></option>
						                               <?php if(isset($type) && count($type)>0){
							                                foreach($type as $item){
							                                ?>
							                            <option value="<?php echo $item->getId(); ?>" ><?php echo $item->getLibelle(); ?></option>
							                            <?php 
						                                	}
						                                } ?>
						                            </select>
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					
					                    <div class="contract-type control-group">
					                        <label class="control-label" for="inputContractType">
					                            Contract type
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
						                            <select id="inputContractType" name="contrat">
						                            	<option></option>
						                            	<?php if(isset($contrat) && count($contrat)>0){
							                                foreach($contrat as $item){
							                                ?>
							                            <option value="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
							                            <?php 
							                                }
						                                } ?>
						                              
						                            </select>
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					
					                    <div class="control-group">
					                        <label class="control-label" for="inputPropertyBedrooms">
					                            Rooms
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<input type="text" class="input-mask span12" id="inputPropertyBedrooms" name="room_number">
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					
					
					                    <div class="area control-group">
					                        <label class="control-label" for="inputPropertyArea">
					                            Area (m2)
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<input type="text" class="input-mask span12" id="inputPropertyArea" name="area" >
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					
					                    <div class="price control-group">
					                        <label class="control-label" for="inputPropertyPrice">
					                            Price (Ar)
					                            <span class="red" title="This field is required.">*</span>
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<input type="text" class="input-mask span12" id="inputPropertyPrice" name="price">
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
										
										
										
									</div>
									
									<div class="step-pane" id="step2">
										<h3 class="lighter block green">Add details</h3>
										<div class="control-group">
					                        <label class="control-label" for="inputAmenities">
					                            Amenities
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<input type="text" class="select-amenities" id="inputAmenities" name="amenities">
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
					                    <div class="control-group">
					                        <label class="control-label" for="inputPropertyNotes">
					                            Description
					                        </label>
					                        <div class="controls">
					                        	<div class="span6">
					                            	<textarea id="inputPropertyNotes" name="description"></textarea>
					                            </div>
					                        </div><!-- /.controls -->
					                    </div><!-- /.control-group -->
									</div>

									<div class="step-pane" id="step3">
									<h3 class="lighter block green">Upload your photos</h3>
										<div class="row-fluid">
											 <div id="test_id" class="image-upload control-group">                     
						                    	<div class="files image-preview-container"></div>
						                        <div  class="gdn-file-input gdn-file-multiple upload-profile-picture test">					
													<label data-title="">
										               <input type="file" name="files[]" id="input_file"  multiple="multiple">
													    <span class="upload-picture" data-title="No File ...">
													    	<span class="fa-stack fa-lg">
															  <i class="fa fa-circle fa-stack-2x"></i>
															  <i class="fa fa-plus fa-stack-1x fa-inverse"></i>
															</span>
													    </span>
													</label>
													<a href="#" class="remove"><i class="fa fa-times"></i></a>
											    </div>
						                    </div><!-- .image-upload -->
										</div>
									</div>

									<div class="step-pane" id="step4">
										<h3 class="lighter block green">Enter map info</h3>
										<input type="hidden" name="is_marker">
										<input type="hidden" name="lat_lng">
										<div id="property-map"></div>
									</div>
									
								</form>
								</div>

								<hr />
								<div class="row-fluid wizard-actions">
									<button class="btn btn-prev">
										<i class="icon-arrow-left"></i>
										Prev
									</button>

									<button class="btn btn-success btn-next" data-last="Finish ">
										Next
										<i class="icon-arrow-right icon-on-right"></i>
									</button>
								</div>
							</div>
						</div><!--/widget-main-->
					</div><!--/widget-body-->
				</div>
			</div>
		</div>

		<!--PAGE CONTENT ENDS-->
	</div><!--/.span-->
</div><!--/.row-fluid-->

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <div class="template-upload image-upload-preview" >
		<div class="preview">
			<div class="upload-progress progress progress-striped active" 
				role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
				<div class="bar progress-bar-green" style="width:0%;"></div>
			</div>
			{% if (!i && !o.options.autoUpload) { %}
			<div class="upload-action">
                <a class="start btn-upload-start" href="#">
                    <i class="fa fa-upload"></i>
                </a>            
            {% if (!i) { %}
                <a class="cancel btn-upload-cancel" href="#">
                    <i class="fa fa-times"></i>
                </a>
            {% } %}
			</div>
			{% } %}
			<div class="large-error"><strong class="error text-error"></strong></div>
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

<script src="<?php echo base_url();?>assets/ace/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/jquery.ui.touch-punch.min.js"></script>

<script src="<?php echo base_url();?>assets/ace/js/fuelux/fuelux.wizard.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/bootbox.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/ace/js/ace-elements.min.js"></script>
<script src="<?php echo base_url();?>assets/ace/js/ace.min.js"></script>
<!-- Upload and crop -->
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
<!-- Validate -->
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/additional-methods.min.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.extensions.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/input-mask/jquery.inputmask.numeric.extensions.js');?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/detect-browser.js');?>"></script>
<!-- GMaps -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyDbfSVd5AXiVUVoE6NNPqITUtxKBMiM7zI&amp;sensor=true"></script>
<script type="text/javascript">
	var basePath = "<?php echo base_url('assets'); ?>";
	if (typeof google !== "undefined") {
		document.write("<script src='"+basePath+"/js/gmap3.min.js'>"+"<"+"/script>");
		document.write("<script src='"+basePath+"/js/gmap3.infobox.min.js'>"+"<"+"/script>");
		document.write("<script src='"+basePath+"/js/immo-map.js'>"+"<"+"/script>");
	}	
</script>

<script type="text/javascript">
<!--
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";
var processUrl = "<?php echo site_url('crop'); ?>";
var fokotany_url = "<?php echo site_url('fokotany/ajax'); ?>";
var tagUrl = "<?php echo site_url('immobilier/amenity/ajax'); ?>";
function format(item) { return item.text + ' - <strong>' + item.district + '</strong>'; };

// Prototype for partial validation
jQuery.validator.prototype.subset = function(container) {
    var ok = true;
    var self = this;
    $(container).find(':input').each(function() {
        if (!self.element($(this))) ok = false;
    });
    return ok;
}

$(function() {
    
    

	if (typeof google !== "undefined") {
		InitMap(basePath); // initialize google map;
	} else {
//		$('.map-step').addClass('hide-map');
//		$('#step4').addClass('hide-map');
	}
	

	// Main form
	var wizardForm = $('#fileupload');

	// Validation
	wizardForm.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
			agence: 'required',
    		fokotany:'required',
			type_immo: 'required',
			contrat: 'required',
			room_number: 'required',
			area: 'required',
			price: 'required',
			amenities: 'required'
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

	//get list fokotany    
    var fokotany_opts = {};
	
	fokotany_opts = {
		placeholder: "Select fokotany",
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
    selectFokotany.change(function(){
        $(this).valid();
     });

    // Input Mask (price-area-room)
    $('.input-mask').inputmask("decimal");


    // Form wizard
 	$('#fuelux-wizard').ace_wizard().on('changed' , function(e){
		var d = $(this).wizard("selectedItem");
		if (d.step == 4) {
		    var center = map.getCenter();
            console.log(center);
		    google.maps.event.trigger(map, 'resize');        // fixes map display
		    map.setCenter(center); 
		}
	}).on('finished', function(e) { // End of wizard => Submit form if no error
		var is_marker = $('input[name="is_marker"]').val(); // Test if a marker is created
		var lat_lng = $('input[name="lat_lng"]').val(); // Value of [latitude,longitude] from maps
		
		if (!lat_lng && is_marker == 1) {
			bootbox.dialog("Please save your marker!", [{
				"label" : "OK",
				"class" : "btn-small btn-primary",
				}]
			);
		} else {
			wizardForm.submit(); // Submit Form!
		}
	}).on('change', function(event, info) {
		var step = 'step'+info.step;
		if (!wizardForm.validate().subset('#'+step)) {
		    event.preventDefault();
		}
	});

    // Click on label trigger file chooser for Firefox <= 19
	if (BrowserDetect.browser == 'Firefox' && BrowserDetect.version <= 19) {
		$(".gdn-file-input label").on("click",function(e) {
			if(e.currentTarget === this && e.target.nodeName !== 'INPUT') {
		      	$(this.control).click();
		    }
		});
	}

	var inputAgence = $('#inputAgence').select2({minimumResultsForSearch: 10, allowClear: true});
	var inputPT = $('#inputPropertyType').select2({minimumResultsForSearch: 10, allowClear: true});
	var inputCT = $('#inputContractType').select2({minimumResultsForSearch: 10, allowClear: true});

	inputAgence.change(function(){
        $(this).valid();
     });
	inputPT.change(function(){
        $(this).valid();
     });
	inputCT.change(function(){
        $(this).valid();
     });

	// Fileupload
	$('#fileupload').fileupload({
		autoUpload: true,
		maxFileSize: 2000000,
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		url: ajaxUrl + '?type=immobilier'
	}).bind('fileuploadalways', function(e, data) {		
		for (var i=0, file; file=data.result.files[i]; i++) {
			$('img#'+file.fileId).after('<input type="hidden" name="fileId[]" value="'+file.id+'">');
		}

    }).bind('fileuploadprocessfail', function(e, data) {
        $('.upload-action .start').addClass('hide');
        $('.upload-progress').addClass('hide');
    });

	// Add amenities
	var opts = {
		placeholder: "Add amenities",
		tags: true,
		minimumResultsForSearch: 4,
		tokenSeparators: [","],
		createSearchChoice: function(term, data) {
			if ($(data).filter(function() {
		    	return this.text.localeCompare(term) === 0;
		    }).length === 0) {
		    	return {
		        	id: term,
		        	text: term
		      	};
		    }
		},
		multiple: true,
		ajax: {
			url: tagUrl,
		    dataType: "json",
		    data: function(term, page) {
		    	return {
		        	q: term
		      	};
		    },
		    results: function(data, page) {
		    	return {
		        	results: data
		      	};
		    }
		}	
	};
	var selectAmenities = $(".select-amenities").data("s2opts", opts).select2(opts);	
	selectAmenities.change(function(){
        $(this).valid();
     });
    
	
});
</script>