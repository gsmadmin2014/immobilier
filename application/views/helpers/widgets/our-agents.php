<div class="widget our-agents">
    <div class="title">
        <h2>Our Agents</h2>
    </div><!-- /.title -->

    <div class="content">
    <?php if(isset($agent) && count($agent)>0){
        foreach($agent as $item){
        ?>
        <div class="agent">
            <div class="image">
                <img src="<?php echo base_url('assets'.user_relative_image_path('md', $item['fileId'])); ?>" alt="">
            </div><!-- /.image -->
            <div class="name"><?php echo $item['name']; ?></div><!-- /.name -->
            <div class="phone"><?php echo $item['firstPhone']; ?></div><!-- /.phone -->
            <div class="email"><a href="mailto:<?php echo $item['email']; ?>"><?php echo $item['email']; ?></a></div><!-- /.email -->
        </div><!-- /.agent -->
    <?php } } ?>
        
    </div><!-- /.content -->
</div><!-- /.our-agents -->
