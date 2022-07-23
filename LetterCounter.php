<?php

class LetterCounter {

	private $occurrences = array();
	private $result = "";
	
	public function countLettersInString($inputStr){

		$chars = str_split(strtolower($inputStr));
		foreach($chars as $char){
			if($char!=" "){
				if(!isset($this->occurrences[$char])){
    				$this->occurrences[$char] = 1;
    			}
    			else $this->occurrences[$char]++;	
			}
		}
		$total = count($this->occurrences);
		$index = 0;
		foreach($this->occurrences as $key=>$qty){
			$index++;
			$asterisks = str_repeat("*",$qty);
    		$this->result.="$key:$asterisks";
    		if($index<$total) $this->result.=",";
    	}
    	return $this->result;
	}

}


$LetterCounter = new LetterCounter();

$input = "WWIIS Services Ltd";
$output = $LetterCounter->countLettersInString($input);

echo "input: $input <br>"; 
echo "output: $output <br>";

$input = "Lorem Ipsum is simply dummy text of the printing and typesetting industry";
$output = $LetterCounter->countLettersInString($input);

echo "input: $input <br>"; 
echo "output: $output <br>";
