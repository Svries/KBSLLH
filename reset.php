<!DOCTYPE html>
<html>
    <head>
        <?php include 'head.php'; ?>
    </head>
    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <div class="info">
            <?php
            include 'connection.php';
                
            // Was the form submitted?
            if (isset($_POST["ResetPasswordForm"]))
            {
                // Gather the post data
                $email = $_POST["email"];
                $password = $_POST["password"];
                $confirmpassword = $_POST["confirmpassword"];
                $hash = $_POST["q"];
                // Use the same salt from the forgot_password.php file
                $salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

                // Generate the reset key
                $resetkey = hash('sha1', $salt.$email);

                // Does the new reset key match the old one?
                    if ($resetkey == $hash)
                    {
                        if ($password == $confirmpassword)
                        {
                            if(strlen($password) > 7 && preg_match('/[0-9]/', $password)) 
                            {

                            //has and secure the password
                            $password = hash('sha1', $salt.$password);

                            // Update the user's password
                                $query = $con->prepare('UPDATE gebruiker SET password = :password WHERE email = :email');
                                $query->bindParam(':password', $password);
                                $query->bindParam(':email', $email);
                                $query->execute();
                                $con = null;
                            echo "Je wachtwoord is sucesvol gewijzigd.";
                            }
                            else 
                                echo "Het wachtwoord voldoet niet aan de minimale eisen";
                        }
                        else
                            echo "De wachtwoorden komen niet overeen.";
                    }
                    else
                        echo "De wachtwoord reset sleutel klopt niet.";
                }
            ?>
        </div> 
    </body>
</html>
