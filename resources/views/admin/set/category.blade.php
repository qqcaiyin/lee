@extends('admin.master')
<style>
.table1{
border:1px solid #ddd;
text-align: center;

}
.table1 .erp-th td {
font-weight: bolder;
background-color: #f5f5f5;
}

.table1 tr td{
height:40px;
border:1px solid #ddd;
}

.erp-input{
padding: 2px;
border:none;
width:90%;
height:100%;
}

.erp-input1{
padding: 1px;
border:none;
text-align: right;
width:90%;
height:100%;
}
.erp-input1:focus {
outline:1px solid #007cc3;
}
.input2{
border: none;
border-bottom: 1px solid #aaa;
}
.input2:focus{
border-bottom: 1px solid #007cc3;
}

.input-disabled{
width: 100%;
background-color: #fff;
border:0px;
text-align: right;
}

.current{
border:1px solid #007cc3;
}
.inp{
width:100%;
height:100%;
}
.hj{
text-align: right;
}


</style>
@section('content')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 设置 <span class="c-gray en">&gt;</span> 供应商类别 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container"  style="min-width: 900px;">

	<div class="cl pd-5  bk-gray ">
		<span class="l">
			<span style="font-weight: bolder;">类别</span>
			<sapn id="1"  class="btn btn-default radius" onclick="tabC(1);"  > 客户</sapn>
			<sapn id="2"  class="btn btn-default radius" onclick="tabC(2);"> 供应商</sapn>
			<sapn id="3" class="btn btn-default radius" onclick="tabC(3);"> 商品</sapn>
			<input type="hidden" id="tab-selected" value="{{$id}}">
				<input type="text" id="keywords" class="input-text" style="width:200px" placeholder="输入类别查询" id="" name="">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
		</span>
		<div class="text-c" style="float: right;">
			<a href="javascript:;"  id="add-sup" onclick="supplierBox()"  class="btn btn-primary radius "><i class="Hui-iconfont">&#xe600;</i> 添加</a>

		</div>
	</div>
	<div class="mt-20" style="background-color: #fff;">
		<div  id="tab1" class="category-tab"  >
			<table class="table table-border table-bordered table-hover  table-sort">
				<thead>
				<tr class="text-c">
					<th width="5%"><input type="checkbox" name="" value=""></th>
					<th width="10%">编号</th>
					<th width="">类别</th>

					<th width="5%">操作</th>
				</tr>
				</thead>
				<tbody>
				<tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td>CG201903</td>
					<td>购货</td>

					<td class="td-manage">
						<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>

				</tbody>
			</table>
		</div>
		<div  id="tab2" class="category-tab"  >
			<table class="table table-border table-bordered table-hover  table-sort">
				<thead>
				<tr class="text-c">
					<th width="5%"><input type="checkbox" name="" value=""></th>
					<th width="10%">编号</th>
					<th width="">类别</th>

					<th width="5%">操作</th>
				</tr>
				</thead>
				<tbody>
				<tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td>CG201903</td>
					<td>购货</td>

					<td class="td-manage">
						<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>

				</tbody>
			</table>
		</div>
		<div  id="tab3" class="category-tab"  >
			<table class="table table-border table-bordered table-hover  table-sort">
				<thead>
				<tr class="text-c">
					<th width="5%"><input type="checkbox" name="" value=""></th>
					<th width="10%">编号</th>
					<th width="">类别</th>

					<th width="5%">操作</th>
				</tr>
				</thead>
				<tbody>
				<tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td>CG201903</td>
					<td>购货</td>

					<td class="td-manage">
						<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>

				</tbody>
			</table>
		</div>
	</div>


	<div class="add-supplier"   id="add-supplier"  >

		<h4 style=" background-color:#acda65; color:#fff;  border-bottom:1px solid #bfbfbf;  margin-top: 0px; height:40px; line-height: 40px;  font-weight: bolder; padding-left: 20px;">
			添加客户
		</h4>
	</div>

	<div   id="add-type-box"   style="position: absolute; top:100px;left:350px; width:350px; height:200px;  background-color: #fff; border:1px solid #aaa; box-shadow: 5px 5px 0 #D3D4D3;z-index: 99;  display:none;"   >
		<div style="width:100%; height:35px; background-color:#acda65; text-align: center; line-height: 35px; color: #fff;">
			<span >新增类别</span>
		</div>
		<div style="width:100%; margin-top: 20px;margin-bottom: 20px;">
			<label class="add-title">客户类别 : </label>
			<input type="text"  style="border:1px solid #ddd;  width: 70%; height: 35px;">
		</div>
		<div class="r" style="margin-right: 20px;">
			<button class="btn btn-success  "   >保存 </button>
			<button class="btn btn-default  "  data-id="add-type-box" onclick="tclose(this)"  >关闭 </button>
		</div>
	</div>

</div>
<div id="fullbg" style=" position: absolute; top:0px; left:0px; z-index: 95;opacity: 0.6; background-color: #e0e0e0;"></div>


@endsection


@section('my-js')
	<script type="text/javascript">
		window.onload=function(){
		   var a = $('#tab-selected').val();
            tabC(a);
		}

		//选项卡tab
		function tabC(t){
		    var tv= parseInt($.trim(t));
		    if(tv == 1){
		        $('.add-title').html('客户类别');
			}else if(tv == 2){
                $('.add-title').html('供应商类别');
            }else if(tv == 3){
                $('.add-title').html('商品类别');
            }else{
		        return ;
			}



            $('#'+tv).siblings().removeClass('active');
            $('#'+tv).addClass('active');
		   var tab= $('#'+tv).attr('id');

		   $("#tab"+tab).siblings().hide();
            $("#tab"+tab).show();

		}

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




	</script>
@endsection

