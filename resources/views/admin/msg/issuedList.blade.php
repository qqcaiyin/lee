@extends('admin.master')
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

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe63b;</i> 发布 <span class="c-gray en">/</span>消息记录 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

	<div class="page-container"  style="" >
		<div style="border:1px solid #ddd; background-color: #fff; border-radius: 6px; padding: 20px;">
			<div class="cl pd-5  ">

				<div class="search-box"  style="float: left; position: relative; ">
					<div class="search"  style="float: left; width:100%;position:relative; z-index:100;  " >
						<input  class="ser" style=" width:150px; height:30px;line-height: 30px;background-color: #fff;text-align: center; border:1px solid #ccc;  border-radius: 4px;"   disabled="disabled" value="请选择查询条件"  >
						<button type="submit" class="btn btn-default radius size-S" id="" name=""><i class="Hui-iconfont">&#xe665;</i> </button>
					</div>
					<div class="test  "style="display: none;"    >
						<div>
							日期范围：
							<input type="text"  class="input-text datetimepicker-input Wdate  "   value=""  autocomplete="off" id="datetimepicker-demo-1" name="starttime">
							-
							<input type="text"  class="input-text datetimepicker-input Wdate  "   value=""  autocomplete="off" id="datetimepicker-demo-2" name="endtime">
						</div>
						<div style="margin-top: 10px;">
							账号：
							<input type="text" placeholder="默认尺寸" class="input-text radius size-M">
						</div>

						<div style="margin-top: 10px;">
							角色：
							<span class="select-box">
							  <select class="select" size="1" name="demo1">
								<option value="" selected>全部角色</option>
								<option value="1">管理员</option>
								<option value="2">员工</option>
								<option value="3">财务</option>
							  </select>
							</span>
						</div>
						<span class="r">
						<div style="margin-top: 10px;">
							<a href="javascript:;"  class="btn  btn-default radius"> 重置</a>
					<a href="javascript:;" class="btn btn-primary  radius "> 确定</a>
						</div>


				</span>
					</div>

				</div>
				<span class="r">
				<a href="javascript:;" class="btn btn-primary radius  "  onclick="add_admin()"> 添加</a>
			</span>
			</div>

			<div class="mt-20" style="background-color: #fff; ">
				{!! $msgs[2]['content'] !!}
				<table class="table table-border table-bordered table-hover  table-sort">
					<thead>
					<tr class="text-c">
						<th width="50">编号</th>
						<th width="100" class="text-l">用户名称</th>
						<th width="">角色</th>
						<th width="140">最后登录时间</th>
						<th width="120">最后登录ip</th>
						<th width="80" >状态</th>
						<th width="80">操作</th>
					</tr>
					</thead>
					<tbody>
					<tr class="text-c">
						<td >11</td>
						<td class="text-l">lee</td>
						<td>lee</td>
						<td>2019-4-12 12:12:12</td>
						<td>127.0.0.1</td>
						<td class="tt">
							<span style="color: #CD4A4A;cursor: pointer;"    onclick="isEnable(this,1)" ><i class=" ff Hui-iconfont">&#xe6a6;</i>  </span>
							<span style="color: #0BB20C;cursor: pointer;"  onclick="isEnable(this,1)"><i class=" ff Hui-iconfont">&#xe6a7;</i>   </span>
						</td>
						<td class="td-manage">
							<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe715;</i></a>
							<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>

					</tbody>
				</table>
			</div>
		</div>

	</div>

	<div class="page-container"  style="
										display:flex;
										position: absolute;
										top:100px;
										flex-direction: row;
										justify-content:space-around;
   ">


		<div id="add-type-box" class="admin-add-box">
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>用户名：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text"  name="name"  id="website-title" placeholder="输入角色名称" value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>密码：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="password"  name="name"  id="website-title" placeholder="输入密码" value="" autocomplete="off"class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>确认密码：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="password"  name="name"  id="website-title" placeholder="确认密码" value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					状态：
				</label>
				<div class="formControls col-xs-8 col-sm-9  skin-minimal">
					<div class="radio-box">
						<input type="radio"  id="radio-1" name="demo-radio1">
						<label for="radio-1" >开启</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="radio-2" name="demo-radio1" checked>
						<label for="radio-2">禁用</label>
					</div>
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>角色：
				</label>
				<div class="formControls col-xs-8 col-sm-9 skin-minimal" style="display: flex;
				flex-direction:row;
				flex-wrap: wrap;
					">
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">管理员</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">运营</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">客服</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">管理员</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">运营</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">客服</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">管理员</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">运营</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">客服</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">测试角色</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">运营</label>
					</div>
					<div class="check-box">
						<input type="checkbox" id="checkbox-2" checked>
						<label for="checkbox-2">客服</label>
					</div>
				</div>
			</div>


			<div class="row cl "style="margin-top: 10px;">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button  type="submit" class="btn btn-primary radius size-m" type="submit">&nbsp;&nbsp;添加&nbsp;&nbsp;</button>
					<button  class="btn btn-default radius delete" type="reset"  data-id="add-type-box" onclick="tclose(this)">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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

