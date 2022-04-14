<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        $totalharta = $anakL = $anakP = $bapak = $ibu = $suami = $istri = $kakek = $nenek = $sisaAnakL = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $totalharta = $_POST['totalharta'];
            $anakL = $_POST['anakL'];
            $anakP = $_POST['anakP'];
            $bapak = $_POST['bapak'];
            $ibu = $_POST['ibu'];
            $suami = $_POST['suami'];
            $istri = $_POST['istri'];
            $kakek = $_POST['kakek'];
            $nenek = $_POST['nenek'];
        }
        // anak laki-laki
        if ($anakL >= 1 && $anakP = 0 && $suami=0){
            $sisaAnakL= $anakL * $totalharta-$bapak-$ibu-$istri-$kakek-$nenek;
        }elseif($anakL >= 1 && $anakP = 0 && $istri=0){
            $sisaAnakL = $anakL * $totalharta-$bapak-$ibu-$suami-$kakek-$nenek;
        }
        // anak perempuan
        if($anakP >= 1 && $anakL = 0){
            $sisaAnakP = $anakP * $totalharta *1/2;
        }
        // bapak
        if($bapak >=1 && $anakL>=1){
            $sisaBapak= $bapak * $totalharta * 1/6;
        }elseif($bapak>=1 && $anakL=0){
            $sisaBapak=$bapak*$totalharta-$ibu-$istri-$kakek-$nenek;
        }
        // ibu
        if($ibu=1 && $anakL>=1 && $anakP>=1){
            $sisaIbu = $ibu*$totalharta*1/6;
        }elseif($ibu=1 && $anakL=0 && $anakP=0){
            $sisaIbu = $ibu*$totalharta*1/3;
        }
        // Suami
        if($suami=1 && $istri=0 && $anakL=0 && $anakP=0){
            $sisaSuami=$suami*$totalharta*1/2;
        }elseif($suami=1 && $istri=0 && $anakL>=1 && $anakP>=1){
            $sisaSuami=$suami*$totalharta*1/4;
        }
        // istri
        if($istri=1 && $suami=0 && $anakL=0 && $anakP=0){
            $sisaistri=$istri*$totalharta*1/4;
        }elseif($istri=1 && $istri=0 && $anakL>=1 && $anakP>=1){
            $sisaistri=$istri*$totalharta*1/8;
        }
        // kakek
        if($kakek=1 && $anakL=1 && $anakP=1){
            $sisaKakek=$kakek*$totalharta*1/6;
        }elseif($kakek=1 && $anakL=0 && $anakP=0){
            $sisaKakek=$kakek*$totalharta-$bapak-$ibu-$suami;
        }
        if($nenek=1 && $anakL>=1 && $anakP>=1 && $ibu=0){
            $sisaNenek=$nenek*$totalharta*1/6;
        }elseif($nenek=1 && $anakL>=1 && $anakP>=1 && $ibu=1){
            echo "0 karena terhalang oleh Ibu";
        }



        if($anakP = 0){
            echo " ";
        }


    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="totalHarta">Masukan Total Harta</label>
        <input type="text" id="totalHarta" name="totalHarta"><br><br>
        <label for="anakL">Anak Laki-Laki</label>
        <input type="text" id="anakL" name="anakL"><br><br>
        <label for="anakP">Anak Perempuan</label>
        <input type="text" id="anakP" name="anakP"><br><br>
        <label for="bapak">Bapakk</label>
        <input type="text" id="bapak" name="bapak"><br><br>
        <label for="ibu">Ibu</label>
        <input type="text" id="ibu" name="ibu"><br><br>
        <label for="suami">Suami</label>
        <input type="text" id="suami" name="suami"><br><br>
        <label for="istri">Istri</label>
        <input type="text" id="istri" name="istri"><br><br>
        <label for="kakek">Kakek</label>
        <input type="text" id="kakek" name="kakek"><br><br>
        <label for="nenek">Nenek</label>
        <input type="text" id="nenek" name="nenek"><br><br>
        <input type="submit" value="kirim">
    </form>

    <p><?php echo "sisa anak Laki-laki = ". $sisaAnakL; ?></p>
    <p><?php echo "sisa anak Perempuan = ". $sisaAnakP; ?></p>
    <p><?php echo "sisa Bapak= ". $sisaBapak; ?></p>
    <p><?php echo "sisa Ibu = ". $sisaIbu; ?></p>
    <p><?php echo "sisa Suami = ". $sisaSuami; ?></p>
    <p><?php echo "sisa Istri = ". $sisaistri; ?></p>
    <p><?php echo "sisa Kakek = ". $sisaKakek; ?></p>
    <p><?php echo "sisa Nenek = ". $sisaNenek; ?></p>
    

</body>
</html>