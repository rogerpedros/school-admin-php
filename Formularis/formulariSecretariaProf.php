<?php
echo '<div class="mdl-card mdl-shadow--6dp">';
echo '<div class="mdl-card__title mdl-color--primary mdl-color-text--white">';
echo'<h2 class="mdl-card__title-text">Gestionar Profesors:</h2>';
echo'</div>';

echo '<div class="mdl-card__supporting-text">';
echo 'Per a introduir o actualizar un profesor cal omplir tot el formulari, per esborrar un profesor amb el DNI es suficient.';
echo '</div>';

echo'<div class="mdl-card__supporting-text">';

echo "<form  id='login' action='../Secretaria/SecretariaProf.php' method='post' accept-charset='UTF-8'>";
echo '<div class="mdl-textfield mdl-js-textfield">';
echo'<input class="mdl-textfield__input" type="text" name="profdni" id="profdni" autocomplete="off" />';
echo'<label class="mdl-textfield__label" for="profdni">DNI Profesor</label>';
echo'</div>';

echo '<div class="mdl-textfield mdl-js-textfield">';
echo'<input class="mdl-textfield__input" type="text" name="nom" id="nom" autocomplete="off" />';
echo'<label class="mdl-textfield__label" for="nom">Nom</label>';
echo'</div>';

echo '<div class="mdl-textfield mdl-js-textfield">';
echo '<input class="mdl-textfield__input" type="text" name="cognom" id="cognom" autocomplete="off" />';
echo '<label class="mdl-textfield__label" for="cognom">Cognom</label>';
echo '</div>';

echo '<div class="mdl-textfield mdl-js-textfield">';
echo '<input class="mdl-textfield__input" type="text" name="contra" id="contra" autocomplete="off" />';
echo '<label class="mdl-textfield__label" for="contra">Contrasenya</label>';
echo '</div>';


?>