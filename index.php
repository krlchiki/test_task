<?php

require_once __DIR__ . '/php_vendor/helpers.php';


$news = getLastThreeNews();
?>  


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная страница</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="/css/news_page_style.css">
</head>
<body>
  <div class="wrapper">
    <div class="news_wrapper">
      <div class="news_conteiner">
        <h1>Главная страница</h1>
        <h3>Последние новости :</h3>
        <?php foreach ($news as $new): ?>
          <div class="news">
              <h3 class="title"><?= $new['title'] ?></h3>
              <div class="news_text">
                  <?php
                  // Получаем текст новости
                  $text = $new['text'];

                  // Ищем первое предложение в тексте
                  if (preg_match('/^.*?[.!?](\s|$)/u', $text, $matches)) {
                      $first_sentence = $matches[0];
                      echo '<p class="text">' . $first_sentence . '</p>';
                  } else {
                      // Если нет совпадений, выводим исходный текст
                      echo '<p class="text">' . $text . '</p>';
                  }
                  ?>
              </div>
              <h5 class="date"><?= $new['date'] ?></h5>
          </div>

        <?php endforeach; ?>
          <div class="button_container">
            <a href="form.php"><button class="btn">Обратная связь</button></a>
            <a href="news_page.php"><button class="btn">Все новости</button></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>