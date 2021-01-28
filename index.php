<?php 
    include('connect.php'); 
?>

<html>
<head>
    <title>SENSOR</title>
    <style> 
       .table_titles, .table_cells_odd, .table_cells_even
       {
                padding-right : 90px;
                padding-left : 90px;
                color :  #000;
       }
        .table_titles {
            color : #FFF;
            background-color : #666;
        }
        .table_cells_odd {
            background-color : #CCC;
            text-align:center;
        }
        .table_cells_even {
            background-color : #FAFAFA;
            text-align:center;
            
        }
        table {
            border : 2px solid #333;
        }
        body 
        { 
            font-family : Trebuchet MS, Arial; 
        }
    </style>
</head>

    <body>
        <center><h1>Muestra de datos obtenidos</h1></center>
        <center><table border="0" cellspacing="0" cellpadding="8">
     <tr>
            <td class="table_titles">ID</td>
            <td class="table_titles">Temperatura</td>
            <td class="table_titles">Humedad</td>
          </tr></center>
<?php

require("connect.php");

    $tabla = "datos";
    $query = "SELECT * FROM $tabla ORDER BY id ASC";
    $result = mysqli_query($con,$query);
    $oddrow = true;
    while( $row = mysqli_fetch_array($result) )
    {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr>';
        echo '   <td'.$css_class.'>'.$row["id"].'</td>';
        echo '   <td'.$css_class.'>'.$row["temperatura"].' C°</td>';
        echo '   <td'.$css_class.'>'.$row["humedad"].'%</td>';
        echo '</tr>';
    }
?>
    </table>
    </body>
</html>