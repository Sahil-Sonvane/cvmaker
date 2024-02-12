<?php
// class of database 
class Database{
    private $connection;
        function __construct(){
            try{
                $this->connection = new mysqli(db_host,db_user,db_pass,db_name);
            }catch(Exception $e){
                echo $e->getMessage();
            }
        } 
        public function clean($data){
          return $this->connection->real_escape_string($data);  
        }


        // function for getting BindParam Data types for query like integer, string ,float etc.
private function getBindDataType($data){
    $dt ='';
    foreach($data as $value){
        if(is_float($value)) $dt.='d';
        elseif(is_integer($value)) $dt.='i';
        elseif(is_string($value)) $dt.='s';
        else $dt.= 'b';
    }    
    return $dt;
}

// function for getting dynamic prepare values eg. (?,?,?)
private function getLabels($values){
    $label ='';
    foreach($values as $value){
        $label.= '?,';  
    }
    $label = substr_replace($label,'',-1);
    return $label;
} 
// function for getting column name and ?, for Update Query Condition 
private function getLabelsWithName($columns){
    $label ='';
    $columns = explode(',',$columns);
    foreach($columns as $column){
        $label.=$column.'=?,';  
    }
    $label = substr_replace($label,'',-1);
    return $label;
}
// Crud
// function for dynamic Insert Query 
public function insert($table,$columns,$values){
    try{
    $label = $this->getLabels($values);
    $query = "INSERT INTO $table($columns) VALUES($label)";
    $obj = $this->connection->prepare($query);
    $obj->bind_param($this->getBindDataType($values),...$values);
    $obj->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
// cRud
// function for dynamic read or retrive Query
public function read($table,$columns = "*",$conditions = ''){
    $query = "SELECT $columns FROM $table $conditions";
    $result = $this->connection->query($query);
    return $result->fetch_all(true); 
}
// crUd
// function for dynamic update Query
public function update($table,$columns,$values,$condition){
    
    try{
    $label = $this->getLabelsWithName($columns);
    $query = "UPDATE $table SET $label WHERE $condition";
    $obj = $this->connection->prepare($query);
    $obj->bind_param($this->getBindDataType($values),...$values);
    $obj->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
// cruD
// function for dynamic Delete Query
public function delete($table,$condition){
    $query = "DELETE FROM $table WHERE $condition";
    return $this->connection->query($query);
}


}

