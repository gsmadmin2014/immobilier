

<div class="container">
    <div>
        <div id="main">
            <div class="our-agents-large">
    <h2 class="page-header">Our agents</h2>

    <div class="content">
    
    <?php if (isset($agents) && count($agents)) {
								foreach ($agents as $item) {?>
     <div class="agent">
            <div class="row">
                <div class="image span2">
                    <img src="<?php echo base_url('assets'.user_relative_image_path('md', $item['fileId'])); ?>" alt="<?php echo $item['name']; ?>"/>
                </div><!-- /.image -->

                <div class="body span6">
                    <h3><?php echo $item['name']; ?></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor diam in quam molestie ullamcorper. Praesent a tellus massa. Nulla laoreet tempus congue. Praesent ut ultrices nunc. Etiam at libero sed turpis tempor placerat in eget lectus. Curabitur pretium, ante vel aliquam lacinia, ipsum felis hendrerit leo, ut aliquet neque odio at nisl.</p>
                </div><!-- /.body -->

                <div class="info span4">
                    <div class="box">
                        <div class="phone"><?php echo $item['firstPhone']; ?></div>
                        <div class="office"><?php echo $item['secondPhone']; ?></div>
                        <div class="email"><?php echo $item['email']; ?> </div>
                    </div>
                </div><!-- /.info -->
            </div><!-- /.row -->
        </div><!-- /.agent -->                           
    <?php }
			}  ?>                            
       
    </div><!-- /.content -->
</div><!-- /.our-agents -->
        </div>
    </div>
</div>

