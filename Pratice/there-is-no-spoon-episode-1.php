<?php
/**
 * Don't let the machines win. You are humanity's last hope...
 **/

fscanf(STDIN, "%d",
    $width // the number of cells on the X axis
);
fscanf(STDIN, "%d",
    $height // the number of cells on the Y axis
);

$matrix = array();

// Build the Matrix
for ($i = 0; $i < $height; $i++)
{
    $line = stream_get_line(STDIN, 31 + 1, "\n"); // width characters, each either 0 or .
    // error_log(var_export("$line", true));
    $matrix[] = str_split($line, 1);
    //error_log(var_export("-  new line = ".$line, true));
}

// Into the Matrix
for ($i = 0; $i < $height; $i++)
{
    error_log(var_export("- line = ".implode(",",$matrix[$i]), true));
    
    for ($j = 0; $j < $width; $j++)
    {
        // Origin Node: Cell
        $cell = $matrix[$i][$j];
        $origin_coord = "$j $i";
        error_log(var_export("cell $j =".$cell, true));
        
        if ($cell == "0")
        {
            // Node to the right
            $inc = 1;
            while ($j+$inc < $width && $matrix[$i][$j +$inc] != "0")
            {
               error_log(var_export("right ".($j +$inc)." $i=", true));
               
               $inc++;
            }
            if (($j +$inc) < $width && $matrix[$i][$j +$inc] == "0")
            {
               error_log(var_export("found = ".$matrix[$i][$j +$inc], true));
               $next_coord = "".($j +$inc)." $i";
            }else {
               error_log(var_export("NONE", true));
               $next_coord = "-1 -1";
            }
          
            
            // Node to the bottom
            $inc = 1;
            while ($i+$inc < $height && $matrix[$i +$inc][$j] != "0")
            {
               error_log(var_export("botm $j ".($i +$inc)."= ", true));
               
               $inc++;
            }
            
            if (($i +$inc) < $height && $matrix[$i  +$inc][$j] == "0")
            {
                error_log(var_export("found = ".$matrix[$i  +$inc][$j], true));
                $bottom_coord = "$j ".($i +$inc)."";
            }else{
                error_log(var_export("NONE", true));
                $bottom_coord = "-1 -1";
            }
            echo $origin_coord." ".$next_coord." ".$bottom_coord."\n";
        }

    }
    
}


// Write an action using echo(). DON'T FORGET THE TRAILING \n
// To debug (equivalent to var_dump): error_log(var_export($var, true));


// Three coordinates: a node, its right neighbor, its bottom neighbor

?>
