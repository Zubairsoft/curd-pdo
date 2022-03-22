<?php
class DB
{
    private $dsn;
    private $username;
    private $password;
    private $database;
    private $pdo;

    function __construct()
    {
        $this->database="crud";
        $this->dsn="mysql:host=localhost;dbname=$this->database;charset=utf8mb4";
        $this->username="root";
        $this->password="";
        $this->pdo=new PDO($this->dsn,$this->username,$this->password);
    }

    // This function select valuse from table by id
    function selectById($table, $id)
    {
        $stmt = $this->pdo->prepare("select * from $table where id=?");
        try {
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ)[0];
        } catch (Exception $ex) {
            return $ex;
        }
    }

    // This function select all valuse from table
    function selectAll($table)
    {
        $stmt = $this->pdo->prepare("select * from $table");
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return $ex;
        }
    }
    // This function select values from multi tables and choise multi tables and use condesion
    function select(array $tables, array $feild = null, array $valuse = null, $andOr = true)
    {
        $feildStr = $feild;
        $tablesStr = $tables;
        $where='';
        if (is_array($tables)) {
            $tablesStr = implode(',', $tables);
        }
        if (is_array($feild)) {
            $feildStr = implode(',', $feild);
        } else if (is_null($feild) || !is_string($feild)) {
            $feildStr = '*';
        }
        if (is_array($valuse)) {
            $arr = array();
            foreach ($valuse as $key => $value) {
                array_push($arr, "$key='$value'");
            }
            if ($andOr) {
                $aaa = implode(' and ', $arr);
            } else
                $aaa = implode(' or ', $arr);
            $where=' where '.$aaa;
        }

        $sql='select '.$feildStr .' from '.$tablesStr.$where;
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $ex){
            return $ex;
        }
    }
    // Insert function
    function insert($table,$data){
        $k = "";
        $v = "";
        $k = implode(',',array_keys($data));
        foreach ($data as $key => $value) {
            $data[$key] = "'$value'";
        }
        $v = implode(',',$data);
        $stm =$this->pdo->prepare("insert into $table ($k) values ($v);");
        $stm->execute();
    }

    // Update function
    function update($table,$data,$id){
        foreach ($data as $key => $value) {
            $data[$key] = $key." = '$value' ";
        }
        $v = implode(',',$data);
        // echo "<pre>". var_dump($data) ."</pre>" ;
        // echo "<h1>update $table set $v WHERE id = $id;</h1>";
        $stmt=$this->pdo->prepare("update $table set $v WHERE id = $id;");
        $stmt->execute();
    }

    //delete function
    function delete($table ,$id ){
        $stmt=$this->pdo->prepare("delete  from $table where id=?");
        $stmt->execute([$id]);
    }
}
?>