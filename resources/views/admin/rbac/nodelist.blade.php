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
		position: absolute;top:29px;left:0;width:360px;background-color: #fff;border:1px solid #ddd;padding: 10px;z-index: 10;
	}

</style>
@section('content')

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe62b;</i> 权限管理 <span class="c-gray en">/</span>权限节点 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

	<div class="page-container" >
		<div style="background-color: #fff;border:1px solid #ddd; border-radius: 5px; padding: 20px;">
		<div class="cl pd-5  ">

			<span class="">
		    <a href="javascript:;" class="btn btn-primary radius  " onclick="add_admin()"> 添加权限</a>
			<a href="javascript:;"  class="btn btn-primary radius "> 批量删除</a>
			<a href="javascript:;"  class="btn btn-primary radius "> 回收站</a>

		</span>
		</div>

		<div class="mt-20" style="background-color: #fff;">
			<table class="table table-border table-bordered table-hover  table-sort">
				<thead>
				<tr class="text-c">
					<th width="70" ><input  type="checkbox"></th>
					<th width="120" class="text-l">名称</th>
					<th width="" class="text-l">权限码</th>

					<th width="80">操作</th>
				</tr>
				</thead>
				<tbody>
				@foreach($nodes as $v)
				<tr class="text-c">
					<th width="70" ><input  type="checkbox"></th>
					<td class="text-l">{{$v['node_title']}}</td>
					<td class="text-l">
						@if($v['controller'] != '' && $v['action'] != '')
						{{$v['controller']}}@ {{$v['action']}}
						@endif

					</td>
					<td class="td-manage">
						<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="page-container"  style=" display:flex;
	position: absolute;
	top:100px;
	left:10%;
    flex-direction: row;
    justify-content:space-around;
    min-width: 900px;">
		<div id="add-type-box" class="admin-add-box"  style="height:400px;">
			<div class="row cl  "  style="width:100%; margin-top: -10px; padding-left: 20px;  border-bottom:1px solid #ddd;">
				<h3>添加权限节点</h3>
			</div >
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>权限节点名称：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text"  id="node_title" name="node_title"   value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>控制器：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" id="controller" name="controller"    value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>方法：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text"  name="action"  id="action"  value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>url：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text"  name="url"  id="url" value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>排序：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text"  name="sort"  id="sort" value="" autocomplete="off" class="input-text">
				</div>
			</div>
			<div class="row cl  "  style="margin-top: 10px;">
				<label class="form-label col-xs-4 col-sm-2 text-r">
					<span class="c-red">*</span>父节点：
				</label>
				<div class="formControls col-xs-8 col-sm-9">
					<span class="select-box">
					  <select class="select" size="1" name="pid">
						<option value="0" selected>@</option>
						<option value="1">菜单一</option>
						<option value="2">菜单二</option>
						<option value="3">菜单三</option>
					  </select>
					</span>
				</div>
			</div>


			<div class="row cl "style="margin-top: 10px;">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button  type="submit" class="btn btn-primary radius size-m" type="submit" onclick="add_node()" >&nbsp;&nbsp;添加&nbsp;&nbsp;</button>
					<button  class="btn btn-default radius delete" type="reset"  data-id="add-type-box" onclick="tclose(this)">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>

@endsection


@section('my-js')
<script type="text/javascript">

	//显示添加界面
	function add_admin(){
		$("#add-type-box").show();
		showBg();
	}


	//添加  权限节点
	function add_node(){
		var  node_title = $.trim($('#node_title').val()),
			 controller = $.trim($('#controller').val()) ,
             action = $.trim($('#action').val()) ,
             sort = parseInt($.trim($('#sort').val())) ,
			 url = $.trim($('#url').val()) ,
             pid = $('select[name=pid] option:selected').val();

        	 sort = isNaN(sort)? 0: sort;


		var posturl = '/rbac-node-add'
		if(node_title == '' || controller == '' ){
			layer.msg('必选项不能为空',{time:2000});
			return ;
		}
		var data = {
            node_title:node_title,
            controller:controller,
            action:action,
            sort: sort,
            url:url,
            pid:pid,
			_token:"{{csrf_token()}}"
		};
		huiajax('POST',posturl,data , 'json');
	}


</script>
@endsection

