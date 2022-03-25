<?php
session_start();
if(!isset($_SESSION['loggedin'])){
   header("Location:Login.php");
}
?>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <script src="drop_hover.js"></script>

    <script type="text/javascript">
        function profits()
        {
            var sw = true;
            var si = document.getElementById("si").value;
            var m = document.getElementById("m").value;
            var pc = document.getElementById("pc").value;
            var pprv = document.getElementById("pprv").value;
            var ppiv = document.getElementById("ppiv").value;
            var nt = document.getElementById("nt").value;
            document.getElementById("si").innerHTML = si;
            document.getElementById("m").innerHTML = m;
            document.getElementById("pc").innerHTML = pc;
            document.getElementById("pprv").innerHTML = pprv;
            document.getElementById("ppiv").innerHTML = ppiv;
            document.getElementById("nt").innerHTML = nt;
        } 
        function doc()
        {
            document.write(input);
        }
    </script>
</head>

<body onload="profits()">
        <script type="text/javascript">
            function showTable()
            {
                if(document.getElementById('hw-table').style.display !== 'none')
                {
                    document.getElementById('hw-table').style.display = 'none';
                }
                else 
                {
                    document.getElementById('hw-table').style.display = 'block';
                }
            }
        </script>
        <div class="butoane">        
              
                
                    <div class="home">
                        <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
                    </div>
            
                
            
                    <div class="logout">
                        <a class="acc_btn"><button style='margin-right: 7px;'><img src="user2.png" alt="logout" width="46px" height="46px"></button></a>
                        <ul id="btn_list">
                            <li>
                                <a><button onclick="showTable()">Strategiile mele</button>
                            </li>
                            <li>
                                <a href='includes/logout.inc.php'><button>Log out</button></a>
                            </li>
                        </ul>
                    </div>
              
        </div>
        <?php
            require_once "includes/dbh.inc.php";
            if (isset($_SESSION['userid']))
            {
                $uid=$_SESSION['userid'];
            }
            $query = "SELECT * FROM strategii WHERE user=$uid";
            $result = mysqli_query($conn,$query);
            echo "<div id=\"hw-table\">";
                echo "<table>";
                    echo "<tr style=\"border-bottom: 1px solid black;>\"><td> Suma de inceput </td> <td> Multiplicator </td> <td> Rata de castig </td><td> Take profit</td><td> Stop loss</td><td> Numar de trade-uri </td></tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        $hid=$row['ind'];
                        echo "<tr><td>" . $row['si'] . "</td><td>" . $row['m'] . "</td><td>" . $row['pc'] . "</td><td>" . $row['pprv'] . "</td><td>" . $row['ppiv'] . "</td><td>" . $row['nt'] . "</td></tr>";
                    }           

                echo "</table>";
            echo "</div>";
            mysqli_close($conn);
        ?>
        <center>
         <div class="data-calc">
            <form action="includes/newstrat.inc.php" method="post">
                  
                     <label for="si">Suma Initiala</label>
                     <input name="si" id="si" placeholder="Suma..." type="number" min="0" step="0.01">
                  
                     <label for="m">Multiplicator</label>
                     <input name="m" id="m" placeholder="Multiplicatorul..." type="number" min="0" step="0.01">
                  
                  
                     <label for="pc">Procentaj Castig</label>
                     <input name="pc" id="pc" placeholder="Procentajul..." type="number" type="number" min="0" step="1">
                  
                  
                     <label for="pprv">Procentaj Profit Vanzare</label>
                     <input name="pprv" id="pprv" placeholder="Take profit..." type="number" min="0" step="0.01">
                  
                  
                     <label for="ppiv">Procentaj Pierdere Vanzare</label>
                     <input name="ppiv" id="ppiv" placeholder="Stop loss..." type="number" min="0" step="0.01">
                  
                  
                     <label for="nt">Numar de Tranzactii</label>
                     <input name="nt" id="nt" placeholder="Nr. de tranzactii..." type="number" min="0" step="1">
                     
                     <div class="butoane_calc">
                        <button style='margin-left: 13px;'type="submit"; name="Submit">Calculeaza</button>
                        <button style='margin-left: 13px;'type="submit"; name="Save">Salveaza datele</button>
                     </div>
            </form>
         </div>
                </center>

         
         <?php
        if(isset($_GET["error"]))
        {
            if($_GET["error"]== "emptyaddinput")
            {
                echo '<script>alert("Va rugam completati toate campurile!")</script>';
            }
        }
        ?>
</body>
</html>