<!DOCTYPE html>
<?php include("connect.php") ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <title>Document</title>
    <style>
        .a{
            color:#000080;
            font-size: 30px;
        }
        .y{
            background-color:#000080;
            height: 30px;
            color:white;
        }
        #a{
            
            background-color: grey;
            width:100%;
            height: 610px;
           
           
        }
        footer {
  text-align: center;
  padding: 3px;
  background-color:#000080;
  color: white;
  height: 30px;
  width: 100%;;
}
/* #t1{
    border:1px solid black;
} */
table, tr, td {
  border: 1px solid black;
  
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
<img src="img/logo.jpg" style="width: 40px;">
            </div>
            <div class="col-md-8">
<p class="a">EuroBuvettes</p>
<p style="color:#0000FF">Le site de gestion des buvettes de l'euro</p>
            </div>
        </div>
        <div class="row y" >
            <div class="col-md-2"></div>
            <div class="col-md-2"><a href="accueil.php" style="color: white;">Nouveutés</a></div>
            <div class="col-md-2"><a href="statistiques.php" style="color: white;">Statisitiques</a></div>
            <div class="col-md-2"><a href="recherchemembres.php" style="color: white;">Recherches membres</a></div>
            <div class="col-md-2"><a href="affectation.php" style="color: white;">Affectations</a></div>
            <div class="col-md-2"><a href="administrateur.php" style="color: white;">Admministrateur</a></div>
        </div>
        
        <?php
                        $req="SELECT m.idM `mid`, m.date, m.scoreA, m.scoreB ` scoreB`, a.pays as paysA, a.drapeau as
                         drapeauA, b.pays as paysB, b.drapeau as drapeauB , COUNT(*) nb_bo FROM `match` m, `equipe` a,
                          `equipe` b , `est_ouverte` eo where m.eqA=a.idE AND m.eqB=b.idE AND m.idM=eo.idM 
                          GROUP BY m.idM
                        "
                        ;
                        $result=mysqli_query( $idConnexion, $req);
                       ?>

                <table border="1" width="80%" align="center">
                        <tbody> 
                            <th>Date du match</th>
                            <th>Equipe A</th>
                            <th>Equipe B</th>
                            <th>Score</th>
                            <th> Buvette ouvertttes</th>
                            <th>Nombre de volontaires</th>
                          
                
                        </tbody>
                <?php
                while($row=mysqli_fetch_array($result)){
                    $requete_nbv="SELECT count(*)
                    FROM `match` m, `est_present` ep
                    WHERE m.idM=ep.idM
                    AND m.idM=".$row['mid'];
                    $res=mysqli_query($idConnexion, $requete_nbv);
                    $nbv=mysqli_fetch_array($res);


                    echo "
                    <tr>
                    <td>".
                   $row['date'].
                    " </td>
                    <td><img src=\"".$row['drapeauA']."\" alt=\"".$row['paysA']."\" height=\"50px\"/></td>
                    <td><img src=\"".$row['drapeauB']."\" alt=\"".$row['paysB']."\" height=\"50px\"/></td>
                    <td>".$row['scoreA']." -- " .$row['scoreB']."</td>
                    <td>".$row['nb_bo']."</td>
                    <td>".$nbv[0]."</td>
                    </tr>
                    ";
                }
                ?>
                </table>
    
        <footer></footer>
    </div>
</body>
</html>