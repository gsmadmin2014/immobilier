<div class="slider-wrapper">
    <div class="slider">
        <div class="slider-inner">
            <div class="row">
                <div class="images span9">
                    <div class='iosSlider'>
                        <div class='slider-content'>
                        <?php  if(isset($immo) && count($immo)>0){
                              foreach($immo as $item){
                                
                            ?>
                             <div class="slide">
                                <img class="" width="870" src="<?php echo $item['default_large_url'];?>" alt="">

                                <div class="slider-info">
                                    <div class="price">
                                        <h2><?php echo number_format($item['prix'], 2, ',', ' ');?> Ar</h2>
                                        <a href="<?php echo site_url('immobilier/detail/'.$item['id']);?>">More</a>
                                    </div><!-- /.price -->
                                    <h2><a href="#"><?php echo $this->gsm_function->resizeLength($item['fokotany']['nom_fokotany'],15); ?></a></h2>
                                    <div class="bathrooms"></div><!-- /.bathrooms -->
                                    <div class="bedrooms"><?php echo $item['nb_chambre']; ?></div><!-- /.bedrooms -->
                                </div><!-- /.slider-info -->
                            </div><!-- /.slide -->
                            <?php 
                                  }
                                  } 
                                  ?>
                           

                            
                        </div><!-- /.slider-content -->
                    </div><!-- .iosSlider -->

                    <ul class="navigation">
                        <li class="active"><a>1</a></li>
                        <li><a>2</a></li>
                        <li><a>3</a></li>
                    </ul><!-- /.navigation-->
                </div><!-- /.images -->
                <div class="span3">
                    <div class="property-filter">
                        <div class="content">
                            <form method="get" action="<?php echo site_url("page/listing-grid-filter") ?>">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Location
                                    </label>
                                    <div class="controls">
                                        <select id="inputLocation">
                                        
                                        <option value="0">Select a location</option>
                                            <?php  if(isset($region) && count($region)>0){
                                                
                                                foreach($region as $item){
                                                ?>
                                            <option  value="<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                            <?php 
                                                }
                                                } ?>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="type control-group">
                                    <label class="control-label" for="inputType">
                                        Type
                                    </label>
                                    <div class="controls">
                                        <select id="inputType" name="type_immo">
                                        <option value="0">Select a type</option>
                                            <?php if(isset($type) && count($type)>0){
                                                foreach($type as $item){
                                                ?>
                                            <option value="<?php echo $item->getId(); ?>" id="<?php echo $item->getId(); ?>"><?php echo $item->getLibelle(); ?></option>
                                            <?php 
                                                }
                                                } ?>
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class=" control-group">
                                    <label class="control-label" for="inputBeds">
                                        Rooms
                                    </label>
                                    <div class="controls">
                                        <select name="nb_rooms" id="inputBeds">
                                        <?php for($i=0;$i<11;$i++){ ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                            
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                


                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputRent">
                                            <input type="checkbox" name="inputRent" id="inputRent"> Rent
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputSale">
                                            <input type="checkbox" name="inputSale" id="inputSale"> Sale
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        Price from
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceFrom" name="inputPriceFrom">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                        Price to
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceTo" name="inputPriceTo">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-value">
                                    <span class="from"></span><!-- /.from -->
                                    -
                                    <span class="to"></span><!-- /.to -->
                                </div><!-- /.price-value -->

                                <div class="price-slider">
                                </div><!-- /.price-slider -->

                                <div class="form-actions">
                                    <input type="submit" value="Filter now!" class="btn btn-primary btn-large">
                                </div><!-- /.form-actions -->
                            </form>
                        </div><!-- /.content -->
                    </div><!-- /.property-filter -->

                </div><!-- /.span3 -->
            </div><!-- /.row -->
        </div><!-- /.slider-inner -->
    </div><!-- /.slider -->
</div><!-- /.slider-wrapper -->
