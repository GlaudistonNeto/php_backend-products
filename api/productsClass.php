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

  # function to register on the database
  public function registerProducts($name, $price, $width, $height, $length,
                                    $dvd, $book) { # verify if the email is
                                                  # already registered
    $cmd = $this->pdo->prepare("SELECT id FROM tb_products WHERE 
                                name = :name");
    $cmd->bindValue(":name", $name);
    $cmd->execute();
    if ($cmd->rowCount() > 0) { # email already registered
      return false;
    } else { # not registered
      $cmd = $this->pdo->prepare("INSERT INTO tb_products (name, price,
                                  width, height, length, dvd, book)
                                VALUES (:name, :price, :width, :height, :length,
                                    :dvd, :book)");
      $cmd->bindValue(":name", $name);
      $cmd->bindValue(":price", $price);
      $cmd->bindValue(":width", $width);
      $cmd->bindValue(":height", $height);
      $cmd->bindValue(":length", $length);
      $cmd->bindValue(":dvd", $dvd);
      $cmd->bindValue(":book", $book);
      $cmd->execute();
      return true;
    }
  }
}
?>