"use strict";
jQuery(document).ready(function ($) {

    function showOntimeMsg() {
        $("#ontimeMsg").show().delay(1500).fadeOut();
    }

    function showLateMsg() {
        $("#lateMsg").show().delay(1500).fadeOut();
    }

    function showErrorMsg() {
        $("#errorMsg").show().delay(1500).fadeOut();
    }

    function showValidationMsg(msg) {
        $("#vldnMsgTxt").html(msg);
        $("#vldnMsg").show().delay(1500).fadeOut();
    }



    function markTime() {
        var emp = $("#empname").val().trim();

        if (emp != "") {
            $.post($("#basePath").val() + "/api/tracktime.php", {empname: emp}, function (result) {
                var obj = JSON.parse(result);
                if (obj.msg == "ontime") {
                    showOntimeMsg();
                } else if (obj.msg == "late") {
                    showLateMsg();
                } else {
                    showErrorMsg();
                }
            });
        }

        var emp = $("#empname").val("");
    }


    function saveEmp(empname, empid, designation) {
        $.post($("#basePath").val() + "/api/saveemp.php", {empname: empname, empid: empid, designation: designation}, function (result) {
            var obj = JSON.parse(result);
            if (obj.msg == "saved") {
                window.location.href = $("#basePath").val();
            } else {
                showErrorMsg();
            }
        });
    }

    function doLogin() {

        var loginuser = $("#loginuser").val().trim();
        var loginpassword = $("#loginpassword").val().trim();

        $.post($("#basePath").val() + "/api/login.php", {loginuser: loginuser, loginpassword: $.md5($.trim(loginpassword))}, function (result) {
            var obj = JSON.parse(result);
            if (obj.msg == "saved") {
                window.location.href = $("#basePath").val() + "/dashboard";
            } else {
                showErrorMsg();
            }
        });
    }

    function loadDashboard() {
        $.post($("#basePath").val() + "/api/dashboard.php", {}, function (result) {
            var obj = JSON.parse(result);
            $("#dasLteCnt").html(obj.data.late);
            $("#dasTotCnt").html(obj.data.total);
            drawDashDetails(obj.list);
        });
    }

    function loadEmpList() {
        $.post($("#basePath").val() + "/api/emplist.php", {}, function (result) {
            var obj = JSON.parse(result);
            drawEmpListDetails(obj.list);
        });
    }

    function deleteEmp(id) {
        $.post($("#basePath").val() + "/api/empdelete.php", {empid: id}, function (result) {
            window.location.href = $("#basePath").val() + "/emplist";
        });
    }

    function drawEmpListDetails(list) {

        var str = "";
        var lnk = "";
        var emp = "";
        $.each(list, function (index, value) {
            lnk = "<span class='empDlt' emp_id='" + value.id + "'>Delete</span>";
            emp = "<span class='empLtCntData' emp_id='" + value.id + "'>" + value.empname + "</span>";
            str += "<tr><td>" + value.empid + "</td><td>" + emp + "</td><td style='text-align:center;'>" + lnk + "</td></tr>"
        });

        $("#empListData").html(str);
        drawPagination();
    }




    function drawDashDetails(list) {
        var str = "";
        var clr = "";
        $.each(list, function (index, value) {

            if (value.is_late == 1) {
                clr = "style='color:#e05656'";
            } else {
                clr = '';
            }

            str += "<tr " + clr + "><td>" + value.empid + "</td><td>" + value.empname + "</td><td style='text-align:center;'>" + value.date + "</td><td style='text-align:center;'>" + value.intime + "</td></tr>"
        });

        $("#dashDetailData").html(str);
        drawPagination();
    }


    function drawPagination() {
        var totalRows = $('#tblData').find('tbody tr:has(td)').length;
        var recordPerPage = 5;
        var totalPages = Math.ceil(totalRows / recordPerPage);
        var $pages = $('<div id="pages"></div>');
        for (i = 0; i < totalPages; i++) {
            $('<span class="pageNumber">' + (i + 1) + '</span>').appendTo($pages);
        }
        $pages.appendTo('#tblData');

        $('.pageNumber').hover(
                function () {
                    $(this).addClass('focus');
                },
                function () {
                    $(this).removeClass('focus');
                }
        );

        $('table').find('tbody tr:has(td)').hide();
        var tr = $('table tbody tr:has(td)');
        for (var i = 0; i <= recordPerPage - 1; i++) {
            $(tr[i]).show();
        }
        $('span').click(function (event) {

            $('span').removeClass('clickedPageNo');
            $(this).addClass('clickedPageNo');


            $('#tblData').find('tbody tr:has(td)').hide();
            var nBegin = ($(this).text() - 1) * recordPerPage;
            var nEnd = $(this).text() * recordPerPage - 1;
            for (var i = nBegin; i <= nEnd; i++) {
                $(tr[i]).show();
            }
        });
    }


    $("#empname").keypress(function (e) {
        if (e.which == 13) {
            markTime();
        }
    });

    $("#loginpassword").keypress(function (e) {
        if (e.which == 13) {
            doLogin();
        }
    });

    $(document).on("click", "#btnRegister", function (e) {

        var empname = $("#username").val().trim();
        var empid = $("#empid").val().trim();
        var designation = $("#designation").val().trim();

        var wordCount = empname.split(' ');

        if (/^[a-zA-Z0-9- ]*$/.test(empname) == false) {
            showValidationMsg("Only alphanumric characters allowed in name!");
        } else if (wordCount.length > 1) {
            showValidationMsg("Only one word allowed in name!");
        } else if (wordCount.length == 1 && empname != "" && empid != "") {
            saveEmp(empname, empid, designation)
        } else {
            showValidationMsg("Invalid Parameters!");
        }

    });


    $(document).on("click", "#btnLogin", function (e) {

        if (loginuser != "" && loginpassword != "") {
            doLogin();
        } else {
            showValidationMsg("Invalid Parameters!");
        }

    });

    $(document).on("click", ".empDlt", function (e) {
        deleteEmp($(this).attr("emp_id"));
    });

    $(document).on("click", ".empLtCntData", function (e) {
        window.location.href = $("#basePath").val() + "/emplatecount/" + $(this).attr("emp_id");
    });

    if ($("#isDashboardPage").length) {
        loadDashboard();
    }

    if ($("#isEmpListPage").length) {
        loadEmpList();
    }

    if ($("#isEmpCountPage").length) {
        loadEmpLateCountList($("#isEmpCountPage").val());
    }

    function loadEmpLateCountList(id) {
        $.post($("#basePath").val() + "/api/emplatecount.php", {id: id}, function (result) {
            var obj = JSON.parse(result);

            $("#emplateCountttl").html(obj.data.empname + "'s Late Count Details");
            $("#emptotLateCount").html(obj.data.latecnt);
            $("#empAvgTime").html(obj.data.avgtime);
        });
    }

    if ($("#empLateCountListData").length) {
        empLateCountListData();
    }

    function empLateCountListData() {
        $.post($("#basePath").val() + "/api/latecountreport.php", {}, function (result) {
            var obj = JSON.parse(result);
            drawempLateCountListData(obj.list);
        });
    }

    function drawempLateCountListData(list) {

        var str = "";
        $.each(list, function (index, value) {
            str += "<tr><td>" + value.empid + "</td><td>" + value.empname + "</td><td style='text-align:center;'>" + value.latecount + "</td><td style='text-align:center;'>" + value.avgtime + "</td></tr>"
        });

        $("#empLateCountListData").html(str);
        drawPagination();
    }


});



