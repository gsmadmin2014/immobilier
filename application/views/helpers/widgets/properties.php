<div class="widget properties last">
    <div class="title">
        <h2>Latest Properties</h2>
    </div><!-- /.title -->
<?php //var_dump($immo); ?>
    <div class="content">
    <?php  if(isset($immo) && count($immo)>0){
        $theimmo=array_slice($immo,0,4);
        //var_dump($theimmo);
      foreach($theimmo as $item){
        
    ?>
    <div class="property">
            <div class="image">
                <a href="<?php echo site_url('immobilier/detail/'.$item['id']);?>"></a>
                <img src="<?php echo $item['default_small_url'];?>" alt="">
            </div><!-- /.image -->

            <div class="wrapper">
                <div class="title">
                    <h3>
                        <a href="<?php echo site_url('immobilier/detail/'.$item['id']);?>"><?php echo $this->gsm_function->resizeLength($item['fokotany']['nom_fokotany'],15); ?></a>
                    </h3>
                </div><!-- /.title -->
                <div class="location"><?php echo $this->gsm_function->resizeLength($item['fokotany']['commune'],15)."</br>".$this->gsm_function->resizeLength($item['fokotany']['district'],15)?></div><!-- /.location -->
                <div class="price"><?php echo number_format($item['prix'], 2, ',', ' ');?> Ar</div><!-- /.price -->
            </div><!-- /.wrapper -->
        </div><!-- /.property -->
    
    <?php 
              }
              } 
              ?>
        

        <!-- /.property -->
    </div><!-- /.content -->
</div><!-- /.properties -->
