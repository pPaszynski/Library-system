<?php

include('../../Database.php');

session_start();

if(isset($_SESSION['enabled']))
{
    $polaczenie = new Database();
    $pdo = $polaczenie->connect();

    $output = '
    <div class="table-responsive" id="order_table">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
                <th width="10%" align="center">ID</th>
                <th width="25%">Tytul</th>
                <th width="25%">Autor</th>
                <th width="20%">Data wypozyczenia</th>
                <th width="20%">Data zwrotu</th>
            </tr>
          </thead>
        ';

    $query = "SELECT * FROM orders O
              INNER JOIN template T on O.id_template = T.id_template
              WHERE O.id_user = '".$_SESSION["userID"]."'
              ORDER BY O.rental_date DESC";



    $statement = $pdo->prepare($query);

    if($statement->execute())
    {
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            $output .= '
            <tr>
                <td align="left">'.$row["id_order"].'</td>
                <td>'.$row["title"].'</td>
                <td>'.$row["author"].'</td>
                <td align="left">'.$row["rental_date"].'</td>
                <td align="left">'.$row["return_date"].'</td>
            </tr>
            ';
        }
    }
    $output .= '</table></div>';
    //echo json_encode($output);
    echo $output;

}else{
    header('Location: '.'?page=login');
}
