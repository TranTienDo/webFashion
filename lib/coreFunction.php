<?php
include_once("db.php");
class coreFunction extends Database
{
    function setQuery($sql)
    {
        $result = $this->conn->query($sql);

        if (!$result) {
            die("query fail:" . $this->conn->error);
        }
        return $result;
    }

    function getAll($sql)
    {
        $result = $this->setQuery($sql);
        $a = array();
        while ($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
        return $a;
    }

    function getOne($sql)
    {
        $result = $this->setQuery($sql);
        $a = $result->fetch_assoc();
        return $a;
    }

    // Đóng kết nối sau khi sử dụng
    function closeConnection()
    {
        $this->conn->close();
    }


    function addRecord($table, $data)
    {
        // Xây dựng câu truy vấn INSERT từ dữ liệu được truyền vào
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

        // Thực hiện truy vấn
        $result = $this->setQuery($sql);

        // Kiểm tra và trả về kết quả
        return $result;
    }

    function editRecord($table, $id, $params)
    {
        $txtSet="";
        $i=0;
        foreach ($params as $key => $value)
        {
            if ($i < count($params)-1)
            {
                $txtSet .="$key = '$value', ";
            }
        }

    }



}
?>