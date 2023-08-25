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

    <div class="container-fluid">
        <div class="row">

            <?php
            $nom = "";
            $motdepasse = "";
            $confirmmotdepasse = "";
            $email = "";
            $avatar = "";
            $genre = "";
            $date = "";
            $transport = "";

            $nomerreur = "";
            $erreur = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "POST";
                //Si on entre, on est dans l'envoie du formulaire

                if (empty($_POST['name'])) {
                    $nomErreur = "Le nom est requis";
                    $erreur = true;
                } else {
                    $nom = test_input($_POST["name"]);
                }

                //

                if (empty($_POST['password'])) {
                    $nomErreur = "Le password est requis";
                    $erreur = true;
                } else {
                    $motdepasse = test_input($_POST["password"]);
                }

                //

                if (empty($_POST['confirmPassword'])) {
                    $nomErreur = "Le confirmPassword est requis";
                    $erreur = true;
                } else {
                    $confirmmotdepasse = test_input($_POST["confirmPassword"]);
                }

                //

                if (empty($_POST['email'])) {
                    $nomErreur = "Le email est requis";
                    $erreur = true;
                } else {
                    $email = test_input($_POST["email"]);
                }

                //

                if (empty($_POST['avatar'])) {
                    $nomErreur = "Le avatar est requis";
                    $erreur = true;
                } else {
                    $avatar = test_input($_POST["avatar"]);
                }

                //

                if (empty($_POST['exampleRadios'])) {
                    $nomErreur = "Le genre est requis";
                    $erreur = true;
                } else {
                    $genre = test_input($_POST["exampleRadios"]);
                }

                //

                if (empty($_POST['date'])) {
                    $nomErreur = "Le date est requis";
                    $erreur = true;
                } else {
                    $date = test_input($_POST["date"]);
                }

                //

                if (empty($_POST['transport'])) {
                    $nomErreur = "Le transport est requis";
                    $erreur = true;
                } else {
                    $transport = test_input($_POST["transport"]);
                }

                // Inserer dans la base de données
                //SI erreurs, on réaffiche le formulaire 
            }
            if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
                echo "Erreur ou 1ere fois";
                echo $erreur;


            ?>
                <div class="col-md-3">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Nom Usager</label>
                            <input type="text" value="<?php echo $name ?>" class="form-control" id="exampleInputName" name="name" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" mame="password">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="ConfirmPassword1" name="confirmPassword">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputConfirmPassword1" class="form-label">Avatar</label>
                            <input type="text" class="form-control" id="ConfirmPassword1" name="avatar">
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                homme
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                femme
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                            <label class="form-check-label" for="exampleRadios3">
                                Non-genre
                            </label>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="exampleInputConfirmPassword1" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="ConfirmPassword1" name="date">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputConfirmPassword1" class="form-label">Moyen de transport</label>
                            <select class="form-select" name="transport" aria-label="Default select example">
                                <option selected value="Auto">Auto</option>
                                <option value="Autobus">Autobus</option>
                                <option value="Marche">Marche</option>
                                <option value="Vélo">Vélo</option>
                            </select>
                        </div>



                        <br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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