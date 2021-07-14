<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eduardo - Listagem</title>
</head>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .container {
    text-align: center;
    width: 100vw;
    min-height: 100vh;
    background-color: #04052e;
    padding-top: 40px;
    color: white;

  }

  .title {
    font-size: 36px;
    margin-bottom: 100px;
    color: white;

  }

  .input {
    width: 50%;
    border: none;
    border-radius: 5px;
    height: 30px;

  }

  .button {
    width: 20%;
    border: none;
    border-radius: 5px;
    height: 30px;
    background-color: #95fc47;
    color: white;

  }

  .label {
    margin-right: 50px;
    color: white;
  }

  .inputLabel {
    flex-direction: column;
  }

  .divLabel {
    margin-bottom: 10px;
  }
</style>

<body>
  <div class="container">
    <h1 class="title">Listagem</h1>
    <?php
    $query_users = "SELECT username, email FROM users";
    $rs = $conn->prepare($query_users);
    $rs->execute();
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
      echo "Nome:" . $row->username . "<br />";
      echo "Email:" . $row->email . "<br /><br />";
    };

    ?>
  </div>

</body>

</html>