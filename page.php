<style>
    .button{
        width: 500px;
        background-color: blue;
        border: none;
        color: while;
        padding: 15px 32 px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 25px;
        margin: 150px 400px;
        cursor: pointer;
    }
</style>
<head>
<body onload="getLocation()">
    <script type="text/javascript">
        function showPosition(position){
            document.getElementById("lats").value=+position.coords.latitude;
            document.getElementById("longs").value=+position.coords.longitude;
        }

        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }
    </script>

    <form action="" method="POST">
        <input type="hidden" name="lats" id="lats">
        <input type="hidden" name="longs" id="longs">
        <button class="button" type="submit" name="subm" id="subm">Endroit le plus proche</button>
    </form>

    <?php
        if(isset($_POST['subm'])){
            $l1 = $_POST['lats'];
            $l2 = $_POST['longs'];

            header("Location: proche.php?lat=$l1&long=$l2");

        }

        
?>
</body>
</head>
