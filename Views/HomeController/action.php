<?php

include('../../Database.php');
//action.php

session_start();

if(isset($_POST["action"]))
{
	if($_POST["action"] == "add")
	{
		if(isset($_SESSION["order_cart"]))
		{
			$is_available = 0;
			foreach($_SESSION["order_cart"] as $keys => $values)
			{
				if($_SESSION["order_cart"][$keys]['product_id'] == $_POST["product_id"])
				{
					$is_available++;
					$_SESSION["order_cart"][$keys]['product_quantity'] = $_SESSION["order_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'product_id'                =>     $_POST["product_id"],
					'product_title'             =>     $_POST["product_title"],
                    'product_author'            =>     $_POST["product_author"],
                    'product_ISBN'              =>     $_POST["product_ISBN"],
					'product_quantity'          =>     $_POST["product_quantity"]
				);
				$_SESSION["order_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				'product_id'                =>     $_POST["product_id"],
				'product_title'             =>     $_POST["product_title"],
                'product_author'            =>     $_POST["product_author"],
                'product_ISBN'              =>     $_POST["product_ISBN"],
                'product_quantity'          =>     $_POST["product_quantity"]
			);
			$_SESSION["order_cart"][] = $item_array;
		}
	}

	if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["order_cart"] as $keys => $values)
		{
			if($values["product_id"] == $_POST["product_id"])
			{
				unset($_SESSION["order_cart"][$keys]);
			}
		}
	}

	if($_POST["action"] == 'empty')
	{
		unset($_SESSION["order_cart"]);
	}

	if($_POST["action"] == 'logOut')
	{
        session_unset();
        session_destroy();
    }

    if($_POST["action"] == 'setName')
	{
        echo $_SESSION['login'];
    }

    if($_POST["action"] == 'checkOut')
	{
        if(isset($_SESSION["order_cart"]))
        {
            $polaczenie = new Database();
            $pdo = $polaczenie->connect();

            foreach($_SESSION["order_cart"] as $keys => $values)
            {
                $sqlInsert = "INSERT INTO `orders` 
                              (`id_order`, `id_user`, `id_template`, `rental_date`, `return_date`) 
                              VALUES (NULL, '".$_SESSION["userID"]."', '".$values["product_id"]."', '".date('Y-m-d')."', '".date('Y-m-d', strtotime('+2 months')) ."')";
                if($pdo->exec($sqlInsert) === false)
                {
                    return false;
                }
            }
            return true;
        }else{
            return false;
        }
    }

    if($_POST["action"] == 'removeOrder')
	{
	    $polaczenie = new Database();
	    $pdo = $polaczenie->connect();

	    $sqlRemove = "DELETE FROM `orders` WHERE `orders`.`id_order` = '".$_POST["product_id"]."'";

	    if($pdo->exec($sqlRemove) === false)
	    {
	        return false;
	    }
	    return true;
	}

	if($_POST["action"] == 'removeUser')
	{
	    $polaczenie = new Database();
	    $pdo = $polaczenie->connect();

	    $sqlRemove = "DELETE FROM `users` WHERE `users`.`id_user` = '".$_POST["product_id"]."'";

	    if($pdo->exec($sqlRemove) === false)
	    {
	        return false;
	    }
	    return true;
	}

}

?>