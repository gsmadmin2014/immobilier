  <!-- Grid  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin-property.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/select2/css/select2-bootstrap.css');?>">	
    <!-- Grid  -->
<div class="properties-grid">
    <div class="row">
   <?php  if(isset($immo) && count($immo)>0){
      foreach($immo as $item){
        
    ?>
         <div class="property span3">
            <div class="image">
                <div class="content">
                    <a href="<?php echo site_url('admin/detail/'.$item['id']);?>"></a>
                    <img class="imagereduced" src="<?php echo $item['default_url'];?>" height="200px" alt="">
                </div><!-- /.content -->

                <div class="price"><?php echo number_format($item['prix'], 2, ',', ' ');?> Ar</div><!-- /.price -->
                <div class="reduced"><?php echo $item['contrat']['libelle'];?> </div><!-- /.reduced -->
            </div><!-- /.image -->

            <div class="title">
                <h2><a href="<?php echo site_url('admin/detail/'.$item['id']);?>"><?php echo $this->gsm_function->resizeLength($item['fokotany']['nom_fokotany'],15); ?></a></h2>
            </div><!-- /.title -->

            <div class="location"><?php echo $item['fokotany']['commune']?></div><!-- /.location -->
            <div class="area">
                <span class="key">Area:</span><!-- /.key -->
                <span class="value"><?php echo $item['area']." "; ?>m<sup>2</sup></span><!-- /.value -->
            </div><!-- /.area -->
            <div class="bedrooms"><div class="content"><?php echo $item['nb_chambre']; ?></div></div><!-- /.bedrooms -->
            
        </div><!-- /.property -->
      <?php 
              }
              } 
              ?>
        
        
        
    </div><!-- /.row -->
</div><!-- /.properties-grid -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/realia.js"></script>