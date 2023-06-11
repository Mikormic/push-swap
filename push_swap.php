<?php
array_shift($argv);
$la = $argv;
$lb = array();
$functionName;
function sa(&$la)
{
    if (count($la) > 1) {
        $temp = $la[0];
        $la[0] = $la[1];
        $la[1] = $temp;
    }
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}
function sb(&$lb)
{
    if (count($lb) > 1) {
        $temp = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $temp;
    }
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}
function sc(&$la, &$lb)
{
    sa($la);
    sb($lb);
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}

function pa(&$la, &$lb)
{
    if (count($lb) > 0) {
        array_unshift($la, array_shift($lb));
    }
    $functionName = __FUNCTION__;
    echo " " . $functionName;
}
function pb(&$la, &$lb)
{
    if (count($la) > 0) {
        array_unshift($lb, array_shift($la));
    }
    $functionName = " " . __FUNCTION__;
    echo $functionName;
}
function ra(&$la)
{
    $la[] = array_shift($la);
    static $count = 0;
    $count++;
    if ($count === 1) {
        $functionName = __FUNCTION__;
    } else {
        $functionName = " " . __FUNCTION__;
    }
    echo $functionName;
}

function rb(&$lb)
{
    $lb[] = array_shift($lb);
    $functionName = " " . __FUNCTION__;
    echo $functionName;
}

function rr(&$la, &$lb)
{
    ra($la);
    rb($lb);
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}
function rra(&$la)
{
    $la = array_merge(array_splice($la, -1), $la);
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}
function rrb(&$lb)
{
    $lb = array_merge(array_splice($lb, -1), $lb);
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}
function rrr(&$la, &$lb)
{
    rra($la);
    rrb($lb);
    $functionName = __FUNCTION__ . " ";
    echo $functionName;
}

function push_swap(&$la, &$lb)
{
    if (count($la) > 1) {
        // for ($i=0; $i < count($la); $i++) {
        //     if ($la[$i] < $la[count($la)]){
        //         return;
        //     }
        // }
        while (!empty($la)) {
            $max_valueLA = max($la);
            while ($la[0] != $max_valueLA) {
                ra($la);
            }
            if ($la[0] == $max_valueLA) {
                pb($la, $lb);
            }
        }
        while (!empty($lb)) {
            $max_valueLB = max($lb);
            while ($lb[0] != $max_valueLB) {
                rb($lb);
            }
            if ($lb[0] == $max_valueLB) {
                pa($la, $lb);
            }
        }
    }
    else{
        return;
    }
}
push_swap($la, $lb);