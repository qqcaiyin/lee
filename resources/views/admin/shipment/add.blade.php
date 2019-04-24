
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
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 采购 <span class="c-gray en">&gt;</span> 购货单 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="pd-20"  style="width:70%; min-width: 900px; margin-left: 10%;  margin-top:30px;padding: 20px; background-color: #fff; border:1px solid #ddd;  ">
<form  id="form-purchase-add"  action="{{url('/service/purchase-add')}}"  method="post" onsubmit="return check();"   >
	{{csrf_field()}}
		<div class="cl pd-5 mt-20" style="margin-bottom: 5px;" >
			<span class="l">
				供应商:
				<input type="text"   class="input2" name="peoname" id="peoname"  >
				<span onclick="suppliers('','/suppliers-box','900','580')">...</span>
			</span>
			<div style="float:left; margin-left: 5%;">
				<sapn>
					单据日期：
					<input type="text"     onfocus="WdatePicker({ Date:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="date" class="input-text Wdate"  name="purdate" value="{{date('Y-m-d',time())}}"    style="width:120px; border:none;  border-bottom:1px solid  #aaa;" autocomplete="off"  >
				</sapn>
			</div>
			<div style=" float:left; margin-left: 5%;">
				<sapn>单据编号：</sapn>
				<sapn > {{$sn}}</sapn>
				<input type="hidden" name="sn" value="{{$sn}}">
			</div>
			<div style=" float:right; ">
				<sapn>购货：
					<input type="radio"  name="type"  id="purchase"  checked value="1" style="width:15px ;height:15px; ">
				</sapn>
				<sapn>退货：
					<input type="radio"   name="type"  id="purchase"   value="2" style="width:15px ;height:15px;">
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

				<td>
					<div  class="inp">
						<input class="erp-input"  name="pdtname[]"      autocomplete="off" >
						<label style=" width:10%; display:none;" onclick="suppliers('','/suppliers-box','900','580')">...</label>
					</div>
				</td>

				<td><input class="erp-input1"  name="unit[]" 		autocomplete="off" ></td>
				<td><input class="erp-input1"  name="num[]"  	  oninput ="onlyNum(this)"    autocomplete="off" ></td>
				<td><input class="erp-input1"  name="price[]" 	  oninput ="onlyAmount(this,0)" autocomplete="off"></td>
				<td><input class="erp-input1"  name="discount[]"  	  oninput ="onlyAmount(this,1)"	autocomplete="off"></td>
				<td><input class="erp-input1"  name="salemoney[]"  oninput ="onlyAmount(this,1)" autocomplete="off"></td>
				<td><input class="erp-input1"  name="amount[]"     oninput ="onlyAmount(this,0)" autocomplete="off"></td>
				<td><input class="erp-input1"  name="remark[]"         autocomplete="off" ></td>
			</tr>
			@endfor

			</tbody>
			<tr  class="hj"    >
				<td style="background-color: #f5f5f5;"    ></td>
				<td>
				</td>

				<td>合计 </td>
				<td> </td>
				<td><input disabled="disabled"  class="input-disabled"  id="allnum" name="allnum" value="0"> </td>
				<td> </td>
				<td> </td>
				<td><input disabled="disabled"  class="input-disabled" id="saleamount"  name="saleamount" value="0.00"> </td>
				<td><input disabled="disabled"  class="input-disabled"  id="allamount" name="allamount" value="0.00"> </td>
				<td> </td>
			</tr>
			<tr  class="trow newrow  tp1"  style="display: none;"  >
				<td style="background-color: #f5f5f5;"    ><span class="erp-sort"></span></td>
				<td>
					<a style="text-decoration:none"  class="add"  href="javascript:;" title="添加"><i class="Hui-iconfont">&#xe604;</i></a>
					<a title="删除" href="javascript:;"  class="del" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>

				<td>
					<div  class="inp">
						<input class="erp-input"  name="pdtname[]"      autocomplete="off" >
						<label style=" width:10%; display:none;">...</label>
					</div>
				</td>

				<td><input class="erp-input1"  name="unit[]" 		autocomplete="off" ></td>
				<td><input class="erp-input1"  name="num[]"  	  oninput ="onlyNum(this)"    autocomplete="off" ></td>
				<td><input class="erp-input1"  name="price[]" 	  oninput ="onlyAmount(this,0)" autocomplete="off"></td>
				<td><input class="erp-input1"  name="discount[]"  	  oninput ="onlyAmount(this,1)"	autocomplete="off"></td>
				<td><input class="erp-input1"  name="salemoney[]"  oninput ="onlyAmount(this,1)" autocomplete="off"></td>
				<td><input class="erp-input1"  name="amount[]"     oninput ="onlyAmount(this,0)" autocomplete="off"></td>
				<td><input class="erp-input1"  name="remark[]"         autocomplete="off" ></td>
			</tr>
		</table>
		<div style="margin-top: 10px; width:100%; float: left;">
			<span style="display: block; width:10%; float: left; ">备注:</span>
			<input  class="input2"  name="comment"  style="width:90%; float: left; ">
		</div>
		<div style="margin-top: 10px; width:100%; float: left;">
			<span style="display: block; width:10%; float: left;">本次付款:</span>
			<input  class="input2"  name="paid"  style="width:10%; float: left;">
			<span style="display: block; width:10%; float: left; margin-left:10px;">欠款:</span>
			<input  class="input2"  name="unpaid"  style="width:10%; float: left;">
		</div>
		<div style="margin-top: 10px; width:50%; float: left;">
			<span style="display: block; width:20%; float: left; ">制单人:</span>
			<span >吊炸天</span>
		</div>
		<div style="margin-top: 10px; float:right ;  ">
			<button  type="submit" class="btn btn-primary "  type="submit">保存</button>

		</div>
		<div id="pageNav" class="pageNav"></div>
