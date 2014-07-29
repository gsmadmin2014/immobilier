<link rel="stylesheet" href="<?php echo base_url('assets/css/immo-map.css');?>">
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header"><?php echo $detimmo['libelle'];?><small>  -  <?php echo $detimmo['fokotany']['nom_fokotany']?></small></h1>

                <div class="carousel property">
                    <div class="preview">
                    	<?php if(isset($detimmo['url_images']) && count($detimmo['url_images'])) {
                    		$url_image = $detimmo['url_images'][0];?>
                        <img src="<?php echo $url_image['url_large'];?>" alt="">
                        <?php } ?>
                    </div><!-- /.preview -->

                    <div class="content">

                        <a class="carousel-prev" href="#">Previous</a>
                        <a class="carousel-next" href="#">Next</a>
                        <ul>
                        <?php if(isset($detimmo['url_images']) && count($detimmo['url_images'])) {
                        	$url_img0 = $detimmo['url_images'][0];
                        	?>
                        	<li class="active">
                                <img src="<?php echo $url_img0['url_large'];?>" alt="">
                            </li>
                            <?php for ($i = 1; $i < count($detimmo['url_images']); $i++) {
                               $url_img = $detimmo['url_images'][$i];
                        	?>
                            <li>
                                <img src="<?php echo $url_img['url_large'];?>" alt="">
                            </li>
                            <?php } 
                            } ?>
                            
                        </ul>
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.carousel -->

                <div class="property-detail">
                    <div class="pull-left overview">
                        <div class="row">
                            <div class="span3">
                                <h2>Overview</h2>

                                <table>
                                    <tr>
                                        <th>Price:</th>
                                        <td><?php echo number_format($detimmo['prix'], 2, ',', ' ');?> Ar</td>
                                    </tr>
                                    <tr>
                                        <th>Contract type:</th>
                                        <td><?php echo $detimmo['contrat']['libelle'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Type:</th>
                                        <td><?php echo $detimmo['type']['libelle'];?></td>
                                    </tr>
                                    <tr>
                                        <th>Location:</th>
                                        <td><?php echo ucwords(strtolower($detimmo['fokotany']['nom_fokotany']))?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Bedrooms:</th>
                                        <td><?php echo $detimmo['nb_chambre']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Area:</th>
                                        <td><?php echo number_format($detimmo['area'], 2, ',', ' ')." "; ?>m<sup>2</sup></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.span2 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <h2>Description</h2>
                    <p><strong><?php echo $detimmo['desc']; ?></strong></p>
                    <div class="clearfix"></div>
                    <h2>General amenities</h2>

                    <div class="row">
                        <ul class="span2">
                        <?php if(isset($detimmo['listamenities']) && count($detimmo['listamenities'])){
                            $listamenities=$detimmo['listamenities'];
                            foreach($listamenities as $item){
                            ?>
                                <li class="checked">
                                <?php echo $item['lib_amn']; ?>
                                </li>
                        <?php } 
                            }
                        ?>
                            
                        </ul>
                        
                    </div>
					<span class="display-map">
	                    <h2>Map</h2>
	
	                    <div id="property-map"></div><!-- /#property-map -->
                    </span>
                    
                </div>

            </div>
            <div class="sidebar span3">
                <?php require_once 'helpers/widgets/our-agents.php'; ?>
                <?php require_once 'helpers/widgets/contact.php'; ?>
                <?php require_once 'helpers/widgets/properties.php'; ?>
            </div>
        </div>
    </div>
</div>
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
<!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/gmap3.infobox.min.js"></script>
<script src="<?php echo base_url('assets/js/immo-map.js');?>"></script>-->

<script type="text/javascript">
<!--
var mapDetail = <?php echo $mapDetail; ?>;

$(function() {
	if (typeof google !== "undefined") {
		displayMap(basePath, mapDetail); // initialize google map;
	} else {
		$('.display-map').addClass('hide');
	}
});
-->
</script>