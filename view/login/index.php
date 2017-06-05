<section id="test" class="test bg-grey roomy-100 fix m-top-40">
    <div class="container">
        <div class="row">                        
            <div class="main_test fix">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head_title text-center fix">
                        <h2 class="text-uppercase">LogIn</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="test_item fix">

                        <div class="item_text">
                            <div class="col-md-12" id="errorMsg" style="display: none;">
                                <img src="<?php echo $basePath; ?>/assets/images/error.gif" alt="Late">
                                <h4 class="failure-msg">Invalid Credentials!</h4>
                            </div>
                            <div class="col-md-12 m-top-10">
                                <div class="row m-top-10">
                                    <label class="flt-lft">Username<sup class="mandatory">*</sup></label>
                                    <input type="text" class="form-control" name="loginuser" id="loginuser" placeholder="Username">
                                </div>
                                <div class="row m-top-10">
                                    <label class="flt-lft">Password<sup class="mandatory">*</sup></label>
                                    <input type="password" class="form-control" name="loginpassword" id="loginpassword" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-12 m-top-10">
                                <input type="button" id="btnLogin" class="btn btn-primary" value="Login">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>