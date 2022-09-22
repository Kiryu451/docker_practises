<?php
$arr = explode(',', $_GET['arr']);

function insertion_Sort($arr)
{
	for($i=0;$i<count($arr);$i++){
		$val = $arr[$i];
		$j = $i-1;
		while($j>=0 && $arr[$j] > $val){
			$arr[$j+1] = $arr[$j];
			$j--;
		}
		$arr[$j+1] = $val;
	}
	return $arr;
}

$sort_arr = insertion_Sort($arr);
echo implode(',', $sort_arr);
?>