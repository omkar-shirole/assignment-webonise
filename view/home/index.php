<section id="test" class="test bg-grey roomy-100 fix m-top-40">
    <div class="container">
        <div class="row">                        
            <div class="main_test fix">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head_title text-center fix">
                        <h2 class="text-uppercase">Welcome</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="test_item fix">

                        <div class="item_text">
                            <div class="col-md-12" id="ontimeMsg" style="display: none;">
                                <img src="<?php echo $basePath; ?>/assets/images/ontime.gif" alt="On Time">
                                <h4 class="success-msg">On Time!</h4>
                            </div>
                            <div class="col-md-12" id="lateMsg" style="display: none;">
                                <img src="<?php echo $basePath; ?>/assets/images/late.gif" alt="Late">
                                <h4 class="failure-msg">Your are late!</h4>
                            </div>
                            <div class="col-md-12" id="errorMsg" style="display: none;">
                                <img src="<?php echo $basePath; ?>/assets/images/error.gif" alt="Late">
                                <h4 class="failure-msg">Invalid User</h4>
                            </div>
                            <div class="col-md-12 m-top-10">
                                <input type="text" class="form-control" name="empname" id="empname" placeholder="Enter your name & press 'Enter'">
                            </div>
                            <div class="col-md-12 m-top-10">
                                <a href='<?php echo $basePath; ?>/register' class="btn btn-primary">New User</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>