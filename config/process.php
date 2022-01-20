<?php

session_start(); // iniciar a sessão

$contacts = []; //iniciando os contatos como array

include_once("conection.php"); // conectar o banco
include_once("url.php"); // apontar a base url

// INSERIR DADOS
$data = $_POST;

// MODIFICAÇÕES NO BANCO
if(!empty($data)) {

    //print_r($data);// exit; encerra a execução do programa, teste

    // Criar contato
    if($data["type"] === "create") {
       // echo "Criar dado"; para testar se está caindo aqui mesmo

       $name = $data["name"];
       $phone = $data["phone"];
       $observations = $data["observations"];

       $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

       $stmt = $conn->prepare($query);

       $stmt->bindParam(":name", $name);
       $stmt->bindParam(":phone", $phone);
       $stmt->bindParam(":observations", $observations);

       // copiar o try catch do conection

       try {

       $stmt->execute();
       $_SESSION["msg"] = "Contato criado com sucesso!";
    
        }catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        } 
    } else if($data["type"] === "edit") {
        // atualizando dados

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data["id"];

        $query = "UPDATE contacts 
                  SET name = :name, phone = :phone, observations = :observations 
                  WHERE id = :id";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);


        // copia o try de novo
        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com sucesso!";
         
        }catch(PDOException $e) {
                 // erro na conexão
                 $error = $e->getMessage();
                 echo "Erro: $error";
        }

    }else if($data["type"] === "delete") {
        $id = $data["id"];

        $query = "DELETE FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        
        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com sucesso!";
         
        }catch(PDOException $e) {
                 // erro na conexão
                 $error = $e->getMessage();
                 echo "Erro: $error";
        }
    }

    // após o cadastro, redireciona a página inicial
    header("Location:" . "../index.php");


} else {
    // start
    // PREPARANDO SELEÇÃO DE DADOS

$id;

if(!empty($_GET)) { // GET retorna informações
    $id = $_GET["id"];
}

// CRIANDO A LÓGICA DE UM RETORNO DE CONTATO
    if(!empty($id)) {

        $query = "SELECT * FROM contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id" , $id); // o id que vem do GET

        $stmt-> execute();

        $contact = $stmt->fetch(); // um array com as propriedades e valores o id

    } else {

    $query = "SELECT * FROM contacts";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchAll(); //seleciona tudo

    }
    //end
}

// FECHAR CONEXÃO PDO
$conn = null;


