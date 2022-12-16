<?php 

$db = new mysqli("localhost","root","","batch5");

class crud{

    function insert($table, $data){
        global $db;

        $sql = "INSERT INTO `".$table."` (";

        foreach($data as $key => $value){
            $sql .= $key.", ";
        }

        $sql = substr($sql, 0, -2);

        $sql .= ") VALUES (";

        foreach($data as $key => $value){
            $sql .= "'".$value."', ";
        }

        $sql = substr($sql, 0, -2);

        $sql .= ")";

        $db->query($sql);

        return $db->insert_id;
    }

    function update($table, $data, $id){
        global $db;

        $sql = "UPDATE `".$table."` SET ";

        foreach($data as $key => $value){
            $sql .= $key."='".$value."', ";
        }

        $sql = substr($sql, 0, -2);

        $sql .= " WHERE id=".$id;

        $db->query($sql);

        return $db->affected_rows;

    }

    function delete($table, $id){
        global $db;

        $sql = "DELETE FROM `".$table."` WHERE id=".$id;

        $db->query($sql);

        return $db->affected_rows;

    }

    function select($table, $coloums, $where){
        global $db;

        $sql = "SELECT ".implode(", ", $coloums)." FROM `".$table."` WHERE ".$where;

        $result = $db->query($sql);

        return $result->fetch_assoc();

    }

    function selectAll($table, $coloums, $where, $limit, $offset){
        global $db;

        $sql = "SELECT ".implode(", ", $coloums)." FROM `".$table."` WHERE ".$where ." LIMIT ".$limit." OFFSET ".$offset;

        $result = $db->query($sql);

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    function count($table, $where){
        global $db;

        $sql = "SELECT * FROM `".$table."` WHERE ".$where;

        $result = $db->query($sql);

        return $result->num_rows;

    }

}

?>