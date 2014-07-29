<?php   
        $url = parse_url(isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:"");
        parse_str(isset($url['query'])?$url['query']:"", $params); 
        $theorder=isset($params["inputOrder"])?$params["inputOrder"]:0;
        $thesort=isset($params["inputSortBy"])?$params["inputSortBy"]:0;
        ?>
<div class="properties-rows">
<div class="filter">
    <form action="<?php echo site_url("page/listing-grid-filter") ?>" id="filter-sort" method="get" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="inputSortBy">
                Sort by
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <div class="controls">
                <select name="inputSortBy" id="inputSortBy">
                    <option value="2" <?php if($thesort==2){echo "selected";} ?> id="price">Price</option>
                    <option value="1" <?php if($thesort==1){echo "selected";} ?> id="published">Published</option>
                </select>
            </div><!-- /.controls -->
        </div><!-- /.control-group -->

        <div class="control-group">
            <label class="control-label" for="inputOrder">
                Order
                <span class="form-required" title="This field is required.">*</span>
            </label>
            <div class="controls">
                <select name="inputOrder" id="inputOrder">
                    <option value="2" <?php if($theorder==2){echo "selected";} ?> id="asc">ASC</option>
                    <option value="1" <?php if($theorder==1){echo "selected";} ?> id="desc">DESC</option>
                </select>
            </div><!-- /.controls -->
        </div><!-- /.control-group -->
    </form>
</div><!-- /.filter -->
</div><!-- /.properties-rows -->
<script>
$("#inputSortBy,#inputOrder").change(function(){
    $("#filter-sort").submit();
});

</script>