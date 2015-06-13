<?php
class BlogPagination {

    private $_data;
    private $_limit;
    private $_page;
    private $_total;

    public function __construct()
    {
        $this->_data = json_decode(file_get_contents(get_stylesheet_directory() . '/data/data.json'));
        $this->_limit = ITEM_PER_PAGE;
        $this->_total = count($this->_data);
        $this->_page = ceil($this->_total / $this->_limit);
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
        return '<span class="page-numbers dots">…</span>';
    }

    public function getLinkNextPage($page)
    {
        return $this->getLinkPage($page + 1);
    }

    public function getLinkPage($page)
    {
        return '<a class="page-numbers" href="'. site_url('timeline') .'?page='. $page .'">' . $page . '</a>';
    }
    public function getLinkPrevPage($page)
    {
        return $this->getLinkPage($page -1);
    }

    public function getLinkLastPage()
    {
        return $this->getLinkPage($this->_total);
    }

    public function getLinkFirstPage()
    {
        return $this->getLinkPage(1);
    }

    public function getLinkBody($page)
    {

        if ($page < $this->_total - 6) {
            return $this->getLinkCurrentPage($page)
            . $this->getLinkPage($page + 1)
            . $this->getLinkPage($page + 2)
            . $this->getLinkPage($page + 3)
            . $this->getLinkPage($page + 4)
            . $this->getLinkPage($page + 5);
        } else {
            return  $this->getLinkPage($page - 5)
            . $this->getLinkPage($page - 4)
            . $this->getLinkPage($page - 3)
            . $this->getLinkPage($page - 2)
            . $this->getLinkPage($page - 1)
            . $this->getLinkCurrentPage($page);
        }


    }
    public function createLinks( $page ) {

        $html       = '<p class="page mb40">';

        if ($page == 1 || $page == 2) {
            $html .= $this->getLinkBody($page)
                . $this->getDot()
                . $this->getLinkLastPage()
                . $this->getLinkNextPage($page);
        }else if ($page == $this->_total || $page == $this->_total - 1) {
            $html = $this->getLinkPrevPage($page)
                . $this->getLinkFirstPage()
                . $this->getDot()
                . $this->getLinkBody($page);
        } else {
            $html = $this->getLinkPrevPage($page)
                . $this->getLinkFirstPage()
                . $this->getDot()
                . $this->getLinkBody($page)
                . $this->getDot()
                . $this->getLinkLastPage()
                . $this->getLinkPage($page);
        }
        $html       .= '</p>';
        return $html;
    }
}