<div class="row-fluid">
	<h3 class="header smaller lighter blue">List user</h3>
	
	<table id="list_user_table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</th>
				
				<th>From</th>
				<th>Content</th>
				<th>Immobilier</th>
				<th></th>
			</tr>
		</thead>

		<tbody>
			<?php if (isset($messages) && count($messages)) {
				foreach ($messages as $item) {?>
			<tr id="row-<?php echo $item['id']; ?>">
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>
				<td><?php echo $item['sender']." (".$item['email'].")" ?></td>
				<td><?php echo $item['content'] ?></td>
				<td><?php echo $item['immobilier']->getLibelle(); ?></td>								
				<td>
					<a class="btn btn-mini btn-success and_view my-tooltip" 
						data-toggle="tooltip" 
						data-placement="bottom" 
						href="#" 
						title="Detail"					
							>
						<i class="icon-eye-open bigger-120"></i></a>									
					<a class="btn btn-mini btn-danger and_delete my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Supprimer"><i class="icon-trash bigger-120"></i></a>
				</td>
			</tr>		
			<?php }
			}  ?>
		</tbody>
	</table>
</div>
<script src="<?php echo base_url('assets/js/bootbox.min.js');?>"></script>
<script type="text/javascript">
$(function() {
	var oTable1 = $('#list_user_table').dataTable( {
		"bLengthChange": false,
		"bInfo": false,
		"bProcessing": true,
		"aoColumns": [
			{ "bSearchable": false, "bSortable": false },
        	null,
        	null,
        	null,
            { "bSearchable": false, "bSortable": false },
    	] 
	} );
	$(document).on('click', '.and_view', function(e) {
		var nom = $(this).data("nom");
		var mail = $(this).data("mail");
		var phone = $(this).data("phone");
		var image = $(this).data("image");
		var agence = $(this).data("agence");
		
		var content = "<dl class='dl-horizontal'>";
        content += "<dd>"+image+"</dd>";
		content += "<dt>Name</dt>";
		content += "<dd>"+nom+"</dd>";
		content += "<dt>Mail</dt>";
		content += "<dd>"+mail+"</dd>";
		content += "<dt>Phone</dt>";
		content += "<dd>"+phone+"</dd>";
		content += "<dt>Agence</dt>";
		content += "<dd>"+agence+"</dd>";
        
		content += "</dl>";
		bootbox.dialog({
			message: content,
		  	title: "Detail user",
		  	buttons: {
		    	success: {
		      		label: "Fermer",
		      		className: "btn-primary",
		      		callback: function() {
		        		
		      		}
		    	}
		  	}
		});
		return false;
	});
	$('.and_delete').click(function(e) {
	});	
});
</script>