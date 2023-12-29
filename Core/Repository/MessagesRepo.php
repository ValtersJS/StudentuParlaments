<?php

namespace Core\Repository;

use PDO;
use PDOException;
use FeatureClasess\Message;

class MessagesRepo extends AbstractItemRepository
{

  public static function getAll()
  {
    $request = new MessagesRepo();

    $sql = "SELECT ZinasID, LietotajaID, Datums, Teksts FROM zinas";
    $result = $request->connect()->query($sql);
    $arr = array();

    while ($row = $result->fetch()) {
      $obj = new Message($row['ZinasID'], $row['LietotajaID'], $row['Datums'], $row['Teksts']);
      // $obj->setId($row['ID']);
      array_push($arr, $obj);
    }
    return $arr;
  }
}