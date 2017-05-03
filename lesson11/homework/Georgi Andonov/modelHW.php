<?php

require_once("db.php");

Class Example {
    private $link;
    private $table = "";

    function __construct($table)
    {
        $this->table = $table;
        $this->link = $GLOBALS["db_link"];
    }

        function getName()
    {
        $table_name = $this->table;
        return $table_name;
    }


        function getAll()
    {
        $query = "SELECT * FROM `".$this->table."`";
      
        $result = mysqli_query($this->link, $query );

        $values = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $values[] = $row;
        }

        return $values;
    }

    function insert($data)
    {
        $query = "INSERT INTO `".$this->table."` ";
        
        $keys = array_keys($data);
        
        $fields = "(`".implode("`,`", $keys)."`) VALUES ";
        $values = "('".implode("','", $data)."')";
        
        $query.=$fields.$values;
     
        mysqli_query($this->link, $query );
    }

    function update($data, $where = '1')
    {
      // UPDATE `table_name` SET `field` = 'value', `field` = 'value' ;
        $query = "UPDATE `".$this->table."` SET ";
        
        $update_fields = array();
        foreach ($data as $key => $value) {
            $update_fields[] = "`".$key."` = '".$value."'";
        }

        $update_fields_str = implode(',', $update_fields);
        
        $query.= $update_fields_str." WHERE ".$where;
     
        mysqli_query($this->link, $query );
    }

    function save($data)
    {
        if (isset($data['id']) && $data['id'] > 0) {
            // update
            $this->update($data, 'id='.$data['id']);
        } else {
          // insert
            $this->insert($data);
        }
    }

    function getById($id)
    {
        $query = "SELECT * FROM `".$this->table."` WHERE id = ".$id."";
        $result = mysqli_query($this->link, $query );

        $values = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $values[] = $row;
        }

        return $values;
    }

    function delete($id)
    {
        $query = "DELETE FROM `".$this->table."` WHERE id = ".$id."";
        mysqli_query($this->link, $query);
    }

    function custom_query($table_name,$id)
    {
        $query_connection = "SELECT * FROM `".$this->table."` LEFT JOIN `".$table_name."` ON ".$this->table.".fav_subject_id = ".$table_name.".id WHERE ".$this->table.".id = ".$id."";
        
        $result = mysqli_query($this->link, $query_connection);
        
        var_dump($result);
        
    //     $values = array();
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $values[] = $row;
    //     }

    //     return $values;
    // }
    //Not ready yet

}
}