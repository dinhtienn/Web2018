<!DOCTYPE html>
<html>

<body>
<pre><?php
    $cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel","Ducati");
    $half = intval(sizeof($cars)/2) + 1;

    print_r($cars);
    print_r(array_chunk($cars,$half));
    print_r($cars);
    ?></pre>
<div>
    <?php foreach($cars as $item) {?>
        <div><?php echo $item[1]; ?></div>
    <?php } ?>
</div>



</body>
</html>