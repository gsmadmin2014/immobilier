<?php   
        $url = parse_url(isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:"");
        parse_str(isset($url['query'])?$url['query']:"", $params); 
        $thetype=isset($params["type_immo"])?$params["type_immo"]:0;
        $theNbChambre=isset($params["nb_rooms"])?$params["nb_rooms"]:0;
        $sale=isset($params["inputSale"])&&$params["inputSale"]="on"?true:false;
        $rent=isset($params["inputRent"])&&$params["inputRent"]="on"?true:false;
        $priceFrom=isset($params['inputPriceFrom'])&&$params['inputPriceFrom']>0?$params['inputPriceFrom']:0;
        $priceTo=isset($params['inputPriceTo'])&&$params['inputPriceTo']>0?$params['inputPriceTo']:0;
?>

<h2>Property filter</h2>
<div class="property-filter widget">
    <div class="content">
        <form method="get" action="<?php echo site_url("page/listing-grid-filter") ?>">
                                <div class="location control-group">
                                    <label class="control-label" for="inputLocation">
                                        Location
                                    </label>
                                    <div class="controls">
                                        <select name="location" id="inputLocation">
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
                                            <?php  if(isset($type) && count($type)>0){
                                                
                                                foreach($type as $item){
                                                ?>
                                            <option  value="<?php echo $item->getId(); ?>" id="<?php echo $item->getId(); ?>" <?php if($thetype==$item->getId()){echo "selected";} ?>><?php echo $item->getLibelle(); ?></option>
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
                                        <option <?php if($theNbChambre==$i){echo "selected";} ?>  value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                            
                                        </select>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                


                                <div class="rent control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputRent">
                                            <input  <?php if($rent){echo "checked";} ?> type="checkbox" name="inputRent" id="inputRent"> Rent
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="sale control-group">
                                    <div class="controls">
                                        <label class="checkbox" for="inputSale">
                                            <input <?php if($sale){echo "checked";} ?> type="checkbox" name="inputSale" id="inputSale"> Sale
                                        </label>
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-from control-group">
                                    <label class="control-label" for="inputPriceFrom">
                                        Price from
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceFrom" value="<?php echo $priceFrom; ?>" name="inputPriceFrom">
                                    </div><!-- /.controls -->
                                </div><!-- /.control-group -->

                                <div class="price-to control-group">
                                    <label class="control-label" for="inputPriceTo">
                                        Price to
                                    </label>
                                    <div class="controls">
                                        <input type="text" id="inputPriceTo" value="<?php echo $priceTo; ?>" name="inputPriceTo">
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
