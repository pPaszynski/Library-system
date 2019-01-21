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
                <th width="20%">Rola</th>
                <th width="20%">Login</th>
                <th width="20%">Email</th>
                <th width="20%">Aktywność</th>
                <th width="15%">Action</th>
            </tr>
          </thead>
        ';

    $query = "SELECT * FROM users U 
                INNER JOIN role R on R.id_role = U.id_role 
                WHERE U.id_role NOT LIKE '1' 
                ORDER BY U.id_user ASC 
                ";



    $statement = $pdo->prepare($query);

    if($statement->execute())
    {
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
            if($row["enable"] == 1){
                $enable = 'aktywny';
            }else{
                $enable = 'nieaktywny';
            }
            $output .= '
            <tr>
                <td align="left">'.$row["id_user"].'</td>
                <td>'.$row["rola"].'</td>
                <td>'.$row["login"].'</td>
                <td>'.$row["email"].'</td>
                <td align="center">'.$enable.'</td>
                <td><button class="btn btn-danger btn-xs deleteUser" id="'.$row["id_user"].'">Usuń</button></td>
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
