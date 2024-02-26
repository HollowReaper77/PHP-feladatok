<?php
    // php osztály adatbázis kapcsolathoz (PDO-t használ -> php database object)
    class db {

        public $conn;
        private $results;
        private $fields;

        // konstruktor
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

        // destruktor, nem használjuk
        public function __destruct(){
        }

        // SELECT művelet esetés
        public function query($sql) {
           // $this->fields = $this->conn->query("DESCRIBE hamburgerek")->fetchAll(PDO::FETCH_COLUMN);
            $this->results = $this->conn->query($sql)->fetchAll(); 
            if (sizeof($this->results)>0){
                $this->fields = array_keys($this->results[0]);
            }
            return $this->results; 
        }

        // INSERT, UPDATE, DELETE művelet esetén
        public function execute($sql) {
            $this->results = $this->conn->exec($sql); 
        }

        // A lekérdezés eredményeinek megjelenítése egy formázott HTML táblázatban
        public function toTable($params) {
            /* 
            Paraméterezése: 

            i|c|u|d 

            i: info
            c: create
            u: update
            d: delete

            */
            $actions = explode('|', $params);

            
            $pk = 'ID'; // primary key
          
            if ($params != ''){
                if (in_array('c', $actions)){
                    echo '<a href="?pg=create" class="btn btn-success mb-3 mt-3"><i class="bi bi-plus-circle"></i> Create record </a>';
                }
            }
            echo '<table class="table table-hovered table-striped">
            <thead class="table-primary">
                <tr>';
                    foreach($this->fields as $field){
                      echo '<th>'.$field.'</th>';
                    }
                    if ($params != ''){
                        echo '<th class="text-end">Műveletek</th>';
                    }
                echo '</tr>
            </thead>
            <tbody>';
         
            foreach($this->results as $result){
                echo '<tr>';
                foreach($this->fields as $field){
                    echo '<td>'.$result[$field].'</td>';
                }
                if ($params != ''){
                    echo '<td class="text-end">';
                    if (in_array('i', $actions)){
                        echo '<a href="?pg=info&id='.$result[$pk].'" class="btn btn-info btn-sm me-1"><i class="bi bi-info-circle"></i></a>';
                    }
                    if (in_array('u', $actions)){
                        echo '<a href="?pg=update&id='.$result[$pk].'" class="btn btn-warning btn-sm me-1"><i class="bi bi-pencil-square"></i></a>';
                    }
                    if (in_array('d', $actions)){
                        echo '<a href="?pg=delete&id='.$result[$pk].'" class="btn btn-danger btn-sm me-1"><i class="bi bi-x-circle"></i></a>';
                    }
                    echo '</td>';
                }
                echo '</tr>';
           }
           if ($params != ''){
                $colspan = sizeOf($this->fields) + 1;
           }
           else{
                $colspan = sizeOf($this->fields);
           }
           echo '</tbody>
           <tfoot>
            <tr>
                <td colspan="'.$colspan.'" class="text-center text-muted">Összesen: '.sizeOf($this->results).' rekord</td>
            </tr>
           </tfoot>
           </table>';
        }

        // Egy rekord adatainak megjelenítése egy formázott HTML táblázatban
        public function showRecord(){
            echo '<table class="table table-hovered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Tulajdonság</th>
                    <th>Érték</th>
                </tr>
            </thead>
            <tbody>';
        
            foreach($this->fields as $field){
                echo '<tr>
                    <td class="fieldName">'.$field.'</td>
                    <td>'.$this->results[0][$field].'</td>
                   // <td>'.$this->results[-1][$field].'</td>

                </tr>';
                // //$datetime1 = date_create('2009-10-11'); $datetime2 = date_create('2009-10-13'); $interval = date_diff($datetime1, $datetime2); echo $interval->format('%m months'); 
            }

            echo '</tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Összesen: '.sizeOf($this->fields).' tulajdonság</td>
                </tr>
            </tfoot>';
           

            echo '</table>';
        }

        // GET primary key from table
        private function getPrimaryKey($table){
            //TODO: get primary key name from results
          
        }

    }
?>