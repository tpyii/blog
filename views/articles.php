<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Мой первый блог</title>
  </head>
  
  <body>
    <div class="container">
      <h1>Мой первый блог</h1>
      <div>

        <?php foreach($this->data as $article): ?>
        <div class="article">
          <h3><a href="?action=one&id=<?=$article->id?>"><?=$article->title?></a></h3>
          <em>Опубликовано: <?=$article->date?></em>
          <p><?=Text::substr($article->content)?></p>
        </div>
        <?php endforeach; ?>
        
      </div>
      
      <footer>
        <p>
          Мой первый блог
          <br>Copyright &copy; 2015
        </p>
      </footer>
      
    </div>
  </body>
</html>