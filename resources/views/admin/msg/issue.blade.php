@extends('admin.master')
<!--引入百度富文本-->
<script type="text/javascript" charset="utf-8" src="{{asset('/admin/lib/ueditor/1.4.3/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('/admin/lib/ueditor/1.4.3/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{asset('/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js')}}"></script>
<style>
	.table1{
		border:1px solid #000;text-align: center;
	}
	.table1 .erp-th td {
		font-weight: bolder;background-color: #f5f5f5;
	}

	.table1 tr td{
		height:30px;border:1px solid #000;
	}
	.table1 tr th{
		height:30px;border:1px solid #000;text-align: center;
		font-weight: bolder;
	}
	.tr-b:hover{
		background-color: #00a2d4;
	}
	.tr-h{
		font-weight: bolder;
	}

	.test{
		 display:block;  position: absolute;top:29px;left:0;width:330px;background-color: #fff;border:1px solid #ddd; border-radius:0px 5px 5px 5px; padding: 10px;z-index: 80;
	}

</style>
@section('content')

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe63b;</i> 发布 <span class="c-gray en">/</span>通知 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>


	<div class="page-container"  style="
										display:flex;
										width: 100%;
										position: absolute;
										top:30px;
										flex-direction: row;
										justify-content:space-around;
   ">

		<div id="add-type-box" class="admin-add-box l-active "  style="width: 90%;">
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>标题
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text"  name="title"  id="title" placeholder="输入标题" value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					发布人
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" readonly="readonly" name="author"  id="author" placeholder="" value="lee" autocomplete="off"class="input-text ">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					消息类别
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					    <span class="select-box" >
			                <select class="select" name="category"  id="category" size="1" >
				                <option value="0">公告</option>

									<option value="">------</option>

                            </select>
                        </span>
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					接收群组
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					    <span class="select-box" >
			                <select class="select" name="listener" id="listener" size="1" >
				                <option value="0">全部人员</option>

									<option value="">------</option>

                            </select>
                        </span>
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>详情内容
				</label>
				<div class="formControls col-xs-8 col-sm-9 gary">
					<textarea name="content" id="content"  style="min-height: 400px; width:100%;"> </textarea>
				</div>
			</div>

			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					状态：
				</label>
				<div class="formControls col-xs-8 col-sm-9  skin-minimal">
					<div class="radio-box">
						<input type="radio"  id="radio-1"  name="tp" value="0">
						<label for="radio-1" >发布</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="radio-2" name="tp" checked  value="3">
						<label for="radio-2">草稿</label>
					</div>
				</div>
			</div>


			<div class="row cl "style="margin-top: 10px;">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button   class="btn btn-primary radius size-m" id="sub" >&nbsp;&nbsp;发布&nbsp;&nbsp;</button>

				</div>
			</div>
		</div>


		<div  class="to-top">
			<i class="Hui-iconfont " style=" font-size: 20px;">&#xe684;</i>
		</div>

	</div>

	<div id="fullbg" style=" position: absolute; top:0px; left:0px; z-index: 95;opacity: 0.6; background-color: #e0e0e0;"></div>
@endsection


@section('my-js')

<script type="text/javascript">
	//实例化百度编辑器
	var ue = UE.getEditor('content');


	//获取发布的消息相关信息

	$('#sub').click(function () {
	    var title = $('#title').val(),
	    	category_id = $("select[name='category'] option:selected").val(),
            listener_id = $("select[name='listener'] option:selected").val(),
			content = UE.getEditor('content').getContent(),
	    	status =$("input[name='tp']:checked").val();

        if(title == '' ||content==''  ){
            layer.msg('内容填写不全',{time:2000});
            return ;
        }
        var url ='/service/msg-issue';
        var data = {
            title:title,
            category_id:category_id,
            listener_id: listener_id,
            content:content,
			status:status,
            _token:"{{csrf_token()}}"
        };
        huiajax('POST',url,data , 'json');

    })


</script>
<script type="text/javascript">
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

		//打开添加界面
		function add_admin(){
            $("#add-type-box").show();
            showBg();
		}


        $('.search').mouseover(function () {
            $('.ser').css('border-bottom','1px solid #fff');
            $('.ser').css('border-radius','5px 5px 0px 0px ');
            $('.test').show();

        })

        $('.tr-b').click(function () {
            var id = $(this).data('id');
            location.href="/purchase-add";
        });

	</script>
@endsection

