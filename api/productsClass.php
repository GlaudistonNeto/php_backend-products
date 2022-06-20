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
                                    $dvd, $book) { # verify if the product is
                                                  # already registered
    $cmd = $this->pdo->prepare("SELECT id FROM tb_products WHERE 
                                name = :name");
    $cmd->bindValue(":name", $name);
    $cmd->execute();
    if ($cmd->rowCount() > 0) { # product already registered
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
  # exclude products
  public function deleteProduct($id) {
    $cmd = $this->pdo->prepare("DELETE FROM tb_products WHERE id = :id");
    $cmd->bindValue(":id",$id);
    $cmd->execute();
  }

  # search for a person's data
  public function getPersonData($id) {
    $res = array();
    $cmd = $this->pdo->prepare("SELECT * FROM tb_products WHERE id = :id");
    $cmd->bindValue(":id",$id);
    $cmd->execute();

    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    return $res;
  }
  # update this person's data
  public function updatePersonData($id, $name, $price, $width, $height, $length,
                                    $dvd, $book) {
    $cmd = $this->pdo->prepare("UPDATE FROM tb_products SET name = :name,
                                price = $price, width = $width, height = 
                                $height, length = $length, dvd = $dvd, book =
                                $book WHERE id = :id");
    $cmd->bindValue(":name",$name);
    $cmd->bindValue(":price",$price);
    $cmd->bindValue(":width",$width);
    $cmd->bindValue(":height",$height);
    $cmd->bindValue(":length",$length);
    $cmd->bindValue(":dvd",$dvd);
    $cmd->bindValue(":book",$book);
    $cmd->bindValue(":id",$id);
    $cmd->execute();

    return true;
  } 
}
?>