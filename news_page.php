<?php

require_once __DIR__ . '/php_vendor/helpers.php';


$news = getNews();
?>  


<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Страница с новостями</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="/css/news_page_style.css">
</head>
<body>
  <div class="wrapper">
    <div class="news_wrapper">
      <div class="news_conteiner">
        <h1>Новости</h1>

        <?php foreach ($news as $new): ?>

          <div class="news">

            <h3 class = "title"><?= $new['title']?></h3>
            <div class="news_text">
              <p class="text"><?= $new['text']?></p>
            </div>
            <h5 class = "date"><?= $new['date']?></h5>
            
          </div>
        <?php endforeach; ?> 
        <div class="button_container">
            <a href="index.php"><button class="btn">На главную</button></a>
          </div>
        </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>