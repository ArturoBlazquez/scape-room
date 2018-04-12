<?php
    // Start the session
    session_start();
    
    
    $lista = array("Conforme", "briefcase", "Fuego", "fiso");
    
    if (!isset($_SESSION['minipuntos'])){
        $_SESSION['minipuntos'] = 0;
    }
    if (!isset($_SESSION['adivinadas'])){
        $_SESSION['adivinadas'] = array();
    }
    
    if (isset($_POST["boton0"])){$clicked=0;}
    else if (isset($_POST["boton1"])){$clicked=1;}
    else if (isset($_POST["boton2"])){$clicked=2;}
    else if (isset($_POST["boton3"])){$clicked=3;}
    else{$clicked=4;}
    
    
    $adivinadas=$_SESSION['adivinadas'];


    $actual = test_input($_POST["elemento".$clicked]);
    if($clicked==4){
    }else if ($actual==$lista[$clicked] && ! in_array($actual, $adivinadas)) {
        $_SESSION['minipuntos'] = $_SESSION['minipuntos']+1;
        array_push($adivinadas, $actual);
        $_SESSION['adivinadas']=$adivinadas;
    }
    
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function get_solved($num) {
        global $lista, $adivinadas;
        if(in_array($lista[$num], $adivinadas)){
            return "solved";
        }
    }
    
    //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    //session_destroy();
    
    
    if ($_SESSION['minipuntos'] == 4){
        print "936";
        return;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="css.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="<?php echo get_solved(0);?>" id="post0">
            <div class="imgcontainer">
                <img src="empty.png" alt="nothing" class="empty">
                <img src="Fuego.png" alt="img" class="avatar">
                <img src="right.png" alt="right" class="arrow" onclick="show1()">
            </div>
            <input type="text" name="elemento0" required>
            
            <button type="submit" name="boton0">Ok</button>
        </form>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="<?php echo get_solved(1);?>" id="post1" hidden>
            <div class="imgcontainer">
                <img src="left.png" alt="left" class="arrow" onclick="show0()">
                <img src="Aire.png" alt="img" class="avatar">
                <img src="right.png" alt="right" class="arrow" onclick="show2()">
            </div>
            <input type="text" name="elemento1" required>
            
            <button type="submit" name="boton1">Ok</button>
        </form>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="<?php echo get_solved(2);?>" id="post2" hidden>
            <div class="imgcontainer">
                <img src="left.png" alt="left" class="arrow" onclick="show1()">
                <img src="Tierra.png" alt="img" class="avatar">
                <img src="right.png" alt="right" class="arrow" onclick="show3()">
            </div>
            <input type="text" name="elemento2" required>
            
            <button type="submit" name="boton2">Ok</button>
        </form>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="<?php echo get_solved(3);?>" id="post3" hidden>
            <div class="imgcontainer">
                <img src="left.png" alt="left" class="arrow" onclick="show2()">
                <img src="Agua.png" alt="img" class="avatar">
                <img src="empty.png" alt="nothing" class="empty">
            </div>
            <input type="text" name="elemento3" required>
            
            <button type="submit" name="boton3">Ok</button>
        </form>

        <div id=minipuntos>
            <?php
                echo "Habéis acertado ";
                echo $_SESSION['minipuntos'];
                echo " de 4<br>";
            ?>
        </div>

        <script>
            function show0() {
                $("#post0").show()
                $("#post1").hide()
                $("#post2").hide()
                $("#post3").hide()
            }
            
            function show1() {
                $("#post0").hide()
                $("#post1").show()
                $("#post2").hide()
                $("#post3").hide()
            }
            
            function show2() {
                $("#post0").hide()
                $("#post1").hide()
                $("#post2").show()
                $("#post3").hide()
            }
            
            function show3() {
                $("#post0").hide()
                $("#post1").hide()
                $("#post2").hide()
                $("#post3").show()
            }
        </script>

        <?php
            if($clicked==0){
                echo "<script> show0(); </script>";
            } else if($clicked==1){
                echo "<script> show1(); </script>";
            } else if($clicked==2){
                echo "<script> show2(); </script>";
            } else if($clicked==3){
                echo "<script> show3(); </script>";
            }
        ?>

    </body>
</html>