</form>
</div>
@endsection


@section('my-js')
	<script type="text/javascript">

		$(function () {

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
                updateAllNum();
            });

            //点击增加属性框数目
            $('.add').click(function(){
                $('.tp1').clone(true).appendTo('.tbody').addClass('tr1').removeClass('tp1').removeAttr('style');
                new_sort();
            });

            //点击时触发
			$("input[name='pdtname[]']").focus(function () {
                $("input[name='pdtname[]']").each(function () {
                    $(this).parent().removeClass('current');
                    $(this).parent().find('label').hide();

                })
                $(this).parent().addClass('current');
                $(this).parent().find('label').show();
            })
			//失去焦点
            $(".erp-input1").focus(function () {

                $("input[name='pdtname[]']").each(function () {
                    $(this).parent().removeClass('current');
                    $(this).parent().find('label').hide();

                })
            })

			//合计 数量 部分
            $("input[name='num[]']").change(function () {
                updateAllNum();
            });

            //合计 价格 部分
            $("input[name='price[]']").change(function () {
                updateAllNum();
            });
            //合计 价格 部分
            $("input[name='discount[]']").change(function () {
                updateAllNum();
            });

            //合计 总金额 部分
            $("input[name='amount[]']").change(function () {
                updateAllNum();
            });

        });

		//删除输入行
        function del(i){
            $('.trow').eq(i).remove();
        }

        //刷新合计
		function updateAllNum(){
            //总件数
			var allnum = 0,
				allamount = 0;
            $("input[name='num[]']").each(function (i) {
                if($(this).val()){
                    var num = parseInt($(this).val()),  //数量
						price = parseFloat($("input[name='price[]']").eq(i).val()),  //单价
                        discount = parseFloat($("input[name='discount[]']").eq(i).val()),  //折扣
                    	amount = 0,
                    	salemoney = 0;

                    	discount = isNaN(discount)? 0: discount;
                    	salemoney = discount *num * price/100;
                    	salemoney = isNaN(salemoney)? 0: salemoney;
                    	amount = num * price *(100-discount)/100;
                   		amount = isNaN(amount)? 0: amount;

                   		allamount += amount;
						allnum += num;

					    $("input[name='salemoney[]']").eq(i).val(salemoney.toFixed(2));
						$("input[name='amount[]']").eq(i).val(amount.toFixed(2));

                }
            })

            //总金额
            //$("input[name='amount[]']").each(function () {
            //    if($(this).val()){
            //        allamount += parseFloat($(this).val());
            //    }
            //})
            $('#allnum').val(allnum);
            $('#allamount').val(allamount.toFixed(2));
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

        //只能输入整数
        function onlyNum(t){
            t.value = t.value.replace(/[^\d]/g, '');//  /[^\d\.]/g
		}

        //只允许输入金额
        function onlyAmount(th,type){
            var a = [
                ['^0(\\d+)$', '$1'], //禁止录入整数部分两位以上，但首位为0
                ['[^\\d\\.]+$', ''], //禁止录入任何非数字和点
                ['\\.(\\d?)\\.+', '.$1'], //禁止录入两个以上的点
                ['^(\\d+\\.\\d{2}).+', '$1'] //禁止录入小数点后两位以上
            ];
            for(i=0; i<a.length; i++){
                var reg = new RegExp(a[i][0]);
                th.value = th.value.replace(reg, a[i][1]);
            }

            if( (type==1) && (th.value >100)){
                th.value = 100;
			}
        }



        //提交校验
		function check(){

			var peoname = $.trim($("input[name=peoname]").val()),
                purdate = $.trim($("input[name=purdate]").val());

             //供应商必须填写
			if(!peoname){
                layer.msg('选择供应商', { time:2000});
                $("input[name=peoname]").focus();
                return false;
			}
            //日期不能为空
            if(!purdate){
                layer.msg('选择日期', { time:2000});
                $("input[name=purchase]").focus();
                return false;
            }



		}




	</script>
@endsection

