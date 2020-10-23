<!DOCTYPE html>
<html>

    <body>
        <form class="form-horizontal" action="<?= $action ?>" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend><?= $pagetitle ?> </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Immatriculation">Id</label>  
                    <div class="col-md-4">
                        <?php if ($v->getId() == null): ?>
                            <input id="Immatriculation" name="id" type="text" placeholder="RDidier" class="form-control input-md" required="">
                        <?php else: ?>
                            <input id="Immatriculation" name="id" type="text" class="form-control input-md" value="<?= $v->getId() ?>" readonly>        
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="Point de dÈpart">Point de depart</label>  
                    <div class="col-md-4">
                        <?php if ($v->getPointDeDepart() == null): ?>
                            <input id="Immatriculation" name="pdt" type="text" placeholder="Paris" class="form-control input-md" required="">
                        <?php else: ?>
                            <input id="Immatriculation" name="pdt" type="text" class="form-control input-md" value="<?= $v->getPointDeDepart() ?>">        
                        <?php endif; ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="Point de dÈpart">Point de depart</label>  
                    <div class="col-md-4">
                        <?php if ($v->getPointDarriver() == null): ?>
                            <input id="Immatriculation" name="pd" type="text" placeholder="Marseille" class="form-control input-md" required="">
                        <?php else: ?>
                            <input id="Immatriculation" name="pd" type="text" class="form-control input-md" value="<?= $v->getPointDarriver() ?>">        
                        <?php endif; ?>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Date">Date</label>  
                    <div class="col-md-4">
                        <?php if ($v->getDatet() == null): ?>
                            <input type="date" class="form-control input-md" name="datet" >
                        <?php else: ?>
                            <input type="date" class="form-control input-md" name="datet" value="<?= $v->getDatet() ?>" >
                        <?php endif; ?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="Nombre de palce">Nombre de place</label>  
                    <div class="col-md-4">
                        <?php if ($v->getNbPlaces() == null): ?>
                            <input type="number" class="form-control input-md" name="nbp" >
                        <?php else: ?>
                            <input type="number" class="form-control input-md" name="nbp" value="<?= $v->getNbPlaces() ?>" >
                        <?php endif; ?>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="Prix de la course">Prix de la course</label>  
                    <div class="col-md-4">
                        <?php if ($v->getPrice() == null): ?>
                            <input class="form-control input-md" name="prix" >
                        <?php else: ?>
                            <input class="form-control input-md" name="prix" value="<?= $v->getPrice() ?>" >
                        <?php endif; ?>
                    </div>
                </div>


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Marque">Nom conducteur</label>  
                    <div class="col-md-4">


                        <select name="cl" id="pet-select">





                        <?php
                        foreach ($tab_u as $u):
                            if (empty($u->getLogin()))
                                echo "<p>Utilisateur sans login!";
                            else {
                                ?>

                                <option value="<?= $u->getLogin() ?>" <?php if ($v->getConducteur_login() != null && $v->getConducteur_login() == $u->getLogin()) {
                            echo "selected";
                        } ?> > <?= $u->getName() ?></option>





                                <?php
                            }
                        endforeach;
                        ?> 


                      
                        </select>








                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                    <div class="col-md-4">
                        <button id="singlebutton" type="submit" class="btn btn-primary">Cr√©er</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </body>
</html>


