    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->

<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget properties span3">
                    <div class="title">
                        <h2>Most Recent</h2>
                    </div><!-- /.title -->

                    <div class="content">
                    <?php  if(isset($immo) && count($immo)>0){
                            $theimmo=array_slice($immo,0,3);
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
                        
                    </div><!-- /.content -->
                </div><!-- /.properties-small -->

                <div class="widget span3">
                    <div class="title">
                        <h2>Contact us</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">Address:</th>
                                <td>Ankorondrano <br>Antananarivo, MG 90405<br>Madagascar<br></td>
                            </tr>
                            <tr>
                                <th class="phone">Phone:</th>
                                <td>+261 33 11 932 45</td>
                            </tr>
                            <tr>
                                <th class="email">E-mail:</th>
                                <td><a href="mailto:gsmgroupement@gmail.com">gsmgroupement@gmail.com</a></td>
                            </tr>
                            <tr>
                                <th class="skype">Skype:</th>
                                <td>gsm.group</td>
                            </tr>
                            <tr>
                                <th class="gps">GPS:</th>
                                <td>34.016811<br>-118.469009</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Useful links</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="404.html">404 page</a></li>
                            <li class="leaf"><a href="about-us.html">About us</a></li>
                            <li class="leaf"><a href="contact-us.html">Contact us</a></li>
                            <li class="leaf"><a href="faq.html">FAQ</a></li>
                            <li class="leaf"><a href="grid-system.html">Grid system</a></li>
                            <li class="leaf"><a href="our-agents.html">Our agents</a></li>
                            <li class="last leaf"><a href="typography.html">Typography</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Say hello!</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <form method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputName">
                                    Name
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputName">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">
                                    Email
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>
                                <div class="controls">
                                    <input type="text" id="inputEmail">
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="control-group">
                                <label class="control-label" for="inputMessage">
                                    Message
                                    <span class="form-required" title="This field is required.">*</span>
                                </label>

                                <div class="controls">
                                    <textarea id="inputMessage"></textarea>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->

                            <div class="form-actions">
                                <input type="submit" class="btn btn-primary arrow-right" value="Send">
                            </div><!-- /.form-actions -->
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>© Copyright 2013 by <a href="http://gsm.mada.com">Gsm Mada</a>. All rights reserved.</p>
                </div><!-- /.copyright -->

                <div class="span6 share">
                    <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="http://www.facebook.com" class="facebook">Facebook</a></li>
                            <li class="leaf"><a href="http://flickr.net" class="flickr">Flickr</a></li>
                            <li class="leaf"><a href="http://plus.google.com" class="google">Google+</a></li>
                            <li class="leaf"><a href="http://www.linkedin.com" class="linkedin">LinkedIn</a></li>
                            <li class="leaf"><a href="http://www.twitter.com" class="twitter">Twitter</a></li>
                            <li class="last leaf"><a href="http://www.vimeo.com" class="vimeo">Vimeo</a></li>
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->

<div class="palette">
    <div class="toggle">
        <a href="#">Toggle</a>
    </div><!-- /.toggle -->

    <div class="inner">
        <div class="headers">
            <h2>Header styles</h2>
            <ul>
                <li><a class="header-light">Light</a></li>
                <li><a class="header-normal">Normal</a></li>
                <li><a class="header-dark">Dark</a></li>
            </ul>
        </div><!-- /.headers -->

        <div class="patterns">
            <h2>Background patterns</h2>
            <ul>
                <li><a class="pattern-cloth-alike">cloth-alike</a></li>
                <li><a class="pattern-corrugation">corrugation</a></li>
                <li><a class="pattern-diagonal-noise">diagonal-noise</a></li>
                <li><a class="pattern-dust">dust</a></li>
                <li><a class="pattern-fabric-plaid">fabric-plaid</a></li>
                <li><a class="pattern-farmer">farmer</a></li>
                <li><a class="pattern-grid-noise">grid-noise</a></li>
                <li><a class="pattern-lghtmesh">lghtmesh</a></li>
                <li><a class="pattern-pw-maze-white">pw-maze-white</a></li>
                <li><a class="pattern-none">none</a></li>
            </ul>
        </div>

        <div class="colors">
            <h2>Color variants</h2>
            <ul>
                <li><a href="<?php echo base_url();?>assets/css/realia-red.css" class="red">Red</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-magenta.css" class="magenta">Magenta</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-brown.css" class="brown">Brown</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-orange.css" class="orange">Orange</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-brown-dark.css" class="brown-dark">Brown dark</a></li>

                <li><a href="<?php echo base_url();?>assets/css/realia-gray-red.css" class="gray-red">Gray Red</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-magenta.css" class="gray-magenta">Gray Magenta</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-brown.css" class="gray-brown">Gray Brown</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-orange.css" class="gray-orange">Gray Orange</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-brown-dark.css" class="gray-brown-dark">Gray Brown dark</a></li>

                <li><a href="<?php echo base_url();?>assets/css/realia-green-light.css" class="green-light">Green light</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-green.css" class="green">Green</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-turquiose.css" class="turquiose">Turquiose</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-blue.css" class="blue">Blue</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-violet.css" class="violet">Violet</a></li>

                <li><a href="<?php echo base_url();?>assets/css/realia-gray-green-light.css" class="gray-green-light">Gray Green light</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-green.css" class="gray-green">Gray Green</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-turquiose.css" class="gray-turquiose">Gray Turquiose</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-blue.css" class="gray-blue">Gray Blue</a></li>
                <li><a href="<?php echo base_url();?>assets/css/realia-gray-violet.css" class="gray-violet">Gray Violet</a></li>
            </ul>
        </div><!-- /.colors -->

        <a href="#" class="btn btn-primary reset">Reset default</a>
    </div><!-- /.inner -->
</div><!-- /.palette -->



</body>
</html>