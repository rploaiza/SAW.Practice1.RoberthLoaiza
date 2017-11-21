<?php
    session_start();
    include ("includes/autenticado.php");
?>
<HTML>
    <HEAD>
        <title>Matrícula de asignaturas</title>
        <meta charset="UTF-8">
    </HEAD>
    <body>
    <center>
<?php        
    if (isset($_POST['Envio'])) {
        include ("includes/abrirbd.php");

        if (isset($_POST['IWVG'])) {
            $_SESSION['permisos'][0] = 'S';
        }
        if (isset($_POST['APAW'])) {
            $_SESSION['permisos'][1] = 'S';
        }
        if (isset($_POST['FEM'])) {
            $_SESSION['permisos'][2] = 'S';
        }
        if (isset($_POST['FENW'])) {
            $_SESSION['permisos'][3] = 'S';
        }
        if (isset($_POST['PHP'])) {
            $_SESSION['permisos'][4] = 'S';
        }
        if (isset($_POST['SAW'])) {
            $_SESSION['permisos'][5] = 'S';
        }

        $permisos = implode($_SESSION['permisos']);
        $sql = "UPDATE usuarios SET permisos = '{$permisos}' WHERE user ='{$_SESSION['user']}'";
        $resultado = mysqli_query($link, $sql);
        echo "<center>";
        echo ("<h3><b>Matrícula realizada correctamente:</h3></b>");
        if (isset($_POST['IWVG'])) {
            echo ("Ingeniería Web: Visión General <br>");
        }
        if (isset($_POST['APAW'])) {
            echo ("Arquitectura y Patrones para Aplicaciones Web <br>");
        }
        if (isset($_POST['FEM'])) {
            echo ("Front-end para Móviles <br>");
        }
        if (isset($_POST['FENW'])) {
            echo ("Front-end para Navegadores Web <br>");
        }
        if (isset($_POST['PHP'])) {
            echo ("Back-end con Tecnologías de Libre Distribución <br>");
        }
        if (isset($_POST['SAW'])) {
            echo ("Seguridad en Aplicaciones Web <br>");
        }

        echo ("<br><br><A href= 'MasterWeb.php'> Volver a inicio </A>");
    } else {  
?>
        <img src="logo.png" width= 120 height= 60>
        <br><br><br>
        <H2> Selecciona las asignaturas en que quieres matricularte </H2><BR><BR>
        <FORM name="matricula" method=post action="matricula.php">
            <TABLE>
                <TR>
                    <TD align=right><INPUT type="checkbox" name="IWVG" value="Si"></TD>
                    <TD align=left> Ingeniería Web: Visión General (IWVG)</TD>
                </TR>
                <TR>
                    <TD align=right><INPUT type="checkbox" name="APAW" value="Si"></TD>
                    <TD align=left> Arquitectura y Patrones para Aplicaciones Web (APAW)</TD>
                </TR>
                <TR>
                    <TD align=right><INPUT type="checkbox" name="FEM" value="Si"></TD>
                    <TD align=left> Front-end para Móviles (FEM)</TD>
                </TR>
                <TR>
                    <TD align=right><INPUT type="checkbox" name="FENW" value="Si"></TD>
                    <TD align=left> Front-end para Navegadores Web (FENW)</TD>
                </TR><TR>
                    <TD align=right><INPUT type="checkbox" name="PHP" value="Si"></TD>
                    <TD align=left> Back-end con Tecnologías de Libre Distribución (PHP)</TD>
                </TR><TR>
                    <TD align=right><INPUT type="checkbox" name="SAW" value="Si"></TD>
                    <TD align=left> Seguridad en Aplicaciones Web (SAW)</TD>
                </TR>
            </TABLE><BR>
            <INPUT type="hidden" name="firma">
            <INPUT type="submit" name="Envio" value="Enviar">
        </FORM>
<?php
    }
?>    
    </CENTER>
    </BODY>
</HTML>

