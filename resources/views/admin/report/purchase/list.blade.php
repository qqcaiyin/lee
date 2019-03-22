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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 报表 <span class="c-gray en">&gt;</span>采购报表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container" >

	<div class="cl pd-5  ">
		<span style="float: left; line-height: 30px;">查询条件</span>
		<div class="search-box"  style="float: left; position: relative; ">
			<div class="search"  style="float: left; width:100%;position:relative; z-index:100;  " >
					<input  class="ser" style=" width:150px; height:30px;line-height: 30px;background-color: #fff;text-align: center; border:1px solid #ddd; "   disabled="disabled" value="请选择查询条件"  >
					<button type="submit" class="btn btn-default radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> </button>
			</div>
			<div class="test  "style="display: none;"    >
				<div>
					日期范围：
					<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
					-
					<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
				</div>
				<div style="margin-top: 10px;">
					供货商：


				</div>
				<div style="margin-top: 10px;">
					商品：

				</div>
				<span class="r">
					<a href="javascript:;"  class="btn  btn-default"> 重置</a>
					<a href="javascript:;" class="btn btn-primary  "> 确定</a>

				</span>
			</div>

		</div>


		<span class="r">
		<a href="javascript:;" class="btn btn-primary  "> 打印</a>
			<a href="javascript:;"  class="btn  btn-default"> 导出</a>
		</span>
	</div>

	<div class="mt-20" style="background-color: #fff; padding: 20px; border:1px solid #aaa; box-shadow: 5px 5px 0 #D3D4D3; text-align: center;">

		<div>
			<p style="font-size: 24px; color: #0d0d0d; font-family: 'Microsoft Yahei'; ">商品采购明细表</p>
		</div>
	<table class="table1   ">
		<thead>
			<tr class="text-c">
				<th width="12%">采购日期</th>
				<th width="15%">采购单据号</th>
				<th width="5%">业务类型</th>
				<th width="15%">供应商</th>
				<th width="">商品名称</th>
				<th width="3%">单位</th>
				<th width="8%">数量</th>
				<th width="8%">价格</th>
				<th width="10">采购资金</th>

			</tr>
		</thead>
		<tbody>
			<tr class="text-c tr-b">
				<td>2014-6-11 11:11:42</td>
				<td>CG201903191304399</td>
				<td>购货</td>
				<td>供应商供应商</td>
				<td>商品名称商品名称</td>
				<td >台</td>
				<td>1111211</td>
				<td>123211</td>
				<td >544211.11</td>

			</tr>
			<tr class="text-c tr-b">
				<td>2014-6-11 11:11:42</td>
				<td>CG201903191304399</td>
				<td>购货</td>
				<td>供应商供应商</td>
				<td>商品名称商品名称</td>
				<td >台</td>
				<td>1111211</td>
				<td>123211</td>
				<td >544211.11</td>

			</tr>
			<tr class="text-c tr-b tr-h">

				<td  class="text-r pr-5" colspan="6" >合计:</td>
				<td>1111211</td>
				<td>123211</td>
				<td >544211.11</td>

			</tr>
		</tbody>
	</table>
	</div>
</div>
@endsection


@section('my-js')
	<script type="text/javascript">
		$('.search').mouseover(function () {
            $('.ser').css('border-bottom','1px solid #fff');
			$('.test').show();

        })




	</script>
@endsection

