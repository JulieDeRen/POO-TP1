<?php

class Crud extends PDO {

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=eTimbre; port=8889; charset=utf8', 'root', 'root');
    }

    public function select($table, $field='id', $order='ASC' ){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt  = $this->query($sql);
        if(!$stmt){
            echo"error";
        }
        return  $stmt->fetchAll();
    }
    // Client Ajout d'une fonction de sélection avec le pays
    public function selectCountry($table, $name = 'id', $foreignTable, $foreignField='idCountry', $field='idCountry', $order = 'ASC'){
        $sql = "SELECT * FROM $table LEFT JOIN $foreignTable ON $foreignTable.$foreignField = $table.$field ORDER BY $name $order";
        $stmt  = $this->query($sql);
        if(!$stmt){
            echo"error";
        }
        return  $stmt->fetchAll();
    }
    // Client
    public function selectIdClient($table, $value, $field = 'id'){
        $sql ="SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    // Country
    public function selectId($table, $value, $field = 'idCountry'){
        $sql ="SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function insert($table, $data){
        $nomChamp = implode(", ", array_keys($data));
        $valeurChamp = ":" .implode(", :", array_keys($data));
        //print_r($valeurChamp);
        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this -> prepare($sql);
        foreach($data as $key => $value){
            $stmt -> bindValue(":$key", $value);
        }
        if(!$stmt -> execute()){
            return $stmt ->fetch();
        }
        else{
            return $this -> lastInsertId();
        }
    }

    // Ref : https://www.phpflow.com/php/create-dynamic-update-sql-query-phpmysql/https://www.phpflow.com/php/create-dynamic-update-sql-query-phpmysql/
    public function update($table, $data, $champId, $url){
        $cols = array();
        foreach($data as $key=>$value) {
            if($data['idCountry']== '-1'){
                $data['idCountry'] = null;
                //unset($_POST[$key]);
            }
            if($data[$key]==""){
                $data[$key]= null;
                //unset($_POST[$key]);
            }
            $cols[] = "$key = '$value'";
        }
        $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE id = $champId";

        $stmt = $this->prepare($sql);
        // retirer la clé et valeur
        foreach($data as $key=>$value){
            if($data[$key]==""){
                $key = null;
                $data[$key] = null;
                //unset($data[$key]);
                //$data = array_values($data);
            }
            $stmt->bindValue(":$key", $value);
            } 
            if(!$stmt->execute()){
                print_r($stmt->errorInfo());
            }else{
                header('Location: ' . $url);
            }
        return $sql;
    }

    // Country Ref : https://www.phpflow.com/php/create-dynamic-update-sql-query-phpmysql/https://www.phpflow.com/php/create-dynamic-update-sql-query-phpmysql/
    public function updateCountry($table, $data, $champId, $url){
        $cols = array();
        foreach($data as $key=>$value) {
            $cols[] = "$key = '$value'";
        }
        $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE idCountry = $champId";
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            if($data[$key]==""){
                unset($data[$key]);
                $data = array_values($data);
            }
            $stmt->bindValue(":$key", $value);
            } 
            if(!$stmt->execute()){
                print_r($stmt->errorInfo());
            }else{
                header('Location: ' . $url);
            }
        return $sql;
    }

    public function delete($table, $id, $champId = 'id', $url='client-index.php'){

        $sql = "DELETE FROM $table WHERE $champId = :$champId";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId", $id);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header('Location: ' . $url);
        }

    }

    public function __destruct() {
        __CLASS__ ;
    }

}


?>