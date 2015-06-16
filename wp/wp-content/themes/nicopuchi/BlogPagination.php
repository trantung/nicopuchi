<?php
class BlogPagination {

    private $_data;
    private $_limit;
    private $_totalPage;
    private $_total;

    public function __construct()
    {
        $this->_data = json_decode(file_get_contents(get_stylesheet_directory() . '/data/data.json'), true);
        $this->_limit = ITEM_PER_PAGE;
        $this->_total = count($this->_data);
        $this->_totalPage = ceil($this->_total / $this->_limit);
    }

    public function getData($page = 1)
    {
        $data = [];
        $start = ($page - 1) * ITEM_PER_PAGE;
        for($i = $start; $i < count($this->_data); $i++){
            $data[] = $this->_data[$i];
            if (count($data) == ITEM_PER_PAGE) break;
        }
        return $data;
    }

    public function getLinkCurrentPage($page)
    {
        return '<span class="page-numbers current">' . $page . '</span>';
    }

    public function getDot()
    {
        return $this->_totalPage < MAX_PAGE_LINK ? null : '<span class="page-numbers dots">…</span>';
    }

    public function getLinkNextPage($page)
    {
        return $page == $this->_totalPage ? '' : $this->getLinkPage($page + JUMP_PAGE, '&gt;');
    }

    public function getLinkPrevPage($page)
    {
        return $page == FIRST_PAGE ? '' : $this->getLinkPage($page -JUMP_PAGE, '&lt;');
    }

    public function getLinkPage($page, $navigate = null)
    {
        $navigate = $navigate ? $navigate : $page;
        return '<a class="page-numbers" href="'. home_url('timeline') .'/?page='. $page .'">' . $navigate . '</a>';
    }

    public function getLinkLastPage()
    {
        return $this->getLinkPage($this->_totalPage);
    }

    public function getLinkFirstPage()
    {
        return $this->getLinkPage(1);
    }

    public function createLinks($page)
    {
        $html       = '<p class="page mb40">';
        $firstPageLink = '';
        $lastPageLink = '';
        $firstDot = '';
        $lastDot = '';
        if ($this->_totalPage <= MAX_PAGE_LINK) {
            $firstBodyLink = FIRST_PAGE;
            $lastBodyLink = $this->_totalPage;
        } else {
            if ($page <= SPECIAL_SEGMENT_PAGE) {
                $firstBodyLink = FIRST_PAGE;
                $lastBodyLink = MAX_PAGE_LINK;
                if ($this->_totalPage > MAX_PAGE_LINK + JUMP_PAGE) {
                    $lastDot = $this->getDot();
                    $lastPageLink = $this->getLinkLastPage();
                }
            } else if ($page >= $this->_totalPage - SPECIAL_SEGMENT_PAGE){
                $lastBodyLink = $this->_totalPage;
                $firstBodyLink = $this->_totalPage - (MAX_PAGE_LINK - JUMP_PAGE);
                if ($this->_totalPage > MAX_PAGE_LINK + JUMP_PAGE) {
                    $firstDot = $this->getDot();
                    $firstPageLink = $this->getLinkFirstPage();
                }
            } else {
                $firstBodyLink = $page - BEFORE_CURRENT_PAGE;
                $lastBodyLink = $page + AFTER_CURRENT_PAGE;
                $firstPageLink = $this->getLinkFirstPage();
                $lastPageLink = $this->getLinkLastPage();
                $firstDot = $lastDot = $this->getDot();
            }
        }
        $html .= $this->getLinkPrevPage($page) . $firstPageLink . $firstDot;

        for($i = $firstBodyLink; $i <= $lastBodyLink; $i++){
            $html .= $i == $page ? $this->getLinkCurrentPage($i) : $this->getLinkPage($i);
        }

        $html .= $lastDot . $lastPageLink . $this->getLinkNextPage($page);
        $html       .= '</p>';
        return $html;
    }
}