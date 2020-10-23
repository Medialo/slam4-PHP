<!DOCTYPE html>
<html>

    <body>
        <form class="form-horizontal" action="<?= $action ?>" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend><?= $pagetitle ?> </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Login">Login</label>  
                    <div class="col-md-4">
                        <?php if ($v->getLogin() == null): ?>
                            <input id="Immatriculation" name="login" type="text" placeholder="RDidier" class="form-control input-md" required="">
                        <?php else: ?>
                            <input id="Immatriculation" name="login" type="text" class="form-control input-md" value="<?= $v->getLogin() ?>" readonly>        
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Prénom">Prénom</label>  
                    <div class="col-md-4">


                        <?php if ($v->getName() == null): ?>
                            <input id="Couleur" name="name" type="text" placeholder="Didier" class="form-control input-md" required="">
                        <?php else: ?>
                            <input id="Couleur" name="name" type="text" class="form-control input-md" value="<?= $v->getName() ?>">       
                        <?php endif; ?>






                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Nom">Nom</label>  
                    <div class="col-md-4">


                        <?php if ($v->getFName() == null): ?>
                            <input  name="fname" type="text" placeholder="Raoul" class="form-control input-md" required="">
                        <?php else: ?>
                            <input  name="fname" type="text" class="form-control input-md" value="<?= $v->getFName() ?>"> 
                        <?php endif; ?>






                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-4 control-label" for="Email">Email</label>  
                    <div class="col-md-4">


                        <?php if ($v->getEmail() == null): ?>
                        <input  name="email" type="email" placeholder="...@gmail.com" class="form-control input-md" required="">
                        <?php else: ?>
                        <input  name="email" type="email" class="form-control input-md" value="<?= $v->getEmail() ?>"> 
                        <?php endif; ?>






                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="mot de passe">Mot de passe</label>  
                    <div class="col-md-4">
                        <?php if ($v->getLogin() == null): ?>
                            <input id="Immatriculation" name="mdp" type="password" class="form-control input-md" required="">
                            <input id="Immatriculation" name="mdp2" type="password" class="form-control input-md" required="">
                        <?php else: ?>
                            <input id="Immatriculation" name="mdp" type="password" class="form-control input-md" placeholder="***********"  >  
                            <input id="Immatriculation" name="mdp2" type="password" class="form-control input-md" placeholder="***********"  >
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (Session::is_admin()): ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="mot de passe">Mot de passe</label>  
                        <div class="col-md-4">

                            <input type="checkbox" value="1" id="scales" name="admin" <?php echo $v->getAdmin() ? "checked" : "" ?> >
                            <label for="scales">Admin</label>

                        </div>
                    </div>
                <?php endif; ?>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                    <div class="col-md-4">
                        <button id="singlebutton" type="submit" class="btn btn-primary">CrÃ©er</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </body>
</html>

