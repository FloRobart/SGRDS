<?php echo view('header'); ?>


<div class="row">
    <div class="col-md-8 offset-md-2 text-center my-5">
        <h1>Que voullez-vous faire ?</h1><br />
        <a href="<?php echo base_url(); ?>rattrapages_a_faire" class="btn btn-primary">Voir la liste des rattrapages à faire</a><br /><br /><br />
        <a href="<?php echo base_url(); ?>rattrapages_prog" class="btn btn-primary">Voir la liste des rattrapages programmés</a><br /><br /><br />
        <a href="<?php echo base_url(); ?>etudiants" class="btn btn-primary">Voir la liste des étudiants qui ont un rattrapage</a><br /><br /><br />
    </div>
</div>

<?php echo view('footer'); ?>