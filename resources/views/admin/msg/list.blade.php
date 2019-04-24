@extends('admin.master')

@section('content')

    <nav class="breadcrumb">   <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

    <div class="page-container"  >

    <div style=" display:flex;
    flex-direction: row;
    justify-content:space-around;
   ">


            <div  style="width:95%;  background-color: #fff;margin-left:10px;  padding: 20px; border:1px solid #ddd;border-radius: 6px;padding-top: 30px;">

                <div id="tab_demo" class="HuiTab">
                    <div class="tabBar clearfix">
                        <span>未读消息(<em>2</em>)</span>
                        <span>已读消息(<em>2</em>)</span>
                        <span>回收站(<em>2</em>)</span>
                    </div>

                    <div class="tabCon">
                      <div>
                          <div class="mt-20" style="background-color: #fff;   ">
                              <table class="table   table-hover  table-sort">
                                  <tbody>
                                  <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                      <td  width="60%"  style=" text-align: left;padding-left: 30px;" >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                      </td>
                                      <td >
                                         <span  style="white-space: nowrap;"> 2019-04-09 12:12:12</span>
                                      </td>
                                      <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                          <span title="编辑" class="l-btn"     class="ml-5" style="text-decoration:none">标为已读</span>
                                      </td>
                                  </tr>
                                  <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                      <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                      </td>
                                      <td>
                                          2019-04-09 12:12:12
                                      </td>
                                      <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                          <span title="编辑" class="l-btn"     class="ml-5" style="text-decoration:none">标为已读</span>
                                      </td>
                                  </tr>
                                  <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                      <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                      </td>
                                      <td>
                                          2019-04-09 12:12:12
                                      </td>
                                      <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                          <span title="编辑" class="l-btn"   class="ml-5" style="text-decoration:none">标为已读</span>
                                      </td>
                                  </tr>
                                  <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                      <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                      </td>
                                      <td>
                                          2019-04-09 12:12:12
                                      </td>
                                      <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                          <span title="编辑" class="l-btn"   class="ml-5" style="text-decoration:none">标为已读</span>
                                      </td>
                                  </tr>

                                  </tbody>
                              </table>

                          </div>
                          <div style="margin-top: 20px;padding-left: 30px;">
                              <button  class="btn btn-primary radius" style="height:35px;"   >全部标记为已读</button>

                          </div>
                      </div>
                    </div>
                    <div class="tabCon">
                        <div>
                            <div class="mt-20" style="background-color: #fff;   ">
                                <table class="table   table-hover  table-sort">
                                    <tbody>
                                    <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                        <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                        </td>
                                        <td>
                                            2019-04-09 12:12:12
                                        </td>
                                        <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                            <a title="编辑" class="btn btn-danger radius"    href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">删除</a>
                                        </td>
                                    </tr>
                                    <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                        <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                        </td>
                                        <td>
                                            2019-04-09 12:12:12
                                        </td>
                                        <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                            <a title="编辑" class="btn btn-danger radius"    href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">删除</a>
                                        </td>
                                    </tr>
                                    <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                        <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                        </td>
                                        <td>
                                            2019-04-09 12:12:12
                                        </td>
                                        <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                            <a title="编辑" class="btn btn-danger radius"    href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">删除</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div style="margin-top: 20px;padding-left: 30px;">
                                <button  class="btn btn-danger radius" style="height:35px;"   >全部删除</button>

                            </div>
                        </div>
                    </div>
                    <div class="tabCon">
                        <div>
                            <div class="mt-20" style="background-color: #fff;   ">
                                <table class="table   table-hover  table-sort">
                                    <tbody>
                                    <tr class="text-c" style="border-bottom:1px solid #ddd; ">
                                        <td  width="60%"  style=" text-align: left;padding-left: 30px;"  >【系统通知】该系统将于今晚凌晨2点到5点进行升级维护
                                        </td>
                                        <td>
                                            2019-04-09 12:12:12
                                        </td>
                                        <td class="td-manage" width="15%"   style=" text-align: right; padding-right: 20px;">
                                            <a title="编辑" class="btn btn-danger radius"    href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none">还原</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                            <div style="margin-top: 20px;padding-left: 30px;">
                                <button  class="btn btn-danger radius" style="height:35px;"   >清空回收站</button>

                            </div>
                        </div>
                    </div>
                </div>

<!--
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
                        <button  class="btn btn-default radius delete" type="reset">&nbsp;&nbsp;返回&nbsp;&nbsp;</button>
                    </div>
                </div>
                -->
            </div>
            </div>

    </div>
@endsection
@section('my-js')

    <script type="text/javascript">

        $(function() {
            $("#tab_demo").Huitab();
            $("#tab_demo2").Huitab({
                tabEvent: mousemove,
                index: 0
            });
        });


        function  check(){
          var  $role_name = $.trim($('#role_name').val()) ;

        }




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

