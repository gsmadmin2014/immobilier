<link rel="stylesheet" href="<?php echo base_url('assets/css/immo-map.css');?>">
<?php require_once 'helpers/map.php'; ?>

<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header">Featured properties</h1>
                <?php require_once 'helpers/properties-grid.php'; ?>
            </div>
            <div class="sidebar span3">
                <?php require_once 'helpers/widgets/our-agents.php'; ?>
                <div class="hidden-tablet">
                    <?php require_once 'helpers/widgets/properties.php'; ?>
                </div>
            </div>
        </div>
        <?php require_once 'helpers/carousel.php'?>
    </div>
</div>

<?php require_once 'helpers/bottom.php'; ?>
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
var properties = <?php echo $properties; ?>;

$(function() {
	if (typeof google !== "undefined") {
		displayAllMaps(basePath, properties); // initialize google map;
	} 
});
-->
</script>