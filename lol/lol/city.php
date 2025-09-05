<?php
require_once 'db.php';

function getCities() {
  global $conn;
  $cities = [];
  $sql = "SELECT * FROM cities";
  $result = $conn->query($sql);
  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $cities[] = $row;
    }
  }
  return $cities;
}

function getCityById($id) {
  global $conn;
  $id = intval($id);
  $res = $conn->query("SELECT * FROM cities WHERE id=$id");
  if ($res && $res->num_rows > 0) {
    return $res->fetch_assoc();
  }
  return null;
}

function addCity($name, $desc) {
  global $conn;
  $name = $conn->real_escape_string($name);
  $desc = $conn->real_escape_string($desc);
  return $conn->query("INSERT INTO cities (name, description) VALUES ('$name', '$desc')");
}

function updateCity($id, $name, $desc) {
  global $conn;
  $id = intval($id);
  $name = $conn->real_escape_string($name);
  $desc = $conn->real_escape_string($desc);
  return $conn->query("UPDATE cities SET name='$name', description='$desc' WHERE id=$id");
}
