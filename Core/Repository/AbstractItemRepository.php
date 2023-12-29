<?php

namespace Core\Repository;

use PDO;
use PDOException;

abstract class AbstractItemRepository
{
  protected $dbServername;
  protected $dbUsername;
  protected $dbPassword;
  protected $dbName;
  protected $charset;
  public function __construct()
  {
    $this->dbServername = "localhost";
    $this->dbUsername = "root";
    $this->dbPassword = "";
    $this->dbName = "studentuparlaments";
    $this->charset = "utf8mb4";
  }

  // public abstract function connect();

  public function connect()
  {
    try {
      $dsn = "mysql:host=" . $this->dbServername . ";dbname=" . $this->dbName . ";charset=" . $this->charset;
      $pdo = new PDO($dsn, $this->dbUsername, $this->dbPassword);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  public static abstract function getAll();

  // public static abstract function deleteById($delValues);

  // public static abstract function setRow($item);
}