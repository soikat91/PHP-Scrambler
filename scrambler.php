<?php
include_once("./functions.php");
   $task='encode';
   $originalKey='';
 if(isset($_GET['task']) && $_GET['task'] !=''){
    $task=$_GET['task'];
 }

//    $task='key';
   $key='abcdefghijklmnopqrstuvwxyz1234567890';
   
//    $originalKey=str_split($key); ///string ta k array korar jnno use kora hoyece
//         echo "<pre>";
//         print_r($originalKey);
//         exit();

 if('key'==$task){
        $originalKey=str_split($key); ///string ta k array korar jnno use kora hoyece
     
        shuffle($originalKey);
        $key=implode('',$originalKey);
 }elseif(isset($_POST['key']) && $_POST['key'] !=''){

     $key=$_POST['key'];
 } 
 

$scrambledData='';

 if('encode'==$task){
    $data=$_POST['data']??'';
    
    if(isset($_POST['data']) && $_POST['data'] !=''){
        $scrambledData=scramblerData($data,$key);//origanl data.... and key 
    }
 }

 if('decode'==$task){

    $data=$_POST['data']??'';
    if(isset($_POST['data']) && $_POST['data'] !=''){
        
        $scrambledData=decodeData($data,$key);
    }
 }
        



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
         
       <div class="container ">
          <div class="row text-center">

            <h1>Data Scrambler</h1>
            <p>Use this application for encyte your message</p>

            <div>
                <a href="scrambler.php?task=encode">Encode</a> |
                <a href="scrambler.php?task=decode">Decode</a> |
                <a href="scrambler.php?task=key">Generate Key</a>
            </div>
             
          </div>
          <div class="row">

                <form action="scrambler.php<?php if('decode'==$task){ echo "?task=decode"; }?>" method="post">
                    <label for="key">Key</label>
                    <input class="form-control" type="text" name="key" id="key" <?php displayKey($key)?>></br>
                    <label for="data">Data</label>
                    <textarea class="form-control" name="data" id="" cols="30" rows="10"><?php  if(isset($_POST['data'])){echo $_POST['data'];}?></textarea></br>
                    <label for="result">Result</label>
                    <textarea class="form-control" name="result" id="" cols="30" rows="10"><?php echo $scrambledData;?></textarea></br>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

          </div>

       </div>
   
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>