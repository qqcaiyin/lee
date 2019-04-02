@extends('admin.master')


@section('content')

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="{{url('/admin-info')}}">ERP系统</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml"></a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>

		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>超级管理员</li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
						<li><a href="#">切换账户</a></li>
						<li><a href="#">退出</a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe6b8;</i> 购货<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/purchase-add')}}" data-title="购货单" href="javascript:void(0)">购货单</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="购货记录" href="javascript:void(0)">购货记录</a></li>
				</ul>
			</dd>
		</dl>

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe634;</i> 销货<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/purchase-add')}}" data-title="购货单" href="javascript:void(0)">销货单</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="购货记录" href="javascript:void(0)">销货记录</a></li>
				</ul>
			</dd>
		</dl>


		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe625;</i> 仓库<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/purchase-add')}}" data-title="购货单" href="javascript:void(0)">销货单</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="购货记录" href="javascript:void(0)">销货记录</a></li>
				</ul>
			</dd>
		</dl>

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe687;</i> 报表<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/report-purchase-list')}}" data-title="采购报表" href="javascript:void(0)">采购报表</a></li>
					<li><a data-href="{{url('/report-sale')}}" data-title="销售报表" href="javascript:void(0)">销售报表</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="仓库报表" href="javascript:void(0)">仓库报表</a></li>
					<li><a data-href="{{url('/purchase-list')}}" data-title="资金报表" href="javascript:void(0)">资金报表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe63c;</i>基础资料 <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/supplier-list')}}" data-title="供应商管理" href="javascript:void(0)">供应商管理</a></li>
					<li><a data-href="{{url('/customer-list')}}" data-title="客户管理" href="javascript:void(0)">客户管理</a></li>
					<li><a data-href="{{url('/-list')}}" data-title="商品管理" href="javascript:void(0)">商品管理</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe63c;</i> 辅助设置<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="{{url('/category-list?id=1')}}" data-title="供应商类别" href="javascript:void(0)">供应商类别</a></li>
					<li><a data-href="{{url('/category-list?id=2')}}" data-title="客户类别" href="javascript:void(0)">客户类别</a></li>
					<li><a data-href="{{url('/category-list?id=3')}}" data-title="商品类别" href="javascript:void(0)">商品类别</a></li>
					<li><a data-href="{{url('/-list')}}" data-title="计量单位" href="javascript:void(0)">计量单位</a></li>
				</ul>
			</dd>
		</dl>

</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="{{url('/home-info')}}"></iframe>
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