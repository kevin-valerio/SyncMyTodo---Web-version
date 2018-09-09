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
                <h1 class="mt-5">Regardes tous tes todo ici !</h1>
                <p class="lead">Utilise le menu pour voir chacun de tes todo</p>
				<br><br><br><br><br><br><br><br><p size="small">Codé par Kevin VALERIO</p>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>