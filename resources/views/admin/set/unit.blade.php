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

	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe62e;</i>设置 <span class="c-gray en">/</span>计量单位 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container"  style="min-width: 900px;">
	<div style="background-color: #fff;border:1px solid #ddd; border-radius: 5px; padding: 20px;">
		<div class="cl pd-5  ">
			<div class="text-c" style="float: right;">
				<a href="javascript:;"  id="add-sup" onclick="supplierBox()"  class="btn btn-primary radius "><i class="Hui-iconfont">&#xe600;</i> 添加</a>
			</div>
		</div>
		<div class="mt-20" style="background-color: #fff;">
			<div  id="tab1" class=""  >
				<table class="table table-border table-bordered table-hover  table-sort">
					<thead>
					<tr class="text-c">

						<th  style="text-align: left;" width="">名称</th>

						<th width="10%">操作</th>
					</tr>
					</thead>
					<tbody>

					@foreach($units as $value)
					<tr class="text-c">

						<td  style="text-align: left;"  >{{$value['desc']}}</td>

						<td class="td-manage">
							<a title="编辑" href="javascript:;" onclick="unit_edit({{$value['id']}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a title="删除" href="javascript:;" onclick="unit_del(this,{{$value['id']}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
					@endforeach

					</tbody>
				</table>
			</div>
		</div>

		<div   id="add-type-box"   style="position: absolute; top:100px;left:350px; width:350px; height:200px;  background-color: #fff; border:1px solid #aaa; box-shadow: 5px 5px 0 #D3D4D3;z-index: 99;  display:none;"   >
			<div style="width:100%; height:35px; background-color:#acda65; text-align: center; line-height: 35px; color: #fff;">
				<span >新增计量单位</span>
			</div>
			<div style="width:100%; margin-top: 20px;margin-bottom: 20px;">
				<label class="add-title">名称 : </label>
				<input type="text" id="add_unit" style="border:1px solid #ddd;  width: 70%; height: 35px;">
				<input type="hidden" id="edit_unit_id" value="0">
			</div>
			<div class="r" style="margin-right: 20px;">
				<button class="btn btn-success  "    onclick="add_unit();">保存 </button>
				<button class="btn btn-default "  data-id="add-type-box" onclick="to_close(this)"  >关闭 </button>
			</div>
		</div>

	</div>
</div>
<div id="fullbg" style=" position: absolute; top:0px; left:0px; z-index: 95;opacity: 0.6; background-color: #e0e0e0;"></div>


@endsection


@section('my-js')
<script type="text/javascript">
	/*产品-删除*/
	var flag = 0;
	function unit_del(obj,id){
		layer.confirm('确定要删除吗？',function(index){
		    var  url = '/unit/del',
		    	 data = {
		        id:id,
				_token:"{{csrf_token()}}"
			};
		    huiajax('POST',url,data , 'json');

		});
	}

	//
	function unit_edit(id){
        var  url = '/unit-getbyid';
	    $.get(url,{id:id},function (res) {
	        if(res.code == 200){
	            $('#add_unit').val(res.result.desc);
                $('#edit_unit_id').val(res.result.id);
                flag = 1;
                supplierBox();
			}
        },'json');
	}
    function to_close(obj){
        flag = 0;
        tclose(obj);
	}

	//添加  计量单位
    function add_unit(){
	    var act = flag? 1: 0 ,
	        id = $('#edit_unit_id').val(),
			desc = $.trim($('#add_unit').val()) ,
            url = '/unit/add';
        if(desc == ''){
            layer.msg('单位不能为空',{time:2000});
            return ;
		}
        var    data = {
                 act:act,
				 id:id,
                 desc: desc,
                _token:"{{csrf_token()}}"
            };
        huiajax('POST',url,data , 'json');
	}

	//编辑  计量单位
	function edit_unit(){

	}


</script>
@endsection

