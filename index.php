<?php 
error_reporting(0);
  echo $_GET['subject']; 
$target_dir = "C:\wamp64\www\upload"; /// <---------- Path ////
//////////////////////////////////////////////
$filename = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if(isset($_POST['submit'])){
 
 // Count total files
 $countfiles = count($_FILES['file']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'C:\wamp64\www\upload'.$filename);
 
 }
} 

$string = file_get_contents("C:/Users/MAROUA/Desktop/a/main.json");
 /// <---------- this will be saved at the same place where upload.php exists ////
for($i=0;$i<$countfiles;$i++){
    $fp = fopen('results.json', 'w');
    $filename = $_FILES['file']['name'][$i];

    $arr = json_decode($string, true);
    $filename = str_replace ("\\", "/",  $filename );
    $arr["assets"][$i]["src"] = "file:///C:/wamp64/www/upload". $filename;
   
    fwrite($fp, json_encode($arr,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    //fclose($fp);
    $string = file_get_contents("C:/wamp64/www/results.json");
   }
   $fp = fopen('results.json', 'w');
   $arr = json_decode($string, true);
   $username = $_POST['fname'];
   $arr["assets"][3]["value"] =$username;
   fwrite($fp, json_encode($arr,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
   //fclose($fp);
   $string = file_get_contents("C:/wamp64/www/results.json");

 /*  $output = exec('npm -v');
   var_dump($output);
   die('die');*/


?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="jumbotron text-center" style="background-color:black;">
        <img class="imagine1" src="try32.png" />

    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form form method='post' action='' enctype='multipart/form-data'>
                    <div class="form-group">
                      <label for="usr" style="color: azure; font-family: poppins;">Select image to upload:</label>
                      <input type="file" name="file[]" id="file" multiple style="width: auto;" class="btn btn-info" style="color: azure; font-family: poppins;">
                    </div>
                    <div class="form-group" >
                    <label for="fname" style="color: azure; font-family: poppins;">Your name:</label><br>
                    <input type="text" id="fname"  name="fname"style="width: auto;" style="color: azure; font-family: poppins;"><br>
                    </div>
                    <div class="form-group">
                      <label for="pwd" style="color: azure; font-family: poppins;">Submit</label>
                      <input type='submit' name='submit'  style="width: auto;" class="btn btn-info" style="color: azure; font-family: poppins;">
                    </div>
                    
                  </form>
            
            </div>
        </div>
    </div>
</body>
