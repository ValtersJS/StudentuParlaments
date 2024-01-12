<?php

namespace Core\Repository;

use PDO;
use PDOException;
use FeatureClasess\Message;

class MessagesRepo extends AbstractItemRepository
{

  // public static function getAll()
  // {
  //   $request = new MessagesRepo();

  //   $sql = "SELECT ZinasID, LietotajaID, Datums, Teksts FROM zinas";
  //   $result = $request->connect()->query($sql);
  //   $arr = array();

  //   while ($row = $result->fetch()) {
  //     $obj = new Message($row['ZinasID'], $row['LietotajaID'], $row['Datums'], $row['Teksts']);
  //     // $obj->setId($row['ID']);
  //     array_push($arr, $obj);
  //   }
  //   return $arr;
  // }

  public static function getAll($sort = null)
  {
    $request = new MessagesRepo();

    // Determine the SQL order clause based on the provided sort parameter
    $orderClause = "";
    if ($sort === 'user') {
      $orderClause = " ORDER BY LietotajaID";
    } elseif ($sort === 'date') {
      $orderClause = " ORDER BY Datums DESC";
    }

    // Build the SQL query with the order clause
    $sql = "SELECT ZinasID, LietotajaID, Datums, Teksts FROM zinas" . $orderClause;
    $result = $request->connect()->query($sql);
    $arr = array();

    while ($row = $result->fetch()) {
      $obj = new Message($row['ZinasID'], $row['LietotajaID'], $row['Datums'], $row['Teksts']);
      array_push($arr, $obj);
    }
    return $arr;
  }

  public static function createMessage($lietotajaID, $teksts)
  {
    $request = new MessagesRepo();
    $insertSql = $request->connect()->prepare("INSERT INTO zinas (LietotajaID, Teksts) VALUES (?, ?)");
    $insertSql->execute([$lietotajaID, $teksts]);
    $rez = $insertSql ? "Ziņa publicēta" : "Ziņas publicēšana neizdevās";
    return $rez;
  }

  public static function updateMessage($messageId, $newMessage)
  {
    $request = new MessagesRepo();
    $sql = $request->connect()->prepare("UPDATE zinas SET Teksts = ? WHERE ZinasID = ?");
    return $sql->execute([$newMessage, $messageId]);
  }
}