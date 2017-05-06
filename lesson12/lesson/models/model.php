<?php

require_once('db.php');

class Model
{
    private $link;
    private $table ='';
    function __construct($table)
    {
        global $db_link;

        $this->table = $table;
        $this->link = $db_link;
    }

    function getById($id)
    {
        // get by given id
    }

    function query($query)
    {
        // select * from table LEFT JOIN table2 LEFT JOIN tabler
        // get data by custom query
        $result = mysqli_query($this->link, $query );

        $values = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $values[] = $row;
        }

        return $values;
    }

    function delete($id)
    {
        // delete data by given id
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
      // INSERT INTO `table_name` (`field` ... ) VALUES ('','');
        $query = "INSERT INTO `".$this->table."` ";
        
        $keys = array_keys($data);
        
        $fields = "(`".implode("`,`", $keys)."`) VALUES ";
        $values = "('".implode("','", $data)."')";
        
        $query.=$fields.$values;
        
        ;
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
}
