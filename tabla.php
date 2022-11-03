<?php
    $link = new mysqli('db', 'root', 'test', 'user');
    $error = $link -> connect_errno;
    if ($error != null) {
        echo "<p>El error número: $error</p>";
        echo "<p>El error dice: $link->connect_error </p>";
        die(); //Parar la ejecución;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border-style: solid;
            border-width: 1px;
            padding: 2.5px;
        }
    </style>
</head>
<body>
    <h1>Usuarios</h1>
    <table>
        <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Activo</th>
        </thead>
        <?php
            $sql = "SELECT * FROM usuario";
            $usuarios = $link->query($sql);
            $list = $usuarios->fetch_array();
            while($list !== null){
        ?>
        <tr>
            <td><?=$list['Id']?></td>
            <td><?=$list['Nombre']?></td>
            <td><?=$list['Fecha']?></td> 
            <td><?=$list['Activo']?></td>
        </tr>
        <?php
                $list = $usuarios->fetch_array();
            }
        ?>
    </table>
</body>
</html>
<?php
  $link->close();
?>