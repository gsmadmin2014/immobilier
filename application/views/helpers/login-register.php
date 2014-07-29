<div class="login-register">
    <div class="row">
        <div class="span4">
            <ul class="tabs nav nav-tabs">
                <li class="<?php if (isset($isLogin) && $isLogin) echo "active";?>"><a href="#login">Login</a></li>
                <li class="<?php if (isset($isRegister) && $isRegister) echo "active"?>"><a href="#register">Register</a></li>
            </ul>
            <!-- /.nav -->
			<div class="tab-content">
		            <div class="tab-pane <?php if (isset($isLogin)) echo "active";?>" id="login">
			            <form method="post" action="<?php echo site_url('user/login'); ?>">
			            <?php if (isset($isLogin)) {?>
			            <?php echo validation_errors(); ?>
			            <?php if (isset($error)) {?>
			                <div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                    <?php echo $error; ?>
			                </div>
			            <?php } ?>
			            <?php } ?>
			                <div class="control-group">
			                    <label class="control-label" for="inputLoginLogin">
			                        Login
			                        <span class="form-required" title="This field is required.">*</span>
			                    </label>
			
			                    <div class="controls">
			                        <input type="text" id="inputLoginLogin" name="login-username">
			                    </div>
			                    <!-- /.controls -->
			                </div>
			                <!-- /.control-group -->
			
			                <div class="control-group">
			                    <label class="control-label" for="inputLoginPassword">
			                        Password
			                        <span class="form-required" title="This field is required.">*</span>
			                    </label>
			
			                    <div class="controls">
			                        <input type="password" id="inputLoginPassword" name="login-password">
			                    </div>
			                    <!-- /.controls -->
			                </div>
			                <!-- /.control-group -->
							<div class="control-group">
								<label class="ckb_label"><input type="checkbox" name="remember_me" value="1"/> Remember me</label>
							</div>
			                <div class="form-actions">
			                    <input type="submit" value="Login" class="btn btn-primary arrow-right">
			                </div>
			                <!-- /.form-actions -->
			            </form>
		        </div>
		        <!-- /.tab-pane -->

                <div class="tab-pane <?php if (isset($isRegister)) echo "active"?>" id="register">
                    <form method="post" action="<?php echo site_url('user/register'); ?>">
                    	<?php if (isset($isRegister)) {?>
				            <?php echo validation_errors(); ?>
				            <?php if (isset($error)) {?>
				                <div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                    <?php echo $error; ?>
				                </div>
				            <?php } ?>
			            <?php } ?>
                        <div class="control-group">
                            <label class="control-label" for="inputRegisterFirstName">
                                Name
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterFirstName" name="name" value="<?php echo set_value('name'); ?>">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterSurname">
                                Username
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterSurname" name="username" value="<?php echo set_value('username'); ?>">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterEmail">
                                E-mail
                            </label>

                            <div class="controls">
                                <input type="text" id="inputRegisterEmail" name="email" value="<?php echo set_value('email'); ?>">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterPassword">
                                Password
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="password" id="inputRegisterPassword" name="password">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="control-group">
                            <label class="control-label" for="inputRegisterRetype">
                                Retype
                                <span class="form-required" title="This field is required.">*</span>
                            </label>

                            <div class="controls">
                                <input type="password" id="inputRegisterRetype" name="passwordVerify">
                            </div>
                            <!-- /.controls -->
                        </div>
                        <!-- /.control-group -->

                        <div class="form-actions">
                            <input type="submit" value="Register" class="btn btn-primary arrow-right">
                        </div>
                        <!-- /.form-actions -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.span4-->

        <div class="span8">
            <h2 class="page-header">Why to work with us?</h2>

            <div class="images row">
                <div class="item span2">
                    <img src="<?php echo base_url();?>assets/img/icons/circle-dollar.png" alt="">

                    <h3>Cheap services</h3>
                </div>
                <!-- /.item -->
                <div class="item span2">
                    <img src="<?php echo base_url();?>assets/img/icons/circle-search.png" alt="">

                    <h3>Easy to find you</h3>
                </div>
                <!-- /.item -->
                <div class="item span2">
                    <img src="<?php echo base_url();?>assets/img/icons/circle-global.png" alt="">

                    <h3>Act global or local</h3>
                </div>
                <!-- /.item -->
                <div class="item span2">
                    <img src="<?php echo base_url();?>assets/img/icons/circle-package.png" alt="">

                    <h3>All in one package</h3>
                </div>
                <!-- /.item -->
            </div>
            <!-- /.row -->

            <hr class="dotted">

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed ante auctor vel
                gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam
                gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa.
            </p>

            <ul class="unstyled dotted">
                <li>
                                        <span class="inner">
                                            <strong>Lorem ipsum dolor sit amet</strong><br>
                                                Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra
                                                accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate,
                                                arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium
                                                ligula dolor
                                        </span>
                </li>

                <li>
                                        <span class="inner">
                                            <strong>Lorem ipsum dolor sit amet</strong><br>
                                                Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra
                                                accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate,
                                                arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium
                                                ligula dolor
                                        </span>
                </li>

                <li>
                                        <span class="inner">
                                            <strong>Lorem ipsum dolor sit amet</strong><br>
                                                Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra
                                                accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate,
                                                arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium
                                                ligula dolor
                                        </span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.login-register -->