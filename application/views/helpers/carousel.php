<div class="carousel">
    <h2 class="page-header">All properties</h2>

    <div class="content">
        <a class="carousel-prev" href="#">Previous</a>
        <a class="carousel-next" href="#">Next</a>
        <ul>
        <?php  if(isset($immo) && count($immo)>0){
      foreach($immo as $item){
        
        ?>
            <li>
                <div class="image">
                    <a href="<?php echo site_url('immobilier/detail/'.$item['id']);?>"></a>
                    <img src="<?php echo $item['default_small_url'];?>" alt="">
                </div><!-- /.image -->
                <div class="title">
                    <h3><a href="detail.html"><?php echo $this->gsm_function->resizeLength($item['fokotany']['nom_fokotany'],15); ?></a></h3>
                </div><!-- /.title -->
                <div class="location"><?php echo $item['fokotany']['commune']?></div><!-- /.location-->
                <div class="price">€2 300 000</div><!-- .price -->
                <div class="area">
                    <span class="key">Area:</span>
                    <span class="value"><?php echo $item['area']." "; ?>m<sup>2</sup></span>
                </div><!-- /.area -->
                <div class="bathrooms"></div><!-- /.bathrooms -->
                <div class="bedrooms"><div class="inner"><?php echo $item['nb_chambre']; ?></div></div><!-- /.bedrooms -->
            </li>
    <?php 
              }
              } 
              ?>
            
            
        </ul>
    </div><!-- /.content -->
</div><!-- /.carousel -->