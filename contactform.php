
<?php
/*
Template Name: contactform
*/
?>
<?php get_header(); ?>


<?php

global $wpdb;

$idjob = $_GET['idjob'];

$dataxx = $wpdb->get_results("SELECT * FROM `wp_recmmv_posts` WHERE `ID` = '$idjob'");

?>


<div class="container">
        <div class="row">
            <div class="col-md-12 " id="form_container">
                <h2> Candidature <?php echo $dataxx[0]->post_title;?>    </h2>
                <p id="messagep"> Veuillez renseigner tous les champs obligatoires <span  class="span_champ">(*)</span> </p>
                <form role="form" method="post" id="reused_form" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name" class="label_form"> Votre nom & prénom <span  class="span_champ">(*)</label>
                            <input type="text" class="form-control" id="nom" name="nom"required pattern="^[A-Za-z '-]+$" maxlenght="40">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email" class="label_form"> Votre E-mail <span  class="span_champ">(*)</label>
                            <input type="email" class="form-control" id="E-mail" name="E-mail" required pattern="[a-zA-z0-9.-]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="numéro de téléphone" class="label_form"> Votre numéro de téléphone <span  class="span_champ">(*) </label>
                            <input type="tel" class="form-control" id="numéro de téléphone" name="numéro de téléphone" required>
                        </div>
                    </div>
                    <div class="row ">

                        <div class="col-sm-6 form-group">
                            <label for="Référence" class="label_form"> Référence</label>
                            <input type="number" class="form-control" id="Référence" name="Référence" value="<?php echo $_GET['idjob'];?>"  required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="Ttite" class="label_form"> Titre de poste</label>
                            <input type="text" class="form-control" id="Titre de poste" name="Titre de poste" required   value="<?php echo $dataxx[0]->post_title;?>">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name" class="label_form"> Votre lettre de motivation <span  class="span_champ">(*) </label>
                            <br />
                            <input type="file" placeholder="Téléverser un fichier" name="motivation" accept="application/pdf"
                                class="form-control" required>

                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name" class="label_form"> Votre CV <span  class="span_champ">(*)</label>
                            <br />
                            <input type="file" name="CV" accept="application/pdf" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="message" class="label_form"> Message: <span  class="span_champ">(*)</label>
                            <textarea style="height: 30vh;" class="form-control" type="textarea" id="message" name="message"  required pattern="^[A-Za-z '-]+$"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group" style="padding-top: 10px;">
                            <button type="submit" class="btn  pull-right">Envoyer &rarr; </button>
                        </div>
                    </div>
                </form>
                <div id="success_message" style="width:100%; height:100%; display:none; margin-bottom: 133px; ">
                    <h3>Votre demande a été envoyée avec succès.</h3>
                </div>
                <div id="error_message" style="width:100%; height:100%; display:none; ">
                    <h3>Erreur</h3> Désolé, une erreur s'est produite lors de l'envoi de votre formulaire.
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 


 
<?php get_sidebar(); ?>
<?php get_footer(); ?>