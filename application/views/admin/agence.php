<link rel="stylesheet" href="<?php echo base_url('assets/ace/css/select2.css');?>">
<div class="page-header position-relative">
	<h1>
		Agence
		<small>
			<i class="icon-double-angle-right"></i>
			Create agence
		</small>
	</h1>
</div><!--/.page-header-->
<div class="offset1 span8 widget-container-span ui-sortable">
	<div class="widget-box">
		<div class="widget-header widget-header-small header-color-blue">
			<h5>Agence form</h5>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<form action="" method="post" class="form-horizontal">
					<?php echo validation_errors(); ?>
					<div class="control-group">
						<label class="control-label" for="inputName">
							Name
							<span class="red" title="This field is required.">*</span>
						</label>

                        <div class="controls">
                        	<input type="text" id="inputName" name="name">
                        </div><!-- /.controls -->
                    </div>
                    <!-- /.control-group -->
                    <div class="control-group">
						<label class="control-label" for="inputDescription">
							Description
						</label>

                        <div class="controls">
                        	<textarea name="description" id="inputDescription"></textarea>
                        </div><!-- /.controls -->
                    </div>
                    <!-- /.control-group -->
                    <div class="control-group">
						<label class="control-label" for="inputAdresse">
							Adresse
						</label>

                        <div class="controls">
                        	<input type="text" id="inputAdresse" name="adresse">
                        </div><!-- /.controls -->
                    </div>
                    <!-- /.control-group -->
                    <?php if (isset($agents) && count($agents)) {?>
					
					<div class="control-group">
						<label for="agent" class="control-label">
							Agents
						</label>
						<div class="controls">
							<select name="agents[]" class="select-agent" multiple="multiple">
								<option></option>
								<?php foreach ($agents as $item) {?>
								<option value="<?php echo $item->getId(); ?>"><?php echo $item->getName(); ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					
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

<script src="<?php echo base_url();?>assets/ace/js/select2.min.js"></script>
<script type="text/javascript">
<!--
var ajaxUrl = "<?php echo site_url('upload'); ?>";
var cropUrl = "<?php echo site_url('crop'); ?>";
function format(item) { return item.text; };

$(document).ready(function() {	
	var selectAgent = $(".select-agent").select2({
		minimumResultsForSearch: 10, 
		placeholder: 'Choose agent',
		allowClear: true
	});
});
-->
</script>