<?php

  require_once __DIR__ . '/../helpers.php'; 

  $fio = $_POST['fio'] ?? '';
  $address = $_POST['address'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $email = $_POST['email'] ?? '';

  $error_fields = [];

// Проверка на пустоту

  if ($fio === '') {
    $error_fields[] = 'fio';
  };

  if ($address === '') {
    $error_fields[] = 'address';
  };

  if ($phone === '') {
    $error_fields[] = 'phone';
  };
  if ($email === '') {
    $error_fields[] = 'email';
  };

  if (!empty($error_fields)){
    $response = [
        "status" => false,
        "message" => "Заполните обязательные поля",
        "type" => 1,
        "fields" => $error_fields
    ];
    echo json_encode($response);
    die();
}
// Проверка фио 

if (!preg_match('/^[а-яА-ЯёЁa-zA-Z]+$/u', $fio)) {
  $response = [
      "status" => false,
      "message" => "Некорректное ФИО!",
      "type" => 1,
      "fields" => ['fio']
  ];
  echo json_encode($response);
  die();
}

if (!(strlen($phone) === 18)) {
    $response = [
      "status" => false,
      "message" => "Некорректный телефон",
      "type" => 1,
      "fields" => ['phone']
  ];
  echo json_encode($response);
  die();
}

// Проверка на правильность ввода почты

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response = [
        "status" => false,
        "message" => "Некорректный email",
        "type" => 1,
        "fields" => ['email']
    ];
    echo json_encode($response);
    die();
  }

  $pdo = get_PDO();

  $query = "INSERT INTO user_info (fio, address, phone, email) VALUES (:fio, :address, :phone, :email)";
  $params = [
      ':fio' => $fio,
      ':address' => $address,
      ':phone' => $phone,
      ':email' => $email
  ];
  $stmt = $pdo->prepare($query);
  try {
      $stmt->execute($params);
  } catch (\Exception $e) {
      die($e->getMessage());
  }
  

  $response = [
    "status" => true
  ];
  
  echo json_encode($response);
