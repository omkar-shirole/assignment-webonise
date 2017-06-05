<section id="test" class="test bg-grey roomy-100 fix m-top-40">
    <div class="container">
        <div class="row">                        
            <div class="main_test fix">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head_title text-center fix">
                        <h2 class="text-uppercase">Dashboard</h2>
                        <input type="hidden" id="isDashboardPage" value="1">
                    </div>
                </div>

                <div class="col-md-6 m-top-20">
                    <div class="test_item fix">
                        <div class="item_text">
                            <div class="col-md-12">
                                <h2 class="success-msg" id="dasTotCnt">0</h2>
                                <h4 class="success-msg">Total Present Count</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 m-top-20">
                    <div class="test_item fix">
                        <div class="item_text">
                            <div class="col-md-12">
                                <h2 class="failure-msg" id="dasLteCnt">0</h2>
                                <h4 class="failure-msg">Late Count</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 m-top-20">
                    <div class="test_item">
                        <table id="tblData">
                            <thead>
                                <tr>
                                    <th>Employee Id</th>
                                    <th>Employee Name</th>
                                    <th>Date</th>
                                    <th>In Time</th>
                                </tr>
                            </thead>
                            <tbody id="dashDetailData">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
