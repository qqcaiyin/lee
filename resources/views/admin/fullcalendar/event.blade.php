@extends('admin.master')


@section('content')

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top" >
		<div class="container-fluid cl" style="
		margin-top: 20px;
">
			<a class="logo navbar-logo f-l mr-10 hidden-xs"   style="color: #f0f0f0;" href="#" onclick="displaynavbar(this)">
				<span href="#"  onclick="displaynavbar(this)"><i style="font-size: 30px;"  class="Hui-iconfont">&#xe6c0;</i></span>
			</a>
			<a class="logo navbar-logo-m f-l mr-10 visible-xs" href="#" onclick="displaynavbar(this)"><i style="font-size: 20px;"  class="Hui-iconfont">&#xe6bf;</i>ERP小系统</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs" style="font-size: 26px;"  >ERP简易系统</span>
			<!--
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;"></a>
			-->
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs" style="
		margin-top: 20px;">
			<ul class="cl">
				<li><img  style="width:50px ; height:50px; border-radius: 50%;"    src="{{url('/admin/images/lee.jpg')}}"></li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A">lee <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
						<li><a href="#">切换账户</a></li>
						<li><a href="#">退出</a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="javascript:;" id="msg-blank" title="消息"><span class="badge badge-danger">9</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a>
				</li>
			</ul>
		</nav>

	</div>
</div>
</header>
<aside class="Hui-aside"  style=" display: block!important;">
	<div class="menu_dropdown bk_2">

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe6b8;</i>&nbsp;&nbsp;购货<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li>
						<a data-href="{{url('/purchase-add')}}" data-title="购货单" href="javascript:void(0)">采购单</a>

					</li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="购货记录" href="javascript:void(0)">购货记录</a></li>
				</ul>
			</dd>
		</dl>

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe634;</i>&nbsp;&nbsp;销货<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/purchase-add')}}" data-title="购货单" href="javascript:void(0)">销货单</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="购货记录" href="javascript:void(0)">销货记录</a></li>
				</ul>
			</dd>
		</dl>


		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe625;</i>&nbsp;&nbsp;仓库<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/purchase-add')}}" data-title="盘点" href="javascript:void(0)">盘点</a></li>
					<li><a data-href="{{url('/purchase-add')}}" data-title="其他入库" href="javascript:void(0)">其他入库</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="其他入库记录" href="javascript:void(0)">其他入库记录</a></li>
					<li><a data-href="{{url('/purchase-add')}}" data-title="其他出库" href="javascript:void(0)">其他出库</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="其他出库记录" href="javascript:void(0)">其他出库记录</a></li>
				</ul>
			</dd>
		</dl>

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe687;</i>&nbsp;&nbsp;报表<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/report-purchase-list')}}" data-title="采购报表" href="javascript:void(0)">采购报表</a></li>
					<li><a data-href="{{url('/report-sale')}}" data-title="销售报表" href="javascript:void(0)">销售报表</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="仓库报表" href="javascript:void(0)">仓库报表</a></li>
					<li><a data-href="{{url('/unit-list')}}" data-title="资金报表" href="javascript:void(0)">资金报表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe63c;</i>&nbsp;&nbsp;基础资料 <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/supplier-list')}}" data-title="供应商管理" href="javascript:void(0)">供应商管理</a></li>
					<li><a data-href="{{url('/customer-list')}}" data-title="客户管理" href="javascript:void(0)">客户管理</a></li>
					<li><a data-href="{{url('/-list')}}" data-title="商品管理" href="javascript:void(0)">商品管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe64b;</i>&nbsp;&nbsp;类别管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/category-list?id=1')}}" data-title="客户类别" href="javascript:void(0)">客户类别</a></li>
					<li><a data-href="{{url('/category-list?id=2')}}" data-title="供应商类别" href="javascript:void(0)">供应商类别</a></li>
					<li><a data-href="{{url('/category-list?id=3')}}" data-title="商品类别" href="javascript:void(0)">商品类别</a></li>
					<li><a data-href="{{url('/unit-list')}}" data-title="计量单位" href="javascript:void(0)">计量单位</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe63b;</i>&nbsp;&nbsp;发布信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/msg-issue')}}" data-title="发布通知" href="javascript:void(0)">发布通知</a></li>
					<li><a data-href="{{url('/msg-issue-list')}}" data-title="消息记录" href="javascript:void(0)">消息记录</a></li>

				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe62b;</i>&nbsp;&nbsp;权限管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/rbac-role-list')}}" data-title="角色" href="javascript:void(0)">角色</a></li>
					<li><a data-href="{{url('/rbac-node-list')}}" data-title="权限节点" href="javascript:void(0)">权限节点</a></li>
					<li><a data-href="{{url('/rbac-admin-list')}}" data-title="管理员" href="javascript:void(0)">管理员</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article"  style="display: none;">
			<dt><i class="Hui-iconfont">&#xe62b;</i>&nbsp;&nbsp;消息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/msg-list')}}"  id="msg"  data-title="我的消息" href="javascript:void(0)">我的消息</a></li>
					<li><a data-href="{{url('/rbac-node-list')}}" data-title="权限节点" href="javascript:void(0)">权限节点</a></li>
					<li><a data-href="{{url('/rbac-admin-list')}}" data-title="管理员" href="javascript:void(0)">管理员</a></li>
				</ul>
			</dd>
		</dl>

</div>
</aside>
<!--
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
-->
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl" style="width:100%;">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group">
			<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a>
			<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" name="main-iframe" frameborder="0" src="{{url('/home-info')}}"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
@endsection
@section('my-js')
	<script>
		$('#msg-blank').click(function(){

            $("#msg").trigger("click");
		});

	</script>


@endsection