<?php

require_once __DIR__ . '/config.php';

function redirect(string $path){
    header("Location: $path");
    die();
}

function get_PDO(): PDO{
  try{
      return new \PDO(
          'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
  }catch (\PDOException $e){
      die($e->getMessage());
  }
}

function getUserInfo() {

    $pdo = get_PDO();
    $query = "SELECT * FROM `user_info` ORDER BY `user_info`.`id` DESC";

    $stmt = $pdo->prepare($query);
    try{
        $stmt ->execute();
        return $stmt->fetchAll();
    }catch (\Exception $e){
        die($e->getMessage());
    }

}

function getNews() {  
    $pdo = get_PDO();
    $query = "SELECT * FROM `news` ORDER BY `news`.`date` DESC";
    $stmt = $pdo->prepare($query);
    try{
        $stmt ->execute();
        return $stmt->fetchAll();
    }catch (\Exception $e){
        die($e->getMessage());
    }
}

function getLastThreeNews(){
    $pdo = get_PDO();
    $query = "SELECT * FROM `news` ORDER BY `news`.`date` DESC LIMIT 3";
    $stmt = $pdo->prepare($query);
    try{
        $stmt ->execute();
        return $stmt->fetchAll();
    }catch (\Exception $e){
        die($e->getMessage());
    }
}