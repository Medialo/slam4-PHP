
<!DOCTYPE html>
<html>

    <body>
        <form class="form-horizontal" action="index.php?action=connected&controller=utilisateur" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend><?= $pagetitle ?> </legend>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Login">Login</label>  
                    <div class="col-md-4">

                            <input id="Marque" name="login" type="text" placeholder="Raoul" class="form-control input-md" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="mot de passe">Mot de passe</label>  
                    <div class="col-md-4">
                       
                       
                        <input id="Immatriculation" name="mdp" type="password" class="form-control input-md" placeholder="***********" required="">
                    
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton"></label>
                    <div class="col-md-4">
                        <button id="singlebutton" type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </body>
</html>


