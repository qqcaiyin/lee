
@extends('admin.master')
<style>



</style>

@section('content')

<div  style=" display:inline-block; min-width: 1100px; margin:30px 2%; padding: 20px; background-color: #fff; border:1px solid #ddd;  ">

	<div class="home-l">
		<div class="home-t1"  >
			<ul>
				<li >
					<a  class="home-abox"  >采购汇总表</a>
				</li>
				<li >
					<a  class="home-abox abox1"  >销售汇总表</a>
				</li>
				<li  >
					<a  class="home-abox abox2"   >采购汇总表</a>
				</li>
			</ul>
		</div>

		<div class="home-t2" >
			<table class="home-table   " >
				<tr>
					<td  style="border:1px dashed #ddd; ">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe625;</i>
							<span >采购入库</span>
						</a>
					</td>
					<td  style="border:1px dashed #ddd;">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe634;</i>
							<span >销售出库</span>
						</a>
					</td>
					<td  style="border:1px dashed #ddd;">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe6df;</i>
							<span >库存盘点</span>
						</a>
					</td>
					<td  style="border:1px dashed #ddd;">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe692;</i>
							<span >库存盘点</span>
						</a>
					</td>
				</tr>
				<tr>
					<td  style="border:1px dashed #ddd; ">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe627;</i>
							<span >其他入库</span>
						</a>
					</td>
					<td  style="border:1px dashed #ddd;">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe687;</i>
							<span >其他出库</span>
						</a>
					</td>
					<td  style="border:1px dashed #ddd;">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe6df;</i>
							<span >采购入库</span>
						</a>
					</td>
					<td  style="border:1px dashed #ddd;">
						<a  title="编辑" href="javascript:;" >
							<i class="Hui-iconfont">&#xe622;</i>
							<span >意见反馈</span>
						</a>
					</td>
				</tr>

			</table>
		</div>


	</div>

	<div class="home-r">
		<div style="height:50px; width:100%;line-height: 50px; text-align: right;">
			<span>库存查询</span><input  type="text" style="height:30px;  border:1px solid #bbb; margin-left: 10px; margin-right: 5px; "   ><a class="	btn btn-warning radius">检索</a>
		</div>
		<div>
			<ul class="kj">
				<li style="background-color:#e0e0e0; color:#007cc3; font-weight: bolder; text-align: center;">
					库存预警
				</li>
				<li>
					<div class="stock-warn" style="padding-left: 10px; padding-right: 10px; color:red;">
						<span class="l"  >104电容</span><span  class="r" >余 ：1 袋</span>
					</div>
				</li>
				<li>
					<div class="stock-warn" style="padding-left: 10px; padding-right: 10px; color:red;">
						<span class="l"  >发射管</span><span  class="r" >余 ：1 只</span>
					</div>
				</li>
				<li>
					<div class="stock-warn" style="padding-left: 10px; padding-right: 10px; color:red;">
						<span class="l"  >104电容</span><span  class="r" >余 ：1 袋</span>
					</div>
				</li>
			</ul>
		</div>
	</div>




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

