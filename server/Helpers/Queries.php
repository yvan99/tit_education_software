<?php
#SQL QUERIES HOLDER
use Server\Controllers\Database;
#INSERT DATA
function insert($table, $dataStructure, $values, $data)
{
  $database = new Database();
  $db = $database->connect();

  $sql = "INSERT INTO $table ($dataStructure) VALUES 
  ($values)";
  $statement = $db->prepare($sql);
  $statement->execute($data);
  return 'data inserted';
}


# COUNT ROWS
function countAffectedRows($table, $condition)
{
  $database = new Database();
  $db = $database->connect();

  $statement = $db;
  $count = $statement->query("SELECT count(*) FROM $table where $condition ")->fetchColumn();
  return $count;
}

function countRows($table, $condition, $data)
{
  $database = new Database();
  $db = $database->connect();

  $statement = $db;
  $count = $statement->query("SELECT count($data) FROM $table where $condition ")->fetchColumn();
  return $count;
}

# SELECT DATA
function select($data, $table, $condition)
{
  $database = new Database();
  $db = $database->connect();


  $statement = $db;
  $row = $statement->query("SELECT $data FROM $table Where $condition  ")->fetchall(PDO::FETCH_ASSOC);
  return $row;
}

#UPDATE DATA
function update($table, $columns, $condition, $data)
{
  $database = new Database();
  $db = $database->connect();

  $sql = "UPDATE $table SET $columns WHERE $condition ";
  $statement = $db->prepare($sql);
  $statement->execute($data);
  return 'data updated';

  // update() will update data 

}

# DELETE DATA
function remove($table, $column)
{
  $database = new Database();
  $db = $database->connect();
  $sql = "DELETE FROM $table WHERE $column";
  $statement = $db->prepare($sql);
  $statement->execute();
  return 'data deleted';
}
