<?php
    include_once("templates/header.php");
?>
   <div class="container">
   
       <?php if(isset($printMsg) && $printMsg != ''): ?><!--trazendo variavel de msg -->
            <p id="msg" <?= $printMsg ?>></p>
        <?php endif; ?> 
        <h1 id="main-title">Minha Agenda</h1>
        <?php if(count($contacts) > 0): ?> <!-- se contatos for > zero faço algo-->

            <!--AQUI FICA O HTML APRESENTANDO OS CONTATOS-->
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <!--vai imprimir os dados com td do html-->
                            <td scope="row" class="col-id" ><?= $contact["id"]?></td>
                            <td scope="row"><?= $contact["name"]?></td>
                            <td scope="row"><?= $contact["phone"]?></td>

                            <!-- AQUI FICAM OS BOTÕES -->
                            <td class="actions">
                                <a href="show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye ckeck-icon"></i></a>
                                <a href="edit.php?id=<?= $contact["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                                <!-- form dentro do button pra excluir -->
                                <form class="delete-form" action="config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contact["id"] ?>">
                                <button type="submit" class="delet-btn">
                                    <i class="fas fa-times delete-icon"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <!-- Aqui fica a página quando não houver contatos -->
            <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="create.php">Clique aqui para adicionar</a></p>
        
        <?php endif; ?>    
   </div>
<?php
    include_once("templates/footer.php");
?>
    
