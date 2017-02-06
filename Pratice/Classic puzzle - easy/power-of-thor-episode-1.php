<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 * ---
 * Hint: You can use the debug stream to print initialTX and initialTY, if Thor seems not follow your orders.
 **/

fscanf(STDIN, "%d %d %d %d",
    $lightX, // the X position of the light of power
    $lightY, // the Y position of the light of power
    $initialTX, // Thor's starting X position
    $initialTY // Thor's starting Y position
);

$MIN_X = 0;
$MIN_Y = 0;
$MAX_X = 40;
$MAX_Y = 18;
$moveTX = $initialTX;
$moveTY = $initialTY;
// game loop
while (TRUE)
{
    fscanf(STDIN, "%d",
        $remainingTurns // The remaining amount of turns Thor can move. Do not remove this line.
    );

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));
    $action = 0;
    
        $distX = $lightX - $moveTX;
        $distY = $lightY - $moveTY;
        
        if ($distX > 0 && $moveTX < $MAX_X){
            ++$moveTX;
            //$act1 = "S, NE, E, SE";
            if ($distY > 0 && $moveTY < $MAX_Y){
                ++$moveTY;
                $action = "SE";
            }else if ($distY < 0 && $moveTY > $MIN_Y){
                --$moveTY;
                $action = "NE";
            }else{
                $action = "E";
            }
        }else if ($distX < 0 && $moveTX > $MIN_X) {
            --$moveTX;
            if ($distY > 0 && $moveTY < $MAX_Y){
                ++$moveTY;
                $action = "SW";
            }else if ($distY < 0 && $moveTY > $MIN_Y){
                --$moveTY;
                $action = "NW";
            }else{
                $action = "W";
            }
        }else{
            if ($distY > 0 && $moveTY < $MAX_Y){
                ++$moveTY;
                $action = "S";
            }else if ($distY < 0 && $moveTY > $MIN_Y){
                --$moveTY;
                $action = "N";
            }else{
                $action = ""; // nothing ...
            }
        }
        
       
    
    
    // A single line providing the move to be made: N NE E SE S SW W or NW
    echo($action."\n");
}
?>
