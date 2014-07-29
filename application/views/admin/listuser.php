<div class="row-fluid">
	<h3 class="header smaller lighter blue">List user</h3>
	
	<table id="list_user_table" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th style="width: 10px">Image</th>
				
				<th>Name</th>
				<th>E-mail</th>
				<th>Phone number</th>
                <th>Role</th>
				<th style="width: 100px">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php if (isset($olonas) && count($olonas)) {
				foreach ($olonas as $item) {?>
			<tr id="row-<?php echo $item['id']; ?>">
				<td><span class="admin-list-user"><img src="<?php echo base_url('assets'.user_relative_image_path('xs', $item['fileId'])); ?>" alt="" class="img-thumbnail"></span></td>
				<td><a href="#"><?php echo $item['name']; ?></a></td>
				<td><?php echo $item['email']; ?></td>
				<td><?php echo $item['firstPhone']; ?></td>
				<td><?php echo $item['role']['name']; ?></td>								
				<td>
					<a class="btn btn-small btn-danger and_view my-tooltip" 
						data-toggle="tooltip" 
						data-placement="bottom" 
						href="#" 
						title="Detail"
						data-nom="<?php echo $item['name']; ?>"
						data-mail="<?php echo $item['email']; ?>"
						data-phone="<?php echo $item['firstPhone']; ?>"
                        data-image="<img src='<?php echo base_url('assets'.user_relative_image_path('sm', $item['fileId'])); ?>' alt=''>"
                        data-agence="<?php echo $item['agence']; ?>"
					
							>
						<i class="icon-eye-open bigger-120"></i></a>									
					<a class="btn btn-small btn-warning and_delete my-tooltip" data-toggle="tooltip" data-placement="bottom" href="#" title="Supprimer"><i class="icon-trash bigger-120"></i></a>
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