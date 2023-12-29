<?php

namespace Core\Repository;

use PDO;
use PDOException;
use FeatureClasess\Event;

class ItemRepository extends AbstractItemRepository
{
  /* protected $dbServername = "localhost";
  protected $dbUsername = "root";
  protected $dbPassword = "";
  protected $dbName = "studentuparlaments";
  protected $charset = "utf8mb4"; */

  public static function getAll()
  {
    $request = new ItemRepository();

    $sql = "SELECT PasakumaID, Nosaukums, Teksts FROM pasakumi";
    $result = $request->connect()->query($sql);
    $arr = array();

    while ($row = $result->fetch()) {
      $obj = new Event($row['PasakumaID'], $row['Nosaukums'], $row['Teksts']);
      // $obj->setId($row['ID']);
      array_push($arr, $obj);
    }
    return $arr;
  }

}