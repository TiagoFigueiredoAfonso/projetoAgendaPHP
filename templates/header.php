<?php

    include_once("config/url.php");
    include_once("config/process.php");//sempre que iniciar a página irá ter o processamento
    
    // limpa a mensagem
    if(isset($_SESSION['msg'])) {
        $printMsg = $_SESSION['msg']; //cria um variavel printmsg com o valor $_SESSION, para inserir no html
        $_SESSION['msg'] = ''; // depois será limpada a cada atualização da página
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos</title>
    
  
    
          <!-- LINKS DO CDNJS -->
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Meu CSS -->
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.jpg" alt="Agenda">
        </a>
        <div>
            <div class="navbar-nav">
                <a class="nav-link active" id="home-link" href="index.php">Agenda</a>
                <a class="nav-link active"  href="create.php">Adicionar Contato</a>
            </div>
        </div>
    </nav>