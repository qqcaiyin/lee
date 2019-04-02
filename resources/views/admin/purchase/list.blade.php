﻿@extends('admin.master')

@section('content')

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 购货 <span class="c-gray en">&gt;</span> 购货记录 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container"  style="min-width: 900px;">

	<div class="cl pd-5  bk-gray ">
		<span class="l">
		<a href="javascript:;" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加</a>
			<a href="javascript:;"  onclick="purchaseExport();"   class="btn btn-primary radius"><i class="Hui-iconfont">&#xe644;</i> 导出</a>
		</span>
		<div class="text-c" style="float: right;"> 日期范围：
			<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
			-
			<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
			<input type="text" id="keywords" class="input-text" style="width:250px" placeholder="单据号、供应商、备注" id="" name="">
			<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>
		</div>
	</div>
	<div class="mt-20" style="background-color: #fff;">
	<table class="table table-border table-bordered table-hover  table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="15%">单据编号</th>
				<th width="8%">业务类型</th>
				<th width="15%">供应商</th>
				<th width="8%">购货金额</th>
				<th width="8%">折扣后金额</th>
				<th width="8%">已付款金额</th>
				<th width="15%">单据日期</th>
				<th width="8%">制单人</th>
				<th width="">备注</th>
				<th width="5%">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>CG201903191304399</td>
				<td>购货</td>
				<td>0002 深圳天</td>
				<td>13000.00</td>
				<td>22.80</td>
				<td class="text-l">11</td>
				<td>2014-6-11 11:11:42</td>
				<td>lee</td>
				<td class="td-status"></td>
				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>CG201903191304399</td>
				<td>购货</td>
				<td>0002 深圳天</td>
				<td>13000.00</td>
				<td>22.80</td>
				<td class="text-l">11</td>
				<td>2014-6-11 11:11:42</td>
				<td>lee</td>
				<td class="td-status"></td>
				<td class="td-manage">
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
@endsection


@section('my-js')
	<script type="text/javascript">

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

