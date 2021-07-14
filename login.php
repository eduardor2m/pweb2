<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eduardo - Login</title>
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
    height: 100vh;
    background-color: #04052e;
    padding-top: 40px;

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

  <?php
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if (!empty($dados['CadUser'])) {
    $empty_imput = false;
    $dados['pass'] = md5($dados['pass']);

    $dados = array_map('trim', $dados);
    if (in_array("", $dados)) {
      $empty_imput = true;

      echo "Error: necessário preencher todos os campos";
    } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
      $empty_imput = true;

      echo "Error: necessário preencher o campo com um email válido";
    }
    // var_dump($dados);
    if (!$empty_imput) {
      $query_user = "SELECT * FROM users WHERE email = email AND pass = pass";
      $cad_user = $conn->prepare($query_user);
      $cad_user->bindParam(':email', $dados['email'], PDO::PARAM_STR);
      $cad_user->bindParam(':pass', $dados['pass'], PDO::PARAM_STR);
      $cad_user->execute();
      if ($cad_user->rowCount()) {
        echo "Usuário cadastrado com sucesso!<br>";
        unset($dados);
      } else {
        echo "Error: Usuário não cadastrado!<br>";
      }
    }
  }

  ?>
  <div class="container">
    <h1 class="title">Login</h1>
    <form name="cad-user" method="POST" action="">
      <div class="inputLabel">
        <div class="divLabel">
          <label class="label">Email:</label>
        </div>
        <div class="divInput">
          <input class="input" type="email" name="email" id="email" placeholder="Email" value="
    <?php
    if (isset($dados['email'])) {
      echo $dados['email'];
    };
    ?>" /></br></br>
        </div>
      </div>
      <div class="inputLabel">
        <div class="divLabel">
          <label class="label">Password:</label>
        </div>
        <div class="divInput">
          <input class="input" type="password" name="pass" id="pass" placeholder="Password" value="
    <?php
    if (isset($dados['pass'])) {
      echo $dados['pass'];
    };
    ?>" /></br></br>
        </div>
      </div>

      <input class="button" type="submit" value="Cadastrar" name="CadUser" />
    </form>
  </div>

</body>

</html>