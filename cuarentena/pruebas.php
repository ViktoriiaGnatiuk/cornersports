
<!DOCTYPE html>
<html>
    <head>
        <title>TITULO</title>
        <meta charset="UTF-8"/>
        <script>
            var clicks=0;
        function incrementar(){
            clicks = clicks+1;
            document.getElementById('contador').innerHTML= clicks;
        }
        function decrementar(){
            if(clicks>0){
                clicks = clicks-1;
                document.getElementById('contador').innerHTML= clicks;
            }
        }
        </script>
    </head>
    <body>
        <?php
        $i=0;
            while($i < 3){
                $html = <<<EOF
                    <button class="boton" onclick='document.getElementById("label$i").innerHTML++'>+</button>
                    <p id="label$i">1</p>
                EOF;
                echo $html;
                ++$i;
            }
            
        ?>
        <button class="boton" onclick="incrementar()">+</button>
        <button class="boton" onclick="decrementar()">-</button>
        <p id="contador">0</p>
    </body>
</html>