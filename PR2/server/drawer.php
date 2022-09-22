<html lang="en">

<head>
    <title>Drawer</title>
    <link rel="stylesheet" href="Style/styl.css" type="text/css" />
</head>

<body>

<?php 
    // 1190 - circle
    // 1900 - rect
    // 2219 - polygon 
    
    $num = $_GET["num"];
    $form_int = $num & 3; // 0011
    $num = $num >> 2;
    $color_int = $num & 3; // 0011
    $num = $num >> 2;
    $width_int = $num & 15; // 1111
    $num = $num >> 4;
    $height_int = $num & 15; // 1111
    
    $form = 'rect';
    $color = 'green';
    $width = '100';
    $height = '100';

    
    if ($form_int <= 1){
        $form = 'rect';
    } else if ($form_int == 2){
        $form = 'circle';
    } else{
        $form = 'polygon';
    }

    if ($color_int == 0){
        $color= 'red';
    } else if ($color_int == 1){
        $color = 'green';
    } else if ($color_int == 2){
        $color = 'blue';
    } else{
        $color = 'black';
    }

    if ($width_int <= 1){
        $width = '100';
    } else if ($width_int <= 2){
        $width = '200';
    } else if ($width_int <= 4){
        $width = '300';
    } else if ($width_int <= 6){
        $width = '400';
    } else if ($width_int <= 8){
        $width = '500';
    } else if ($width_int <= 10){
        $width = '600';
    } else if ($width_int <= 12){
        $width = '700';
    } else if ($width_int <= 14){
        $width = '800';
    } else {
        $width = '900';
    }

    if ($height_int <= 1){
        $height = '100';
    } else if ($height_int <= 2){
        $height = '200';
    } else if ($height_int <= 4){
        $height = '300';
    } else if ($height_int <= 6){
        $height = '400';
    } else if ($height_int <= 8){
        $height = '500';
    } else if ($height_int <= 10){
        $height = '600';
    } else if ($height_int <= 12){
        $height = '700';
    } else if ($height_int <= 14){
        $height = '800';
    } else {
        $height = '900';
    }


    if ($form == 'circle'){
        $radius = min($width, $height) / 2;
        echo '<svg version="1.1"
            width="'.$width.'" height="'.$height.'"
            >
                <circle cx="'.($width / 2).'" cy="'.($height / 2).'" r="'.$radius.'" fill="'.$color.'"/>
        </svg>';
    } else if ($form == 'rect'){
        echo '<svg version="1.1"
            width="'.$width.'" height="'.$height.'"
            >
                <rect width="'.$width.'" height="'.$height.'" fill="'.$color.'"/>
        </svg>';
    } else {
        echo '<svg version="1.1"
            width="'.$width.'" height="'.$height.'"
            >
                <polygon points="0, '.$height.' '.($width / 2).', 0 '.$width.', '.$height.'" fill="'.$color.'"/>
        </svg>';
    }

?>


</body>

</html>