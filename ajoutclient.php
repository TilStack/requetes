<?php
     if (isset($_POST['btnsave'])) {	
      $fname= $_POST['nom'];
      $lname= $_POST['prenom'];
      $pnumber= $_POST['phone'];
      $email= $_POST['email'];
      $password= $_POST['pass'];
	  $localisation=$_POST['ville'];
	  $client = $db->query('SELECT * from client')->fetchAll(PDO::FETCH_OBJ);
      $size3 = sizeof($client);
	  $q="INSERT INTO client (Id, nom, prenom, telephone, localisation, email, password) VALUES ($size3+1, '$fname', '$lname', '$pnumber', '$localisation', '$email', '$password')";
      $db->exec($q); 
      echo('good');}
    ?>
   <center>
        <div class="tm-block-col tm-col-account-settings">
        <div class="tm-bg-primary-dark tm-block tm-block-settings">
            <h2 class="tm-block-title">Client</h2>
            <form action="" class="tm-signup-form row" method="POST">
            <div class="form-group col-lg-6">
                <label for="name">Name</label>
                <input
                    id="nom"
                    name="nom"
                    type="text"
                    class="form-control validate"
                />
            </div>
            <div class="form-group col-lg-6">
                <label for="email">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                />
            </div>
            <div class="form-group col-lg-6">
                <label for="password">Password</label>
                <input
                    id="pass"
                    name="pass"
                    type="password"
                    class="form-control validate"
                />
            </div>
            <div class="form-group col-lg-6">
                <label for="password2">Localisation</label>
                <input
                id="localisation"
                name="ville"
                type="text"
                class="form-control validate"
                />
            </div>
            <div class="form-group col-lg-6">
                <label for="phone">Phone</label>
                <input
                id="phone"
                name="phone"
                type="tel"
                class="form-control validate"
                />
            </div>
            <div class="form-group col-lg-6">
                <label for="password2">Prenom</label>
                <input
                id="prenom"
                name="prenom"
                type="text"
                class="form-control validate"
                />
            </div>
            <div class="col-12">
                <button
                name="btnsave"
                type="submit"
                class="btn btn-primary btn-block text-uppercase"
                >
                Create a Client
                </button>
            </div>
            </form>
        </div>
        </div>
    </center>