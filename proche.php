
<?php
    require_once('bdd.php');
    $v1 = htmlspecialchars(doubleval($_GET['lat']));
    $v2 = htmlspecialchars(doubleval($_GET['long']));
    
    $sql = "SELECT nom, adresse, (3959 * acos( cos( radians($v1) ) * cos( radians(latitude) ) * cos( radians( longitude) - radians(
        $v2) ) + sin(radians($v1) ) * sin( radians(latitude)))) AS distance FROM pharmacies HAVING distance < 25 ORDER BY distance
        LIMIT 0, 20";

    $query = $bdd->prepare($sql);
    $query->execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0){
        foreach($results as $result){

?>

<style>
    #table{
        border: 1px solid black;
    }
    th, td{
        border: 1px solid black;
    }
</style>

<html>
<head>
<body>
    <table id="table">
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Distance</th>
        </tr>
        <tr>
            <td><?php echo htmlentities(($result->nom)); ?></td>
            <td><?php echo htmlentities(($result->adresse)); ?></td>
            <td><?php echo htmlentities(($result->distance)); ?></td>
        </tr>
    </table>
</body>
</head>
</html>

<?php
        }
    }

?>