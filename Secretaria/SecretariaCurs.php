<?php
error_reporting(E_ALL ^ E_NOTICE);
/**
 * Created by PhpStorm.
 * User: Roger Pedrós Villorbina
 * Date: 16/12/2016
 * Time: 3:38
 */

require_once("../Crud/PDOcrud.php");
require_once("../Crud/MySQLcrud.php");

session_start();
if(($_SESSION['loged'] == false) || ($_SESSION['loged'] == null)){
    echo '<h1> SESSIÓ O LOGIN INVALID </h1>';
    exit;
}

$BDconf = ["localhost", "root", "root", "escola"];
$MySQLi = new MySQLcrud($BDconf[0],$BDconf[1],$BDconf[2],$BDconf[3]);

$Cursos = $MySQLi->getTotsCursos();
$profesors = $MySQLi->getTotsProfesor();

?>

<html>
<head>
    <title>Gestio d'una escola.</title> <meta charset="utf-8">

    <!--MDL-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

    <link rel="stylesheet" href="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.css">
    <script defer src="https://cdn.rawgit.com/CreativeIT/getmdl-select/master/getmdl-select.min.js"></script>

    <!--Local Style-->
    <link rel="stylesheet" type="text/css" href="../Styles/PanelStyle.css">

</head>

<body>
<div class="mdl-layout mdl-js-layout mdl-color--grey-100">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">Secretaria - Cursos</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>

            </div>
        </header>
        <main class="mdl-layout__content">
            <div class="page-content">
                <!--GENERADOR TAULA-->
                <?php

                include("../Formularis/taulaSecretariaCursos.php");
                $iteracionsMax = count($Cursos);
                $i = 0;
                while($iteracionsMax > $i){
                    echo '<tr>';
                    echo '<td>' . $Cursos[$i][nom_curs] . '</td>';
                    echo '<td>' . $Cursos[$i][profesor] . '</td>';
                    echo '</tr>';
                    $i++;
                }
                echo '</tbody>';
                echo '</table>';

                include("../Formularis/formulariSecretariaCursos.php");

                echo '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">';
                echo '<input class="mdl-textfield__input" id="prof" name="prof" value="" type="text" readonly tabIndex="-1" data-val="BLR"/>';
                    echo '<label class="mdl-textfield__label" for="country">Profesor</label>';
                echo '<ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu" for="prof">';
                foreach ($profesors as $data){
                    echo '<li class="mdl-menu__item">'.$data[DNI_Profesor]. '</li>';
                }
                echo '</ul>';
                echo '</div>';

                include("../Formularis/IntroActuDel.php");

                echo '<div class="mdl-card__actions mdl-card--border">';
                echo '<button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" name="Submit"> Dale';
                echo '</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';

                if(isset($_POST['curs'])){
                    if(($_POST['options'])== "Eliminar"){
                        echo $MySQLi->deleteCurs($_POST['curs']);
                    }
                }
                if(isset($_POST['curs']) && isset($_POST['prof'])){
                    if(($_POST['options'])== "Introduir"){
                        echo $MySQLi->fillCurs($_POST['prof'], $_POST['curs']);
                    }

                    if(($_POST['curs'])== "Actualitzar"){
                        echo $MySQLi->updateCurs($_POST['prof'], $_POST['curs']);
                    }

                } else{
                    echo 'Falta introduir dades';
                }
                ?>

        </main>
    </div>
</div>
</body>
</html>
