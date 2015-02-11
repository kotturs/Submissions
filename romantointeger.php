<?php 
    $pixelsArr = array(
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
    foreach($numArr as $position=>$value){
    	if($position == 'th'){
    		$finVal .=  str_repeat('M',$value);
    		$barCode .= str_repeat('<div style="width:'.$pixelsArr['M'].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>',$value);
    		continue;
    	}else if($position == 'hu'){
    		$onesNotation = 'C'; $fivesNotation = 'D'; $tensNotation = 'M';    		
    	}else if($position == 'te'){
    		$onesNotation = 'X'; $fivesNotation = 'L'; $tensNotation = 'C';
    	}else if($position == 'on'){
    		$onesNotation = 'I'; $fivesNotation = 'V'; $tensNotation = 'X';
    	}
    	switch ($value){
    		case "0" :
    			$finVal .= str_repeat($tensNotation,$value);
			case "1" : 
            case "2" :
            case "3" :
            	$finVal .= str_repeat($onesNotation,$value);
            	$barCode .= str_repeat('<div style="width:'.$pixelsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>',$value);
				break;
            case "4" :
            	$finVal .= $onesNotation.$fivesNotation;
            	$barCode .= '<div style="width:'.$pixelsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				$barCode .= '<div style="width:'.$pixelsArr[$fivesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				break;
            case "5" :
            	$finVal .= $fivesNotation;
            	$barCode .= '<div style="width:'.$pixelsArr[$fivesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				break;
            case "6" :
            case "7" :
            case "8" :
            	$value -= 5;
            	$finVal .= $fivesNotation.str_repeat($onesNotation,$value);
            	$barCode .= '<div style="width:'.$pixelsArr[$fivesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';$barCode .= str_repeat('<div style="width:'.$pixelsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>',$value);
				break;
            case "9" :
            	$finVal .= $onesNotation.$tensNotation;
            	$barCode .= '<div style="width:'.$pixelsArr[$onesNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				$barCode .= '<div style="width:'.$pixelsArr[$tensNotation].';background:#000;display:block;height:15px;float:left;margin-right:3px;"></div>';
				break;
        }
    }
    echo '<tr><td>Roman Value</td><td> : </td><td>'.$finVal.'</td></tr>'; 
    
    echo '<tr><td>Barcode</td><td> : </td><td>'.$barCode.'</td></tr></table>';
