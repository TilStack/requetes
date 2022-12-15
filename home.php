<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        include_once './database.php';
        $_SESSION["active"] = false;
        $database = new Database();
        $db = $database->getConnection();
        $clientId=$_GET['idclient'];
        $value = $db->query("SELECT * FROM client where Id=".$clientId)->fetchAll(PDO::FETCH_OBJ);
        $sizeclient=sizeof($value);
        
        if($sizeclient>0){
            $_SESSION["active"] = true;
            $nameClient=$value[0]->nom;
            $rec = $db->query("SELECT * FROM produit ")->fetchAll(PDO::FETCH_OBJ);
            $totals = sizeof($rec);
        }else{
            $_SESSION["active"] = false;
        }
        
    ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-commerce</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./css/styles.css" rel="stylesheet" />
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Site E-commerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="./monpannier.php">Mon pannier</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="#">profile</a></li>
                        <li class="nav-item"><a class="nav-link"  href="./login.php">Déconnexion</a></li>
                    </ul>
                    
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                        <?php
                            echo('
                                <h3>   '.$nameClient.'</h3>
                            ');
                        ?>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage </p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">            
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php        
                        for($i = 0; $i <$totals; $i++ )
                            {
                                $image=base64_encode($rec[$i]->image);
                                echo('
                                <div class="col mb-5">
                        
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <center><a href="./productdetail.php?idclient='.$clientId.'&idproduit='.$rec[$i]->id.'&idvendeur='.$rec[$i]->vendeur.'" class="lien"><img class="card-img-top" src="data:image/jpg;charset=utf8;base64,'.$image.'"style="width: 200px; height: 200px; border-radius: 10px; margin-top:10px" alt="..." /></a>     </center>                               
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <a href="./productdetail.php?idclient='.$clientId.'&idproduit='.$rec[$i]->id.'&idvendeur='.$rec[$i]->vendeur.'"><h5 class="fw-bolder">'.$rec[$i]->nom.'</h5></a>
                                            <!-- Product price-->
                                            '.$rec[$i]->prix.'XAF
                                        </div>
                                        <div class="text-center">                                           
                                            Quantity
                                        </div>
                                        <div class="text-center">
                                            <input class="input100" type="number" name="number" placeholder="number">
                                        </div>
                                    </div>                                                  
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <center>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Add to Card</button>
                                            </div>
                                        </center>                                       
                                    </div>
                                </div>
                            </div>
                            ');
                            }
                        ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
            })
        })
        </script>
    </body>
</html>