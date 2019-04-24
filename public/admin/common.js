

    //显示添加供应商类别界面
    function supplierBox(){
        $("#add-type-box").show();
        showBg();
    }

    //关闭添加供应商界面
    function tclose(t){
        var box = $(t).data('id');
        $("#"+box).hide();
        $("#fullbg,#dialog").hide();
    }

    //显示灰色 jQuery 遮罩层
    function showBg() {
        var bh = $("body").height();
        var bw = $("body").width();
        $("#fullbg").css({
            height: bh,
            width: bw,
            display: "block",
        });
    }
    //关闭灰色 jQuery 遮罩
    function closeBg() {
        $("#fullbg,#dialog").hide();
    }



    //ajax传输
    function huiajax(type , url , data , dataType){
        $.ajax({
            type: type,
            url:url ,
            data:data,
            dataType: dataType,
            success: function(res){
                if(res.code == 200){
                    location.replace(location.href);
                }
                layer.msg(res.message,{time:2000});
            },
            error:function(res) {
                console.log(res.msg);
            },
        });

    }

    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        })});

//关掉查询条件框
    $(document,).bind("click",function(e){
        var target  = $(e.target);
        if(target.closest(".search-box").length == 0){
            $('.ser').css('border-radius','5px 5px 5px 5px ');
            $('.ser').css('border','1px solid #ddd');
            $(".test").hide();
        }
    })

//打开日历表
    $("#datetimepicker-demo-1").datetimepicker({
        language: "zh-cn",
        format: "yyyy-mm-dd",
        minView: "month",
        autoclose: true,
        todayBtn: true
    });
    $("#datetimepicker-demo-2").datetimepicker({
        language: "zh-cn",
        format: "yyyy-mm-dd",
        minView: "month",
        autoclose: true,
        todayBtn: true
    });