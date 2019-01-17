<?php
/*****Created by Sujeeth, Tanmai, Sarath *****/

function validateString($string){
	if(!empty($string) && !ctype_space($string) and ctype_alpha($string)){
		return true;
	} else {
			return false;	
	}//end If.	
}//end validate string function.

function validateNumber($number){
	if(is_numeric($number)){ //not empty and input is digits.
		return true;
	} else {
		return false;
	}//end IF.
	}//end validate number function.
	
	?>