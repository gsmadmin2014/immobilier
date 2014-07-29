<div class="pagination pagination-centered">
    <ul>
        <?php  if(isset($totalpage) && $totalpage>1 && $page>1){ ?>
            <li><a href="<?php echo site_url("admin/immobilier/list?page=".($page-1)) ?>">Previous</a></li>
           
        
        <?php } ?>
        <?php if(isset($totalpage) && $totalpage>1){
            for($i=1;$i<=$totalpage;$i++){
            ?>
                <li class=" <?php if($i==$page){echo "active"; } ?>"><a href="<?php echo site_url("admin/immobilier/list?page=".($i)) ?>"><?php echo $i; ?></a></li>
        <?php 
        }
        } ?>
        <?php if(isset($totalpage) && $totalpage>1){ ?>
        <li><a href="<?php echo site_url("admin/immobilier/list?page=".($page+1)) ?>">next</a></li>
        <li><a href="<?php echo site_url("admin/immobilier/list?page=".($totalpage)) ?>">last</a></li>
        
        <?php } ?>
    </ul>
</div><!-- /.pagination -->