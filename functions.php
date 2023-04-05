<?php
function displayKey($key){   

        printf("value= '%s' ",$key);    
}

function scramblerData($orginalData,$key){

    $orginalkey='abcdefghijklmnopqrstuvwxyz1234567890';
    $data='';///data varibale a store krbo result
    $lenght=strlen($orginalData); //lenght check korbo original data theke 
    for($i=0;$i<$lenght;$i++){
        $currentChar=$orginalData[$i];   //string k array hisabe triat kora jay 
        $position=strpos($orginalkey,$currentChar);
        if($position !==false){
            $data .=$key[$position];
        }else
        {
            $data .=$currentChar;
        }

    }

    return $data;
}

function decodeData($orginalData,$key){

    $orginalkey='abcdefghijklmnopqrstuvwxyz1234567890';
    $data='';///data varibale a store krbo result
    $lenght=strlen($orginalData); //lenght check korbo original data theke 
    for($i=0;$i<$lenght;$i++){
        $currentChar=$orginalData[$i];   //string k array hisabe triat kora jay 
        $position=strpos($key,$currentChar);
        if($position !==false){
            $data .=$orginalkey[$position];
        }else
        {
            $data .=$currentChar;
        }

    }

    return $data;
}

// function decodeData($originalData,$key){

//     $orginalkey='abcdefghijklmnopqrstuvwxyz1234567890';
//     $data='';

//     $lenght=strlen($originalData);
    
//     for($i=0;$i<$lenght; $i++){
        
//         $currentChar=$originalData[$i];
//         $position=strpos($key,$currentChar);
//         if($position !== false){
//             $data .=$originalData[$position];
//         }else{
//             $data .=$currentChar;
//         }
//     }
// }