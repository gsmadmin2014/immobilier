<div class="widget contact">
    <div class="title">
        <h2 class="block-title">Contact agent</h2>
    </div><!-- /.title -->
    <div class="content">
        <form method="post" action="" id="message-form">
        	
        	<div class="control-group">
                <label class="control-label" for="inputName">
                    Agent
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                	<select name="agent" id="inputAgent">
						<option></option>
							<?php  if (isset($agents) && count($agents) > 0) {
								foreach ($agents as $item) {
							?>
							<option  value="<?php echo $item['id_user']; ?>" id="<?php echo $item['id_user']; ?>"><?php echo $item['name']; ?></option>
                            <?php 
                            	}
							} ?>
					</select>
				</div><!-- /.controls -->
            </div><!-- /.control-group -->
            <div class="control-group">
                <label class="control-label" for="inputName">
                    Name
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="inputName" name="name">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="inputEmail">
                    Email
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="email">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="inputMessage">
                    Message
                    <span class="form-required" title="This field is required.">*</span>
                </label>

                <div class="controls">
                    <textarea id="inputMessage" name="content"></textarea>
                </div><!-- /.controls -->
            </div><!-- /.control-group -->
			<input type="hidden" value="<?php echo $detimmo['id'] ?>" name="immobilier">
            <div class="form-actions">
                <input type="submit" class="btn btn-primary arrow-right" value="Send">
                
            </div><!-- /.form-actions -->
        </form>
    </div><!-- /.content -->
</div><!-- /.widget -->
<!-- Validate -->
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/additional-methods.min.js');?>"></script>
<script type="text/javascript">
var message_url = "<?php echo site_url('message/send'); ?>";
$(function() {
	// Message form
	var messageForm = $('#message-form');

	// Validation
	messageForm.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		focusInvalid: false,
		rules: {
			agent: 'required',
    		name:'required',
    		email: {
				required: true,
				email: true
			},
			content: 'required',
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
			var $inputs = $(form).find("input, select, button, textarea");
			$.ajax({
				type: "POST",
  				url: message_url,
  				data: $(form).serialize(),
  				beforeSend: function() {
					$inputs.prop("disabled", true);
					$('<i class="loading-send-message fa fa-spinner fa-spin fa-lg"></i>').insertAfter('input[type="submit"]');
				},
  				success: function(data) {
					$('.loading-send-message').remove();
	  				if (data.success) {		  				
	  					$(form).prepend('<div class="alert alert-success"> \
	  							<button data-dismiss="alert" class="close" type="button"> \
	  							<i class="icon-remove"></i> \
	  						</button> \
	  						Message sent. \
	  					</div>');
	  				}
	  				$inputs.prop("disabled", false);
					messageForm[0].reset();
				},
  				dataType: 'json'
			});			
		},
		invalidHandler: function (form) {
		}
	}); 
	
});
</script>