<?php 
    $pxsArr = array(
        'I' => '1px',
        'V' => '3px',
        'X' => '5px',
        'L' => '7px',
        'C' => '9px',
        'D' => '11px',
        'M' => '13px'
    );
    $Number = rand(0,4000);
    echo '<table><tr><td>Selected Number</td><td> : </td><td>'.$Number.'</td></tr>';
    $ones = $Number % 10;
    $Number = $Number / 10; 
    $tens = $Number % 10 ;
    $Number =  $Number / 10;
    $hundreds = $Number % 10;
    $Number =  $Number / 10;
    $thousands = $Number % 10;
    $numArr = array('th'=>$thousands,'hu'=>$hundreds,'te'=>$tens,'on'=>$ones);
    $finVal = '';
    $barCode = '';
    $onesNotation = '';
    $fivesNotation = ''; 
    $tensNotation = '';
    foreach($numArr as $pos=>$val){
    	if($pos == 'th'){
    		$finVal .=  str_repeat('M',$val);
    		$barCode .= str_repeat('<div style="width:'.$pxsArr['M'].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>',$val);
    		continue;
    	}else if($pos == 'hu'){
    		$onesNotation = 'C'; $fivesNotation = 'D'; $tensNotation = 'M';    		
    	}else if($pos == 'te'){
    		$onesNotation = 'X'; $fivesNotation = 'L'; $tensNotation = 'C';
    	}else if($pos == 'on'){
    		$onesNotation = 'I'; $fivesNotation = 'V'; $tensNotation = 'X';
    	}
    	switch ($val){
    		case "0" :
    			$finVal .= str_repeat($tensNotation,$val);
			case "1" : 
            case "2" :
            case "3" :
            	$finVal .= str_repeat($onesNotation,$val);
            	$barCode .= str_repeat('<div style="width:'.$pxsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>',$val);
				break;
            case "4" :
            	$finVal .= $onesNotation.$fivesNotation;
            	$barCode .= '<div style="width:'.$pxsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div><div style="width:'.$pxsArr[$fivesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				break;
            case "5" :
            	$finVal .= $fivesNotation;
            	$barCode .= '<div style="width:'.$pxsArr[$fivesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				break;
            case "6" :
            case "7" :
            case "8" :
            	$val -= 5;
            	$finVal .= $fivesNotation.str_repeat($onesNotation,$val);
            	$barCode .= '<div style="width:'.$pxsArr[$fivesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>'.str_repeat('<div style="width:'.$pxsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>',$val);
				break;
            case "9" :
            	$finVal .= $onesNotation.$tensNotation;
            	$barCode .= '<div style="width:'.$pxsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div><div style="width:'.$pxsArr[$tensNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				break;
        }
    }
    echo '<tr><td>Roman Value</td><td> : </td><td>'.$finVal.'</td></tr>'; 
    
    echo '<tr><td>Barcode</td><td> : </td><td>'.$barCode.'</td></tr></table>';
