<!DOCTYPE html>
<html>
    <body>
        <form class="form-horizontal" action="<?= $action ?>" method="POST">
            <fieldset>

                <!-- Form Name -->
                <legend><?= $pagetitle ?> </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Immatriculation">Immatriculation</label>  
                    <div class="col-md-4">
                        <?php if($v->getImmatriculation() == null): ?>
                        <input id="Immatriculation" name="Immatriculation" type="text" placeholder="FR764FR" class="form-control input-md" required="">
                        <?php else: ?>
                        <input id="Immatriculation" name="Immatriculation" type="text" class="form-control input-md" value="<?=  $v->getImmatriculation()  ?>" readonly>        
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Couleur">Couleur</label>  
                    <div class="col-md-4">
                        
                        
                        <?php if($v->getCouleur() == null): ?>
                       <input id="Couleur" name="Couleur" type="text" placeholder="Rouge" class="form-control input-md" required="">
                        <?php else: ?>
                        <input id="Couleur" name="Couleur" type="text" class="form-control input-md" value="<?=   $v->getCouleur()  ?>">       
                        <?php endif; ?>
                        
                        
                        
                        
                        

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Marque">Marque</label>  
                    <div class="col-md-4">
                        
                        
                        <?php if($v->getMarque() == null): ?>
                       <input id="Marque" name="Marque" type="text" placeholder="Renault" class="form-control input-md" required="">
                        <?php else: ?>
                          <input id="Marque" name="Marque" type="text" class="form-control input-md" value="<?=  $v->getMarque() ?>"> 
                        <?php endif; ?>
                        
                        
                        
                        
                      

                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="singlebutton">Single Button</label>
                    <div class="col-md-4">
                        <button id="singlebutton" type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </body>
</html>


