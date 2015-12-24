<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Мой первый блог</title>
  </head>
  
  <body>
    <div class="container">
      <h1>Мой первый блог</h1>
      <div>
        <a href="index.php?action=add">Добавить статью</a>
        <table class="articles_admin">
          <thead>
            <tr>
              <th>Дата</th>
              <th>Заголовок</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach($data as $article): ?>
            <tr>
              <td><?=$article->date?></td>
              <td><?=$article->title?></td>
              <td><a href="index.php?action=edit&id=<?=$article->id?>">Редактировать</a></td>
              <td><a href="index.php?action=delete&id=<?=$article->id?>">Удалить</a></td>
            </tr>
            <?php endforeach ?>
            
          </tbody>
        </table>
        
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