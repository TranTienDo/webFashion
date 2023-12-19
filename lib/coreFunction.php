<?php
    include_once("db.php");
    class coreFunction extends Database{
        function setQuery($sql){
            $result =$this->conn->query($sql);

            if (!$result) {
                die("query fail:".$this->conn->error);
            }
            return $result;
        }

        function getAll($sql){
            $result=$this->setQuery($sql);
            $a=array();
            while ($row = $result ->fetch_assoc()) {
                $a[]=$row;
            }
            return $a;
        }

        function getOne($sql){
            $result=$this->setQuery($sql);
            $a = $result->fetch_assoc();
            return $a;
        }
        
    }
?>