<?php 

$db = new mysqli("localhost","root","","batch_5");

$coloums = array("id","name","email","phone");

class pagination{

    public $table;
    public $coloums;
    public $search;
    public $limit;
    public $total;
    public $totalPage;
    public $page;

    public $where;

    function __construct($table, $coloums, $search, $limit, $page){
        $this->table = $table;
        $this->coloums = $coloums;
        $this->search = $search;
        $this->limit = $limit;
        $this->page = $page;
    }

    public function getTotal(){
        global $db;


        if($this->search!=''){

            foreach($this->search as $coloums){
                $this->where[]= $coloums." LIKE '%".$this->search."%' ";
            }
        } else {
            $this->where = 1;
        }

        $this->where = implode(" OR ", $this->where);

        $sql = "SELECT * FROM `".$this->table."` WHERE ".$this->where;
        
    }

}

?>