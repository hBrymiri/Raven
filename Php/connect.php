<?php
  $db = new SQLite3('/Applications/MAMP/db/sqlite/mydatabase.db');
  $db->exec("CREATE TABLE items(id INTEGER PRIMARY KEY, name TEXT)");
  $db->exec("INSERT INTO items(name) VALUES('Name 1')");
  $db->exec("INSERT INTO items(name) VALUES('Name 2')");

  $last_row_id = $db->lastInsertRowID();

  echo 'The last inserted row ID is '.$last_row_id.'.';

  $result = $db->query('SELECT * FROM items');

  while ($row = $result->fetchArray()) {
    echo '<br>';
    echo 'id: '.$row['id'].' / name: '.$row['name'];
  }

  $db->exec('DELETE FROM items');

  $changes = $db->changes();

  echo '<br>';
  echo 'The DELETE statement removed '.$changes.' rows.';
?>