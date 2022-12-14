<?php 

$db = new mysqli("localhost","root","","batch5");

class pagination{

    public $table;
    public $coloums;
    public $SQLcol;
    public $search;
    public $limit;
    public $offset;
    public $total;
    public $totalPage;
    public $page;
    public $url;

    public $where;

    function __construct($table, $coloums, $search, $limit, $page, $url){
        global $db;

        $this->table = $table;
        $this->coloums = $coloums;
        $this->SQLcol = implode(", ", $coloums);
        $this->search = $search;
        $this->limit = $limit;
        $this->page = $page;
        $this->url = $url;

        if($this->search!=''){

            foreach($this->coloums as $coloums){
                $this->where[]= $coloums." LIKE '%".$this->search."%' ";
            }
            
            $this->where = implode(" OR ", $this->where);

        } else {
            $this->where = 1;
        }

        $this->offset = ($this->page-1)*$this->limit;

        $sql = "SELECT * FROM `".$this->table."` WHERE ".$this->where;

        $result = $db->query($sql);

        $this->total = $result->num_rows;
        $this->totalPage = ceil($this->total/$this->limit);

    }

    public function getTotal(){
        return $this->total;
    }

    public function getData(){

        global $db;

        $sql = "SELECT $this->SQLcol FROM `".$this->table."` WHERE ".$this->where." LIMIT $this->offset, $this->limit";

        $result = $db->query($sql);

        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;

    }

    public function pageNav(){

        $pageNav = '';
            
        if($this->page!=1){
            $pageNav.= "<a href='$this->url?page=".($this->page-1)."&search=".$this->search."'>Prev</a> ";
        }

        for($i=1; $i<=$this->totalPage; $i++){
            $pageNav.= "<a href='$this->url?page=".$i."&search=".$this->search."'>".$i."</a> ";
        }

        if($this->page!=$this->totalPage){
            $pageNav.= "<a href='$this->url?page=".($this->page+1)."&search=".$this->search."'>Next</a> ";
        }

        return $pageNav;
    }

}

?>