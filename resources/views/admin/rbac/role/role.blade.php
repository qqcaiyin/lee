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


	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe62b;</i> 权限管理 <span class="c-gray en">/</span>角色列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

	<div class="page-container" >
		<div style="background-color: #fff;border:1px solid #ddd; border-radius: 5px; padding: 20px;">
			<div class="cl pd-5  ">

			<span class="r">
		    <a href="javascript:;" class="btn btn-primary radius " onclick="window.location.href='/rbac-nodebox'"   > 添加</a>

		</span>
			</div>

			<div class="mt-20" style="background-color: #fff;">
				<table class="table table-border table-bordered table-hover  table-sort">
					<thead>
					<tr class="text-c">
						<th width="70" class="text-l">名称</th>
						<th width="">描述</th>
						<th width="80" >状态</th>
						<th width="80">操作</th>
					</tr>
					</thead>
					<tbody>
					<tr class="text-c">
						<td class="text-l">11</td>
						<td>lee</td>
						<td class="tt">
							<span style="color: #CD4A4A;cursor: pointer;"    onclick="isEnable(this,1)" ><i class=" ff Hui-iconfont">&#xe6a6;</i>  </span>
							<span style="color: #0BB20C;cursor: pointer;"  onclick="isEnable(this,1)"><i class=" ff Hui-iconfont">&#xe6a7;</i>   </span>
						</td>
						<td class="td-manage">
							<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>

					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection


@section('my-js')
	<script type="text/javascript">
        $('.search').mouseover(function () {
            $('.ser').css('border-bottom','1px solid #fff');
            $('.test').show();

        })

        $('.tr-b').click(function () {
            var id = $(this).data('id');
            location.href="/purchase-add";
        });



	</script>
@endsection

