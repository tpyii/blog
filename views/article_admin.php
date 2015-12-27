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
        
        <form method="post" action="index.php?action=<?=$_GET['action']?><?=$_GET['action'] != 'add' ? '&id='.$_GET['id'] : '' ?>" class="form-admin">

          <label>
            Заголовок
            <input type="text" name="title" value="<?=$title?>" class="form-item" autofocus required>
          </label>
          
          <label>
            Дата
            <input type="date" name="date" value="<?=$date?>" class="form-item" required>
          </label>
          
          <label>
            Содержимое
            <textarea name="content" class="form-item" required><?=$content?></textarea>
          </label>
          
          <input type="submit" value="Добавить" class="btn">
          
        </form>
      
      <footer>
        <p>
          Мой первый блог
          <br>Copyright &copy; 2015
        </p>
      </footer>
      
    </div>
  </body>
</html>