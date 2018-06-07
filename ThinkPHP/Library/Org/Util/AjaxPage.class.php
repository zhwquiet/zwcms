<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: Page.class.php 2712 2012-02-06 10:12:49Z liu21st $
//
//
//
namespace Org\Util;

class AjaxPage {
    // 分页栏每页显示的页数
    public $rollPage = 5;
    // 页数跳转时要带的参数
    public $parameter;
    // 默认列表每页显示行数
    public $listRows = 20;
    // 起始行数
    public $firstRow;
    // 分页总页面数
    public $totalPages;
    // 总行数
    protected $totalRows;
    // 当前页数
    public $nowPage;
    // 分页的栏的总页数
    protected $coolPages;
    // 分页显示定制
    protected $config = array('header' => '条记录', 'prev' => '', 'next' => '', 'theme' => '<div class="row"><div class="col-sm-5"><span>共%totalPage%页，共%totalRow%条记录</span>%selectlinkPage%</div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" ><ul style="margin: 0 0;" class="pagination">%upPage%%first%%prePage%%linkPage%%nextPage%%end%%downPage%</ul></div></div></div>');

    // 默认分页变量名
    protected $varPage;

    public function __construct($totalRows, $listRows = '', $ajax_func, $parameter = '') {
        $this->totalRows = $totalRows;
        $this->ajax_func = $ajax_func;
        $this->parameter = $parameter;
        $this->varPage = C('VAR_PAGE') ? C('VAR_PAGE') : 'pageNum';
        if (!empty($listRows)) {
            $this->listRows = intval($listRows);
        }
        $this->totalPages = ceil($this->totalRows / $this->listRows); //总页数
        $this->coolPages = ceil($this->totalPages / $this->rollPage);
        $this->nowPage = !empty($_REQUEST[$this->varPage]) ? intval($_REQUEST[$this->varPage]) : 1;
        if (!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->nowPage    = $this->nowPage>0 ? $this->nowPage : 1;
        $this->firstRow = $this->listRows * ($this->nowPage - 1);
    }

    public function setConfig($name, $value) {
        if (isset($this->config[$name])) {
            $this->config[$name] = $value;
        }
    }

    public function show() {
        if (0 == $this->totalRows) {
            return '';
        }

        $p = $this->varPage;
        $nowCoolPage = ceil($this->nowPage / $this->rollPage);
        $url = $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], '?') ? '' : "?") . $this->parameter;
        $parse = parse_url($url);
        if (isset($parse['query'])) {
            parse_str($parse['query'], $params);
            unset($params[$p]);
            $url = $parse['path'] . '?' . http_build_query($params);
        }
        if ($this->totalPages > 1) {
            //上下翻页字符串
            $upRow = $this->nowPage - 1;
            $downRow = $this->nowPage + 1;
            if ($upRow > 0) {
                $upPage = "<li class='paginate_button previous'><a href='javascript:" . $this->ajax_func . "(" . $upRow . ")'>" . "<<" . "</a></li>";
            } else {
                $upPage = "<li class='paginate_button previous disabled'><a href='#'>" . "<<" . "</a></li>";
            }

            if ($downRow <= $this->totalPages) {
                $downPage = "<li class='paginate_button next'><a href='javascript:" . $this->ajax_func . "(" . $downRow . ")'>" . ">>" . "</a></li>";
            } else {
                $downPage = "<li class='paginate_button next disabled'><a href='#'>" . ">>" . "</a></li>";
            }
        } else {
            $upPage = '';
            $downPage = '';
        }

        // << < > >>
        if ($nowCoolPage == 1) {
            $theFirst = "";
            $prePage = "";
        } else {
            $prePage = "<li class='ellipsis-page'></li>";
            $theFirst = "<li class='footable-page'><a href='javascript:" . $this->ajax_func . "(1)' >1</a></li>";

        }
        if ($nowCoolPage == $this->coolPages) {
            $nextPage = "";
            $theEnd = "";
        } else {
            $theEndRow = $this->totalPages;
            $nextPage = "<li class='ellipsis-page'></li>";
            $theEnd = "<li class='footable-page'><a href='javascript:" . $this->ajax_func . "(" . $theEndRow . ")' >" . $theEndRow . "</a></li>";

        }

        $linkPage = '';
        for ($i = 1; $i <= $this->rollPage; $i++) {
            $page = ($nowCoolPage - 1) * $this->rollPage + $i;
            if ($page != $this->nowPage) {
                if ($page <= $this->totalPages) {
                    $linkPage .= "<li><a href='javascript:" . $this->ajax_func . "(" . $page . ")'>" . $page . "</a></li>";

                } else {
                    break;
                }
            } else {
                if ($this->totalPages != 1) {
                    $linkPage .= "<li class='paginate_button active'><a>" . $page . "</a></li>";
                }
            }
        }

        if ($this->totalPages > 1) {
            $selectlinkPage = '<span class="goHref">跳到
            <input type="text" size="3" maxlength="3" id="input_num" value="' . $this->nowPage . '"  onkeydown="if(event.keyCode==13){ fy();}">
           <a id="goHref" class="go" href="javascript:fy();">GO</a></span>';
        } else {
            $selectlinkPage = '';
        }

        $pageStr = str_replace(
            array('%totalPage%', '%totalRow%', '%upPage%', '%prePage%', '%linkPage%', '%nextPage%', '%first%', '%end%', '%downPage%', '%selectlinkPage%'),
            array($this->totalPages, $this->totalRows, $upPage, $prePage, $linkPage, $nextPage, $theFirst, $theEnd, $downPage, $selectlinkPage), $this->config['theme']);

        return $pageStr;
    }

}
