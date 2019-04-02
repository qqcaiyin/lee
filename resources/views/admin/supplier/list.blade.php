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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 设置 <span class="c-gray en">&gt;</span> 供应商管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container"  style="min-width: 900px;">

	<div class="cl pd-5  bk-gray ">
		<span class="l">
		<a href="javascript:;"  id="add-sup"  class="btn btn-primary radius "><i class="Hui-iconfont">&#xe600;</i> 添加</a>
			<a href="javascript:;"  onclick="purchaseExport();"   class="btn btn-primary radius"><i class="Hui-iconfont">&#xe644;</i> 导出</a>
		</span>
		<div class="text-c" style="float: right;">
			<input type="text" id="keywords" class="input-text" style="width:250px" placeholder="电话、供应商、人名" id="" name="">
			<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
		</div>
	</div>
	<div class="mt-20" style="background-color: #fff;">
	<table class="table table-border table-bordered table-hover  table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="10%">供应商编号</th>
				<th width="8%">类别</th>
				<th width="">供应商名称</th>
				<th width="8%">联系人</th>
				<th width="10%">手机</th>
				<th width="10%">座机</th>
				<th width="10%">QQ</th>
				<th width="8%">email</th>
				<th width="5%">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>CG201903</td>
				<td>购货</td>
				<td>0002 深圳天</td>
				<td>厉害</td>
				<td>22.80</td>
				<td class="text-l">0516-85761688</td>
				<td>530667695</td>
				<td>lee</td>

				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>

		</tbody>
	</table>
	</div>


	<div class="add-supplier"   id="add-supplier"  >

		<h4 style=" background-color:#acda65; color:#fff;  border-bottom:1px solid #bfbfbf;  margin-top: 0px; height:40px; line-height: 40px;  font-weight: bolder; padding-left: 20px;">
			添加供应商
		</h4>
		<div style="padding-left:50px;">
			<p>
				<label>供应商名称：</label>
				<input type="text" id="moble"  autocomplete="off"    style="width:300px; height:30px; border:1px solid #ddd;" >
			</p>
			<div style=" display:inline-block;  " >
				<div style="float: left;">供应商类别：</div>
				<div  id="test"  style=" float:left; position:relative; ">
					<div    style=" float: left;border:1px solid #ddd; width:200px; padding: 1px;" >
						<input type="text" id="input-type"   autocomplete="off"    style="width:170px; height:30px; border:none;"  onkeyup="supplierBox()  " >
						<i id="SupplierType"  class="Hui-iconfont" onclick="supplierBox()">&#xe6d5;</i>
					</div>
					<div  class="type-box"  style=" float: left;position:absolute;top:30px;left:0px;  overflow-y: auto;  width:202px; max-height: 200px; border:1px solid #bbb;  background-color: #fff; z-index: 90;  display: none;">
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>
						<p style="border-bottom: 1px dashed #eee; height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px; " >元器件</p>

						<p id="addSupplierType"   style="background-color: #D3D4D3;  height:30px; line-height: 30px; margin-bottom: 0; margin-top: 0px;">+添加类型</p>
					</div>
				</div>


			</div>
			<div style="width:90%; margin-bottom:10px; margin-top: 10px; ">

				<table class=" table1 " >
					<thead>
					<tr class="erp-th" >
						<td width="5%"></td>
						<td width="10%">联系人</td>
						<td width="15%">手机</td>
						<td width="15%">座机</td>
						<td width="15%">QQ</td>
						<td width="20%">Email</td>
						<td width="5%">首要联系人</td>
					</tr>
					</thead>
					<tbody class="tbody">
					@for($i = 1; $i < 4 ; $i++)
						<tr class="tr1 trow newrow" >
							<td style="background-color: #f5f5f5;"     ><span class="erp-sort">{{$i}}</span></td>
							<td>
								<div  class="inp">
									<input class="erp-input"  name="pdtname[]"      autocomplete="off" >
									<label style=" width:10%; display:none;" onclick="suppliers('','/suppliers-box','900','580')">...</label>
								</div>
							</td>

							<td><input class="erp-input1"  name="unit[]" 		autocomplete="off" ></td>
							<td><input class="erp-input1"  name="num[]"  	  oninput ="onlyNum(this)"    autocomplete="off" ></td>
							<td><input class="erp-input1"  name="discount[]"  	  oninput ="onlyAmount(this,1)"	autocomplete="off"></td>
							<td><input class="erp-input1"  name="salemoney[]"  oninput ="onlyAmount(this,1)" autocomplete="off"></td>
							<td><span class="label label-success radius">是</span></td>
						</tr>
					@endfor
					</tbody>

				</table>
				<p style="font-size: 8px; color: darkred;">(*至少填写一个联系人)</p>
			</div>
			<p>
				<textarea type="text" id="district"   placeholder="添加备注"    style=" width:90%; max-width:90%;    max-height:50px; border:1px solid #ddd;" ></textarea>
			</p>
			<button class="btn btn-success  "   >保存 </button>
			<button class="btn btn-default  "  data-id="add-supplier"  onclick="tclose(this)"  >关闭 </button>

		</div>
	</div>

	<div   id="add-type-box"   style="position: absolute; top:100px;left:350px; width:350px; height:200px;  background-color: #fff; border:1px solid #aaa; box-shadow: 5px 5px 0 #D3D4D3;z-index: 99;  display:none;"   >
		<div style="width:100%; height:35px; background-color:#acda65; text-align: center; line-height: 35px; color: #fff;">
			新增类别
		</div>
		<div style="width:100%; margin-top: 20px;margin-bottom: 20px;">
			<label>供应商类别 : </label>
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

        //添加供应商界面
        $("#add-sup").click(function() {
            $(".add-supplier").slideDown(200);
        });

        //下拉列表
        function supplierBox(){
            $(".type-box").toggle();
		}

		//点击其他位置时隐藏下拉菜单
        $('.add-supplier').bind('click', function(e) {
            var e = e || window.event; //浏览器兼容性
            var elem = e.target || e.srcElement;
            while (elem) { //循环判断至跟节点，防止点击的是div子元素
                if (elem.id && elem.id == 'test') {
                    return;
                }
                elem = elem.parentNode;
            }
            $('.type-box').css('display', 'none'); //点击的不是div或其子元素
			$('#input-type').val('');
        });


        //显示添加供应商类别界面
        $("#addSupplierType").click(function() {
            $("#add-type-box").show();
            showBg();
        });


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



        function purchaseExport(){
         var starttime = $('#datemin').val(),
			 endtime = $('#datemax').val(),
			 keywords =  $('#keywords').val();

         $.get('/excel/export',{starttime:starttime,endtime:endtime,keywords:keywords},function(res){
             if(res.status ==0){
                 layer.msg('正在导出', {time:2000});
                 window.location.href = res.url;
             }else{
                 layer.msg(res.msg, {time:2000});
                 return;
			 }

         },'json');
	 }

	</script>
@endsection

