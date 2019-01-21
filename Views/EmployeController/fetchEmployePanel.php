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
                <th width="5%" align="center">ID</th>
                <th width="20%">Tytul</th>
                <th width="20%">Autor</th>
                <th width="15%">Czytelnik</th>
                <th width="15%">Data wypozy</th>
                <th width="15%">Data zwrotu</th>
                <th width="10%">Action</th>
            </tr>
          </thead>
        ';

    $query = "SELECT * FROM orders O
              INNER JOIN template T on O.id_template = T.id_template
              INNER JOIN users U on U.id_user = O.id_user
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
                <td>'.$row["login"].'</td>
                <td align="left">'.$row["rental_date"].'</td>
                <td align="left">'.$row["return_date"].'</td>
                <td><button class="btn btn-success btn-xs deleteOrder" id="'. $row["id_order"].'" onclick="deleteOrder()">Zrealizowane</button></td>
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
