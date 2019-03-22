
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
	z-index: -1;
	border:none;

	width:100%;
	height:100%;
}
.erp-input:focus{
	outline:1px solid #007cc3;

}
.input2{
	border: none;
	border-bottom: 1px solid #aaa;
}
.input2:focus{
	border-bottom: 1px solid #007cc3;
}
</style>

@section('content')
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 采购 <span class="c-gray en">&gt;</span> 购货单 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="pd-20"  style="width:70%; min-width: 900px; margin-left: 10%;  margin-top:30px;padding: 20px; background-color: #fff; border:1px solid #ddd;  ">

		<div class="cl pd-5 mt-20" style="margin-bottom: 5px;" >
			<span class="l">
				供应商:
				<input type="text"  class="input2"   >
				<span onclick="suppliers('','/suppliers-box','900','580')">...</span>
			</span>
			<div style="float:left; margin-left: 5%;">
				<sapn>
					单据日期：
					<input type="text"     onfocus="WdatePicker({ Date:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate"  name=" starttime"  style="width:120px; border:none;  border-bottom:1px solid  #aaa;" autocomplete="off"  >
				</sapn>
			</div>
			<div style=" float:left; margin-left: 5%;">
				<sapn>单据编号：</sapn>
				<sapn> CG201903201506267</sapn>
			</div>
			<div style=" float:right; ">
				<sapn>购货：
					<input type="radio"  name="purchase"  id="purchase"  checked value="1" style="width:15px ;height:15px; ">
				</sapn>
				<sapn>退货：
					<input type="radio"   name="purchase"  id="purchase"   value="2" style="width:15px ;height:15px;">
				</sapn>
			</div>
		</div>

		<table class=" table1 " >
			<thead>
			<tr class="erp-th" >
				<td width="3%"></td>
				<td width="5%"></td>
				<td width="30%">商品</td>
				<td width="5%">单位</td>
				<td width="8%">数量</td>
				<td width="8%">购货单价</td>
				<td width="8%">折扣率(%)</td>
				<td width="8%">折扣额</td>
				<td width="10%">采购金额</td>
				<td width="">备注</td>
			</tr>
			</thead>
			<tbody class="tbody">
			@for($i = 1; $i < 6 ; $i++)
			<tr class="tr1 trow newrow" >
				<td style="background-color: #f5f5f5;"     ><span class="erp-sort">{{$i}}</span></td>
				<td>
					<a style="text-decoration:none"  class="add"  href="javascript:;" title="添加"><i class="Hui-iconfont">&#xe604;</i></a>
					<a title="删除" href="javascript:;"  class="del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
				<td><input class="erp-input"  name="name"  autocomplete="off" > </td>
				<td><input class="erp-input"  name="name" autocomplete="off" ></td>
				<td><input class="erp-input"  name="name" autocomplete="off" ></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name" autocomplete="off" ></td>

			</tr>
			@endfor

			</tbody>
			<tr  class="hj"    >
				<td style="background-color: #f5f5f5;"    ></td>
				<td>

				</td>

				<td>合计 </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
				<td> </td>
			</tr>
			<tr  class="trow newrow  tp1"  style="display: none;"  >
				<td style="background-color: #f5f5f5;"    ><span class="erp-sort"></span></td>
				<td>
					<a style="text-decoration:none"  class="add"  href="javascript:;" title="添加"><i class="Hui-iconfont">&#xe604;</i></a>
					<a title="删除" href="javascript:;"  class="del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>

				<td><input class="erp-input"  name="name"  autocomplete="off" > </td>
				<td><input class="erp-input"  name="name" autocomplete="off" ></td>
				<td><input class="erp-input"  name="name" autocomplete="off" ></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name"  autocomplete="off"></td>
				<td><input class="erp-input"  name="name" autocomplete="off" ></td>

			</tr>
		</table>
		<div style="margin-top: 10px; width:100%; float: left;">
			<span style="display: block; width:10%; float: left; ">备注:</span>
			<input  class="input2"   style="width:90%; float: left; ">
		</div>
		<div style="margin-top: 10px; width:100%; float: left;">
			<span style="display: block; width:10%; float: left;">本次付款:</span>
			<input  class="input2"   style="width:10%; float: left;">
			<span style="display: block; width:10%; float: left; margin-left:10px;">欠款:</span>
			<input  class="input2"   style="width:10%; float: left;">
		</div>
		<div style="margin-top: 10px; width:50%; float: left;">
			<span style="display: block; width:20%; float: left; ">制单人:</span>
			<span>吊炸天</span>
		</div>
		<div style="margin-top: 10px; width:50%; float:right ; ">
			<a style="display:   block;   float:right ;width:60px;   text-decoration:none;padding: 5px; border-radius: 4px; background-color: #007cc3; color: #fff; text-align: center">保存</a>

		</div>
		<div id="pageNav" class="pageNav"></div>
	</div>
@endsection


@section('my-js')
	<script type="text/javascript">

        //点击删除属性框数目
        $('.del').click(function(){
            if($('.tr1').length<=1){
                layer.msg('最少保留一条', { time:2000});
                return ;
			}
            if($(this).parent().parent('.trow').hasClass('newrow')){
                del($(this).parents('.trow').index());
            }
            new_sort();
        });

        //点击增加属性框数目
        $('.add').click(function(){
            $('.tp1').clone(true).appendTo('.tbody').addClass('tr1').removeClass('tp1').removeAttr('style');
            new_sort();
        });

        function del(i){
            $('.trow').eq(i).remove();
        }


        //重新排序
		function  new_sort(){
            $('.tr1').each(function (i) {
                $('.tr1').eq(i).find('.erp-sort').html(i+1);
            });
		}

        //供货商菜单
        function suppliers(title,url,width,height){
            layer_show(title,url,width,height);
        }



	</script>
@endsection

