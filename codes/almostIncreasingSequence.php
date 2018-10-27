<?php
/*
 *Given a sequence of integers as an array, determine whether it is possible to obtain a strictly 
 *increasing sequence by removing no more than one element from the array.
 */
$sequence = [1, 3, 2];
almostIncreasingSequence($sequence);

function almostIncreasingSequence($sequence) {
    $newArray = $sequence;
    $sizeSequence = count($sequence);
    $posExcluida = 0;
    unset($newArray[$posExcluida]);
    $almostIncreasingSequence = true;
    foreach($newArray as $key => $number){
        if($key == $sizeSequence -1){
            if($almostIncreasingSequence){
                return true;
            }
            $almostIncreasingSequence = true;
            $posExcluida++;
            $newArray = $sequence;
            unset($newArray[$posExcluida]);
            unset($prevNumber);
            reset($newArray);
        }
        if(isset($prevNumber) && $prevNumber >= $number){
            $almostIncreasingSequence = false;
            break;
        }
        $prevNumber = $number;
        if($posExcluida == $sizeSequence -1){
            break;
        }
    }
}

function almostIncreasingSequence($sequence) {
    $sizeSequence = count($sequence);
    for($i=0;$i<$sizeSequence;$i++){
        $almostIncreasingSequence = true;
        $newArray = $sequence;
        unset($newArray[$i]);
        unset($prevNumber);
        foreach($newArray as $number){
            if(isset($prevNumber) && $prevNumber >= $number){
                $almostIncreasingSequence = false;
                break;
            }
            $prevNumber = $number;
        }
        if($almostIncreasingSequence){
            return true;
        }
    }
    return false;
}