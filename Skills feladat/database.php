<?php
    class db {

        public $conn;
        private $results;
        private $fields;

        public function __construct($dbhost, $dbname, $dbuser, $dbpass){
            try 
            {
                $this->conn = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->conn->exec("SET NAMES utf8");
            } 
            catch (PDOException $ex) 
            {
                die('Database Connection failed: ' . $ex->getMessage());
            }
        }

        public function __destruct(){
        }

        public function query($sql) {
           // $this->fields = $this->conn->query("DESCRIBE hamburgerek")->fetchAll(PDO::FETCH_COLUMN);
            $this->results = $this->conn->query($sql)->fetchAll(); 
            $this->fields = array_keys($this->results[0]);
            return $this->results; 
        }

        public function execute($sql) {
            $this->results = $this->conn->exec($sql); 
        }

        public function toTable($param) {
            $actions = explode('|',$param);

            echo '<table class="table table-hovered table-striped">
            <thead>
                <tr>';
                    foreach($this->fields as $field){
                      echo '<th>'.$field.'</th>';
                    }
                    if (sizeof($actions)){
                        echo '<th>Műveletek</th>';
                    }
                echo '</tr>
            </thead>
            <tbody>';
         
            foreach($this->results as $result){
                echo '<tr>';
                foreach($this->fields as $field){
                    echo '<td>'.$result[$field].'</td>';
                }
                echo '</tr>';
           }
           echo '</tbody>
           <tfoot>
            <tr>
                <td colspan="'.sizeOf($this->fields).'">Összesen: '.sizeOf($this->results).' rekord</td>
            </tr>
           </tfoot>
           </table>';
        }

    }
?>