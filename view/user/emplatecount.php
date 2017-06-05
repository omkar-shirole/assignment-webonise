<section id="test" class="test bg-grey roomy-100 fix m-top-40">
    <div class="container">
        <div class="row">                        
            <div class="main_test fix">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head_title text-center fix">
                        <h2 class="text-uppercase" id="emplateCountttl">Employee Late Count</h2>
                        <input type="hidden" id="isEmpCountPage" value="<?php echo $_GET['id']; ?>">
                    </div>
                </div>

                <div class="col-md-6 m-top-20">
                    <div class="test_item fix">
                        <div class="item_text">
                            <div class="col-md-12">
                                <h2 class="success-msg" id="emptotLateCount">0</h2>
                                <h4 class="success-msg">Late Count</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 m-top-20">
                    <div class="test_item fix">
                        <div class="item_text">
                            <div class="col-md-12">
                                <h2 class="failure-msg" id="empAvgTime"></h2>
                                <h4 class="failure-msg">Average Time</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
