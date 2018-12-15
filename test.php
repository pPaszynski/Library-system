<?php
//
//$films = ["Avengers", "Venom", "Deadpool 2", "Różowa Pantera"]; ?>
<!---->
<?php //foreach($films as $key=>$film): ?>
<!--    --><?php //if (strtoupper($film[$key]) == 'A'): ?>
<!--        <div>Film has already added to yput favourites. </div>-->
<!--    --><?php //endif; ?>
<?php //endforeach; ?>


<?php $films = ["Avengers", "Deadpool 2", "Venom", "Różowa Pantera"]; ?>

<?php foreach($films as $key=>$film): ?>
        <p><?= $key.' '.$films[count($films) - 1 - $key] ?></p>
<?php endforeach; ?>