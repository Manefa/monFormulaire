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

    <div class="container-fluid bg-dark text-light">
        <div class="row">

            <?php
            $nom = "";
            $nomErreur = "";
            $motDePasse = "";
            $motDePasseErreur = "";
            $confirmMotDePasse = "";
            $confirmMotDePasseErreur = "";
            $email = "";
            $emailErreur = "";
            $avatar = "";
            $avatarErreur = "";
            $genre = "";
            $genreErreur = "";
            $date = "";
            $dateErreur = "";
            $transport = "";
            $transportErreur = "";

            $dateValidationRegex = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/"; 
            $erreur = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "POST";

                //Si on entre, on est dans l'envoie du formulaire

                

                // nom de l'usager

                if (empty($_POST['name'])) {
                    $nomErreur = "Le nom est requis";
                    $erreur = true;
                } else {
                    $nom = test_input($_POST["name"]);
                }

                // mot de passe

                if (empty($_POST['password'])) {
                    $motDePasseErreur = "Le password est requis";
                    $erreur = true;
                } else {
                    $motDePasse = test_input($_POST["password"]);
                    
                }

                // confirmation du mot de passe

                if (empty($_POST['confirmPassword'])) {
                    $confirmMotDePasseErreur = "Le confirmPassword est requis";
                    $erreur = true;
                } else {
                    $confirmMotDePasse = test_input($_POST["confirmPassword"]);
                    
                }

                // email 

                if (empty($_POST['email'])) {
                    $emailErreur = "Le email est requis";
                    $erreur = true;
                } else {
                    $email = test_input($_POST["email"]);
                    
                }

                // avatar

                if (empty($_POST['avatar'])) {
                    $avatarErreur = "Le avatar est requis";
                    $erreur = true;
                } else {
                    $avatar = test_input($_POST["avatar"]);
                    
                }

                // genre

                if (empty($_POST['genre'])) {
                    $genreErreur = "Le genre est requis";
                    $erreur = true;
                } else {
                    $genre = test_input($_POST["genre"]);
                    var_dump($genre);
                    
                }

                // date

                

                if (empty($_POST['date']) || preg_match($dateValidationRegex, $_POST['date']) == false) {
                    $dateErreur = "Le date est requis";

                } else {

                    $date = test_input($_POST["date"]);
                    
                }

                // transport

                if (empty($_POST['transport'])) {
                    $transportErreur = "Le transport est requis";
                    $erreur = true;
                } else {
                    $transport = test_input($_POST["transport"]);
        
                }

                // Inserer dans la base de données

                
                //SI erreurs, on réaffiche le formulaire 
            }
            if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
                //echo "Erreur ou 1ere fois";
                //echo $erreur;


            ?>
                <div class="col-md-6">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom Usager</label>
                            <input type="text" class="form-control" id="name" value="<?php echo $nom; ?>" name="name" >
                            <span style="color:red";><?php echo $nomErreur;?></span>
                            <br>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" value="<?php echo $motDePasse; ?>">
                            <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                            <span style="color:red";><?php echo $motDePasseErreur;?></span>
                            <br>
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php echo $confirmMotDePasse; ?>">
                            <span style="color:red";><?php echo $confirmMotDePasseErreur;?></span>
                            <br>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"  value="<?php echo $email; ?>">
                            <span style="color:red";><?php echo $emailErreur;?></span>
                            <br>
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="text" class="form-control" id="avatar" name="avatar" value="<?php echo $avatar; ?>">
                            <br>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" id="genreHomme" value="Homme" <?php echo($genre == "Homme") ? "checked" : "" ?> >
                        
                            <label class="form-check-label" for="genreHomme">
                                Homme
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" id="genreFemme" value="Femme" <?php echo ($genre == "Femme") ? "checked" : "" ?>>
                            
                            <label class="form-check-label" for="genreFemme">
                                Femme
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" id="genreNonGenre" value="Non genre" <?php echo($genre == "Non genre") ? "checked" : "" ?> >
                        
                            <label class="form-check-label" for="genreNonGenre">
                                Non-genre
                            </label>
                        </div>
                        <span style="color:red";><?php echo $genreErreur;?></span>
                        <br>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
                            <span style="color:red";><?php echo $dateErreur;?></span>
                            
                        </div>

                        <div class="mb-3">
                            <label for="transport" class="form-label">Moyen de transport</label>
                            <select class="form-select" id="transport" name="transport" aria-label="Default select example">
                                <option <?php echo ($transport == "Auto") ? "selected" : "" ?> value="Auto" >Auto</option>
                                <option <?php echo ($transport == "Autobus") ? "selected" : "" ?> value="Autobus">Autobus</option>
                                <option <?php echo ($transport == "Marche") ? "selected" : "" ?> value="Marche">Marche</option>
                                <option <?php echo ($transport == "Vélo") ? "selected" : "" ?> value="Vélo">Vélo</option>
                            </select>
                            <span style="color:red";><?php echo $transportErreur;?></span>
                            <br><br>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                

            <?php
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" || $erreur == false) {
                
            ?>

                <div class="col-md-6">

                
                <img src="<?php echo $avatar; ?>" class="" hei  alt="oups !!">
                
                    
                    
                    <h1><?php echo $nom; ?></h1>
                    <h1><?php echo $email; ?></h1>
                    <h1><?php echo $genre; ?></h1>
                
                </div>

            <?php
            }
            function test_input($data)
            {
                $data = trim($data);
                $data = addslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>