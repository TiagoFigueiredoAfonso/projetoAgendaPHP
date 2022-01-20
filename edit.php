<?php
    include_once("templates/header.php");
?>
    <div id="container">
        <?php include_once("templates/backbtn.html");?>
        <h1 id="main-title">Editar Contato</h1>

        <form id="create-form" action="config/process.php" method="POST">

            <!-- ESSE INPUT VAI GUIAR PARA O PROCESS O QUE QUERO FAZER COM ENVIO DESSE FORMULÁRIO, UPDATE, DELETE ETC.. -->
            <input type="hidden" name="type" value="edit">
            <!--Cada campo receberá o value $contact-->
            <input type="hidden" name="id" value="<?= $contact['id']?> ">


            <div class="form-group">
                <label for="name">Nome do contato:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite seu nome" value="<?= $contact['name']?>" required >
            </div>

            <div class="form-group">
                <label for="phone">Telefone do contato:</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite seu telefone" value="<?= $contact['phone']?>" required >
            </div>

            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea type="text" class="form-control" name="observations" id="observations" placeholder="Insira as observações" rows="3"><?= $contact['observations']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
    
<?php
    include_once("templates/footer.php");
?>

