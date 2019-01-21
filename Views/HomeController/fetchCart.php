<?php

session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
	<table class="table table-bordered table-striped">
		<tr>  
            <th width="30%">Tytuł</th>  
            <th width="30%">Autor</th>  
            <th width="20%">ISBN</th>  
            <th width="5%">Ilość</th>  
            <th width="5%">Action</th>  
        </tr>
';
if(!empty($_SESSION["order_cart"]))
{
	foreach($_SESSION["order_cart"] as $keys => $values)
	{
		$output .= '
		<tr>
			<td>'.$values["product_title"].'</td>
			<td>'.$values["product_author"].'</td>
			<td align="right">'.$values["product_ISBN"].'</td>
			<td align="right">'.$values["product_quantity"].'</td>
			<td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
		</tr>
		';
        $total_item = $total_item + $values["product_quantity"];
	}
}
else
{
	$output .= '
    <tr>
    	<td colspan="5" align="center">
    		Your Cart is Empty!
    	</td>
    </tr>
    ';
}
$output .= '</table></div>';
$data = array(
	'cart_details'		=>	$output,
    'total_item'		=>	$total_item
);	

echo json_encode($data);
//echo $output;


?>