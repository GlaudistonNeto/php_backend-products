<?php
 $pdo;

Class Product{

  # connecting to the database
  public function __construct($host, $dbname, $user, $pass) {
    try {
      $this->pdo = new PDO('mysql:host=localhost;dbname=php_store', $user, $pass);
    } catch (PDOExepton $err) {
      echo "Error: Unsuccessful Connection" . $err->getMessage();
      exit();
    } catch (Exepton $err) {
      echo "Error: Generic error" . $err->getMessage();
      exit();
    }
  }
  # function to fetch data and show on screen
  public function getData() {
    $res = array();
    $cmd = $this->pdo->query("SELECT * FROM tb_products ORDER BY name");

    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
  }
}
?>