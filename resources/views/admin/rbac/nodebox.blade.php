@extends('admin.master')
@section('content')

    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe60d;</i> 添加角色<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

    <div class="page-container"  >

        <form action="{{url('/rbac-role-add')}}" method="post" name="role_add"   onsubmit="check()" >
            {{csrf_field()}}
        <div style=" display:flex;
    flex-direction: row;
    justify-content:space-around;
    min-width: 900px;">


        <div   class="node-box"  style="display: block;  font-size: 16px; border:2px solid #2c3e50; border-radius: 4px; width: 300px;  ">
            <ul class="tree-top" data-id="100">
                @foreach($nodes as $key =>$l1)
                    <li>
                        @if(isset($l1['son']))
                        <i class="Hui-iconfont tree-options " style=" font-size: 20px;">&#xe69a;</i>
                            <input type="checkbox" id="ck" name="root[]"  value="1" style="display: none;" >
                        @endif

                        <span @if(!isset($l1['son'])) style="padding-left: 25px;"    @endif>
                         <i class="Hui-iconfont  icon-check-box" >&#xe608;</i>
                         <input type="checkbox"  name="node_id[]"   value="{{$l1['id']}}" style="display: none;" >
                        {{$l1['node_title']}}
                    </span>
                        @if(isset($l1['son']))
                            <ul  class="tree-levels-hide">
                                @foreach($l1['son'] as $l2)
                                    <li data-parent="" data-id=""  data-level="" class="tree-2" >
                                        @if(isset($l2['son']))
                                            <i class="Hui-iconfont tree-options " style=" font-size: 20px;">&#xe69a;</i>
                                            <input type="checkbox" id="ck" name="root[]"  value="1" style="display: none;" >
                                        @endif
                                        <span @if(!isset($l2['son'])) style="padding-left: 25px;"    @endif>
                                            <i class="Hui-iconfont icon-check-box" >&#xe608;</i>
                                            <input type="checkbox"  name="node_id[]"  value="{{$l2['id']}}" style="display: none;" >
                                            {{$l2['node_title']}}
                                         </span>
                                        @if(isset($l2['son']))
                                            <ul   class="tree-levels-hide">
                                                @foreach($l2['son'] as $l3)
                                                        <li>
                                                            <span>
                                                                <i class="Hui-iconfont icon-check-box" >&#xe608;</i>
                                                                   <input type="checkbox"  name="node_id[]"  value="{{$l3['id']}}" style="display: none;" >
                                                                 {{$l3['node_title']}}
                                                            </span>
                                                        </li>
                                                @endforeach
                                             </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>


                        @endif

                    </li>
                @endforeach

            </ul>

        </div>
            <div  style="width:70%; min-width: 500px;  max-height: 255px;min-height: 255px;  background-color: #fff;margin-left:10px;  padding: 20px; border:1px solid #ddd;border-radius: 4px; ">
                <div class="row cl  "  style="margin-top: 10px;">
                    <label class="form-label col-xs-4 col-sm-2 text-r">
                        <span class="c-red">*</span>角色名称：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text"  name="name"  id="role_name" placeholder="输入角色名称" value="" class="input-text">
                    </div>
                </div>
                <div class="row cl  "  style="margin-top: 10px;">
                    <label class="form-label col-xs-4 col-sm-2 text-r">
                        状态：
                    </label>
                    <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                        <div class="radio-box">
                            <input type="radio"  id="radio-1" name="is_enable">
                            <label for="radio-1" >开启</label>
                        </div>
                        <div class="radio-box">
                            <input type="radio" id="radio-2"  name="is_enable" checked>
                            <label for="radio-2">关闭</label>
                        </div>
                    </div>
                </div>
                <div class="row cl " style="margin-top: 10px;">
                    <label class="form-label col-xs-4 col-sm-2 text-r">角色描述：</label>
                    <div class="formControls col-xs-8 col-sm-9" >
                        <textarea name="summary" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                    </div>
                </div>
                <div class="row cl "style="margin-top: 10px;">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                        <button  type="submit" class="btn btn-primary radius" type="submit">添加</button>
                        <a  href="{{url('/rbac-role-list')}}" class="btn btn-default radius delete" type="reset"   >&nbsp;&nbsp;返回&nbsp;&nbsp;</a>
                    </div>
                </div>
            </div>
            </div>
        </form>




        <div  class="to-top none ">
            <i class="Hui-iconfont " style=" font-size: 20px;">&#xe684;</i>
        </div>

    </div>
@endsection

@section('my-js')

    <script type="text/javascript">


        function  check(){
          var  $role_name = $.trim($('#role_name').val()) ;

        }

        //下拉到一定阈值时显示返回顶部按钮
        $(function(){
            $(window).scroll(function(){
                if($(this).scrollTop()>20){//当window的scrolltop距离大于1时，go to top按钮淡出，反之淡入
                    $(".to-top").fadeIn();
                } else {
                    $(".to-top").fadeOut();
                }
            });
        });
        //返回顶部
        $('.to-top').click(function(){
            $('html,body').animate({
                scrollTop:'0px'
            },300);

        })

        //tree
        $('.tree-options').click(function(){

            var treeOption = $(this).siblings('input');

            var checked = treeOption.is(':checked');

            if(checked){
                $(this).html('&#xe69a;');
                treeOption.prop('checked',false);
            }else{
                $(this).html('&#xe698;');
                treeOption.prop('checked',true);
            }

            $(this).siblings('ul').toggle();

        });

        $('.icon-check-box').click(function(){
            var node = $(this).siblings('input');
            var checked = node.is(':checked');
            if(checked){
                //向下的子级全部取消
                $(this).parent().siblings('ul').find('.icon-check-box').html('&#xe608;');
                $(this).parent().siblings('ul').find('.icon-check-box').removeClass('node-checked');
                //向上遍历
                cp($(this));


                //当前的取消
                $(this).parent().siblings('ul').find('input').prop('checked',false);
                $(this).html('&#xe608;');
                $(this).removeClass('node-checked');
                node.prop('checked',false);
            }else{
                //选中
                //向下全部选中
                $(this).parent().siblings('ul').find('.icon-check-box').html('&#xe676;');
                $(this).parent().siblings('ul').find('.icon-check-box').addClass('node-checked');
                $(this).parent().siblings('ul').find('input').prop('checked',true);
                //向上所有父级选中
                $(this).parents('li').children('span').children('.icon-check-box').html('&#xe676;');
                $(this).parents('li').children('span').children('.icon-check-box').addClass('node-checked');
                $(this).parents('li').children('span').find('input').prop('checked',true);
                //当前节点
                $(this).addClass('node-checked');
                $(this).html('&#xe676;');
                node.prop('checked',true);
            }


        });

        function cp(t){

            if(t.parent().parent().parent().data('id') != 100){
                var n = t.parent().parent().siblings('li').children('span').children("input[name='node_id[]']:checked").length;
                console.log(n);
                console.log('debug');
                if(n<=0){
                    t.parent().parent().parent().siblings('span').children('.icon-check-box').html('&#xe608;');
                    t.parent().parent().parent().siblings('span').children('.icon-check-box').removeClass('node-checked');
                    t.parent().parent().parent().siblings('span').find('input').prop('checked',false);
                    n=t.parent().parent().parent().siblings('span').children('.icon-check-box');
                    cp(n);
                }else{

                }
            }

        }



    </script>
@endsection

