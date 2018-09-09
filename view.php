<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="favicon.ico" />

    <title>SyncMyTodo</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">SyncMyTodo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                         <span class="sr-only">(current)</span>
                       </a>
                    </li>
                     <?php

					function endsWith($haystack, $needle) {
						return substr($haystack,-strlen($needle))===$needle;
					}

                    if ($handle = opendir('.')) {
 
                      while (false !== ($entry = readdir($handle))) {
                    
                        if ($entry != "." && $entry != ".." && endsWith($entry, ".txt")) {
                    
                          echo '<li class="nav-item"><a class="nav-link" href="view.php?i=' . str_replace('.txt', '', $entry) . '">' .  str_replace('.txt', '', $entry) . '</a></li>';
                        }
                      }
                    
                      closedir($handle);
                    }
                    ?>


                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="mt-5">Ton 'todo' apparait ci-dessous :</h3><br><hr><br>
                
				<?php
				
				$todo = $_GET['i'] . '.txt';				 
				//$fh = fopen($todo, 'r');
				//$pageText = fread($fh, 25000);
				
				$block =1024*1024;//1MB or counld be any higher than HDD block_size*2
				if ($fh = fopen($todo, "r")) { 
					$left='';
					while (!feof($fh)) {// read the file
					   $temp = fread($fh, $block);  
					   $fgetslines = explode("\n",$temp);
					   $fgetslines[0]=$left.$fgetslines[0];
					   if(!feof($fh) )$left = array_pop($lines);           
					   foreach ($fgetslines as $k => $line) {
						   
						   if($line[0] == '=' && $line[1] == '=' && $line[2] == '='){
							   echo "<b>" . nl2br($line) . "</b>";
						   }
						   else{
							echo nl2br($line);
						   }
						}
					 }
				}
				fclose($fh);
 
 				
				?>

            </div>
			<br><hr><br>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>