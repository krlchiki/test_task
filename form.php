<?php

require_once __DIR__ . '/php_vendor/helpers.php';

// var_dump(getUserInfo()) ;
?>  


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Форма обратной связи</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="/css/form_style.css">
</head>
<body> 
  <div class="wrapper">
    <div class="form_wrapper">
      <div class="form_container">
        <h1 class="form_title">Форма обратной связи</h1>
        <form class="form_body" >
          <div class="input_container">
            <label for="fio" class="label_input">*ФИО</label>
            <input type="text" class="form_input " name="fio" id="fio" placeholder="Иван Иванович Иванов" >
          </div>
          <div class="input_container">
            <label for="address" class="label_input">*Адрес</label>
            <input type="text" class="form_input" name="address" id="address" placeholder="г. Тамбов, ул. М. Горького, 17/129" >
          </div>
          <div class="input_container">
            <label for="phone" class="label_input">*Телефон</label>
            <input type="tel" class="form_input phone_input" name="phone" id="phone" placeholder="+7 (999) 999-99-99" >
          </div>
          <div class="input_container">
            <label for="email" class="label_input">*E-mail</label>
            <input type="email" class="form_input" name="email" id="email" placeholder="example@mail.ru" >
          </div>
          <div class="button_container">
            <button type="submit" class="btn_submit" id="btn">Отправить</button>
          </div>
          <div class="error_message_container">
            <p class="msg none"></p>
          </div>
        </form>    
        
        <h6 class="required_field">* Поле обязательно для заполнения </h6> 
      </div>          
    </div>
    <div class="table_container hidden" id="table_container"></div>

      
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script defer src ="../js/form_script.js"></script>

</body>
</html>
