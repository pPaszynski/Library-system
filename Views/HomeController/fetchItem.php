<?php

include('../../Database.php');

session_start();
$polaczenie = new Database();
$pdo = $polaczenie->connect();

if(isset($_SESSION['enabled']))
{
    if(isset($_POST["action"]))
    {
        $search = $_POST["search_text"];
        $query = "SELECT * FROM template
              WHERE title LIKE '%".$search."%'or author LIKE '%".$search."%'
              ORDER BY id_template DESC";
    } else{
        $query = "SELECT * FROM template ORDER BY id_template DESC";
    }


    $statement = $pdo->prepare($query);

    if($statement->execute())
    {
        $result = $statement->fetchAll();
        $output = '';
        foreach($result as $row)
        {
            $output .= '
		<div class="col-md-4" style="margin-top:12px;">  
            <div class="card" align="center">
               	<img src="http://home.dev/LibrarySystemv1/LibrarySystem/Textures/'.$row["image"].'" class="img-responsive" /><br />
                <div class="card-body">
                    <h5 class="card-title">'.$row["title"].'</h5>
                    <p class="card-text">'.$row["author"].'</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">'.$row["type"].'</li>
                    <li class="list-group-item">'.$row["country"].'</li>
                    <li class="list-group-item">'.$row["ISBN"].'</li>
                </ul>
                <input type="hidden" name="quantity" id="quantity'.$row["id_template"].'" value="1" />
            	<input type="hidden" name="hidden_title" id="title'.$row["id_template"].'" value="'.$row["title"].'" />
            	<input type="hidden" name="hidden_author" id="author'.$row["id_template"].'" value="'.$row["author"].'" />
            	<input type="hidden" name="hidden_ISBN" id="ISBN'.$row["id_template"].'" value="'.$row["ISBN"].'" />
                <div class="card-body">
                    <input type="button" name="add_to_cart" id="'.$row["id_template"].'" class="btn btn-success form-control add_to_cart" value="Add to Cart"/>
                </div>
            </div>
        </div>
		';
        }
        echo $output;
    }

}else{
    header('Location: '.'?page=login');
}


?>