<?php
    session_start();
    include('conexao.php');
    $var = $_GET["chave"];

    $query = "select * from usuario where email = '$var'";
    $result = mysqli_query($conexao,$query);

    $gg = $result->fetch_object();

    if($gg->usuario_status == 1){
        $tipo = 1;
        $query_admin = "select * from usuario where email = '$var'";
        $res = mysqli_query($conexao,$query_admin);
    }else{
        $tipo = $gg->usuario_status;
        $query_admin = "select * from usuario";
        $res = mysqli_query($conexao,$query_admin);  
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>

<div class="container data_table">
    <div class="row button-azul">
        <?php if($tipo == 0){ ?>
            <a href="cadastrar.php">
                <button type="button" class="btn btn-primary">Cadastrar</button>
            </a>
        <?php } ?>
    </div>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $res->fetch_object()){
                ?>
                <tr>
                    <td><?php echo $row->usuario ?></td>
                    <td><?php echo $row->nome ?></td>
                    <td><?php echo $row->email ?></td>
                    <td><?php if($row->usuario_status == 0){ echo 'admin'; }else if($row->usuario_status == 1){ echo 'comum'; }else if($row->usuario_status == 2){ echo 'especial'; }?></td>
                    <?php if(($tipo == 2) && ($var == $row->email)){ ?>
                    <a href="editar.php?id=<?php echo $row->id?>">
                        <td><a href="editar.php?id=<?php echo $row->usuario_id?>"><button type="button" class="btn btn-warning">Editar</button></a> <a href="excluir.php?id=<?php echo $row->usuario_id?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
                    </a>
                    <?php }else if(($tipo == 1) || ($tipo == 0)) { ?>
                        <td><a href="editar.php?id=<?php echo $row->usuario_id?>"><button type="button" class="btn btn-warning">Editar</button></a> <a href="excluir.php?id=<?php echo $row->usuario_id?>"> <button type="button" class="btn btn-danger">Excluir</button></a></td>
                    <?php }else{?>
                        <td>NADA</td>
                    <?php } ?>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
</div>
</body>



<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "initComplete": function () {
            var api = this.api();
            api.$('td').click( function () {
                api.search( this.innerHTML ).draw();
            } );
        }
    } );
} );
</script>

</html>