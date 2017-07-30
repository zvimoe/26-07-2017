<?php
class Connection{
        private $host = '127.0.0.1';
        private $db   = 'northwind';
        private $user = 'root';
        private $pass = '';
        private $charset = 'utf8';
        private $dsn;
        private $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        public function __construct(){

          $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
         
        }

        public function insert($data1,$data2){
           $pdo = new PDO($this->dsn,$this->user,$this->pass,$this->opt);
           $stmt =$pdo->prepare("INSERT INTO  ls42_content(content_header,content_text)
                        VALUES(:data1,:data2)");
           $stmt->execute(array(
                    "data1" => $data1,
                    "data2" => $data2));
        }
        public function getAll(){
            $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
            $stmt = $pdo->prepare('SELECT * FROM ls42_content');
            $stmt->execute();
            foreach ($stmt as $row)
                    {
                        echo "<article><h2>".$row['content_header']."</h2><p>".$row['content_text']."</p></article>";
                    }
                                


        }
}
?>