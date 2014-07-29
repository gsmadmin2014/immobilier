<div class="row-fluid">
	<h3 class="header smaller lighter blue">List agence</h3>
	
	<table id="sample-table-2" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th style="width: 10px">#</th>
				
				<th>Name</th>
				<th>Adresse</th>
				<th>Description</th>
				<th style="width: 100px">Action</th>
			</tr>
		</thead>

		<tbody>
			<?php if (isset($agence) && count($agence)) {
				foreach ($agence as $item) {?>
			<tr id="row-<?php echo $item['id']; ?>">
				<td><?php echo $item['id']; ?></td>
				<td><a href="#"><?php echo $item['name']; ?></a></td>
				<td><?php echo $item['adresse']; ?></td>
				<td><?php echo $item['desc']; ?></td>							
				<td>
					<a class="btn btn-small btn-danger and_view my-tooltip" 
						data-toggle="tooltip" 
						data-placement="bottom" 
						href="#" 
						title="Detail"
						data-nom="<?php echo $item['name']; ?>"
						data-adresse="<?php echo $item['adresse']; ?>"
						data-desc="<?php echo $item['desc']; ?>"
                        data-id="<?php echo $item['id']; ?>"
					
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
	var oTable1 = $('#sample-table-2').dataTable( {
		"bLengthChange": false,
		"bInfo": false,
		"bProcessing": true,
		"aoColumns": [
        	null,
        	null,
        	null,
            null,
            { "bSearchable": false, "bSortable": false },
    	] 
	} );
	$(document).on('click', '.and_view', function(e) {
		var nom = $(this).data("nom");
		var adresse = $(this).data("adresse");
		var desc = $(this).data("desc");
		var id = $(this).data("id");

		
		var content = "<dl class='dl-horizontal'>";
       
		content += "<dt>Name</dt>";
		content += "<dd>"+nom+"</dd>";
		content += "<dt>Adresse</dt>";
		content += "<dd>"+adresse+"</dd>";
		content += "<dt>Description</dt>";
		content += "<dd>"+desc+"</dd>";
		
        
		content += "</dl>";
		bootbox.dialog({
			message: content,
		  	title: "Detail agence",
		  	buttons: {
		    	success: {
		      		label: "Close",
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