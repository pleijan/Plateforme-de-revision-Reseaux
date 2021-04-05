<?php
require("barreDeMenu.php");
?>
<script type="text/javascript">
   function nospaces(input) {
        input.value = input.value.replace(' ', "");
        return true;
        alert(input.value);
    }
</script>
<br/>
<h5 align='center'><p>Sur cette page vous pourrez apprendre à traduire une adresse IPV4 de hexadecimal à decimal et inversement.</p></h5>
<HR width=1240>
    <h3 align='center'><b>Cours</b></h3>
<HR width=1240>

<h5 align='center'><a href='cours/crc/crc01.mp4' onclick="open('cours/crc/crc01.mp4','Popup','scrollbars=1,resizabl=1,height=500,width=400');return false;">Traduction de hexadécimal a décimale</a></h5>

<HR width=1240>
    <h3 align='center'><b>Application</b></h3>
<HR width=1240>

<form action='hex-dec.php' method='post' >
<table cellpading='4' cellspacing='4' align='center'>

<tr><td align='right'>Adresse IP :</td> 
    <td><input class='champ' name='ip' id= "ip" type='text' onfocusin="javascript:nospaces(this)" onfocusout="javascript:nospaces(this)" placeholder="192.168.10.2" value= "<?php if (isset($_POST['ip'])){echo $_POST['ip'];} ?>" required> </td></tr>
</table>

<table cellpading='4' cellspacing='4' align='center' >
<tr>
    <td>Décimal -> Hexadécimal<input type='radio' name='trad' value='dectohex' checked></td>
</tr>
<tr>
    <td>Hexadécimal -> Décimal <input type='radio' name='trad' value='hextodec'></td>
</tr>
</table>
<input name='valider' class="btn btn-success btn-sm" type='submit' value='Valider' >

</form>


<?php
if(isset($_POST['ip'])){
    $adrIp = explode(".", $_POST['ip']);

    if($_POST['trad']=='dectohex'){
        foreach ($adrIp as $val){
           
            if (!is_numeric($val))
            {
                header('Location:hex-dec.php?id=0');
            }
            if ($val>255)
            {
                header('Location:hex-dec.php?id=1');
            }
            
        }
        $point = 0;
        echo"<table cellpading='4' cellspacing='4' align='center'>
        <tr><td>Adresse IP originale : </td>
        <td><b>";
        foreach($adrIp as $val){
            
            echo $val;
            

            if($point <=2)
                echo".";
            $point++;
            
        }
        echo"</td></b>";
        $point = 0;
        echo"</tr><tr><td>Adresse IP traduite : </td>
        <td><b>";
        foreach($adrIp as $val){
            echo dechex($val);

            if($point <=2)
                 echo".";
            $point++;
            
        }
        echo"</td></b>";
        echo"</tr>";
    }
    else{
        foreach ($adrIp as $val){
            if (!ctype_xdigit($val))
            {
                header('Location:hex-dec.php?id=2');
            }
            if (strlen($val)>2)
            {
                header('Location:hex-dec.php?id=3');
            }
            
        }
        echo"<table cellpading='4' cellspacing='4' align='center'>
        <tr><td>Adresse IP originale : </td>
        <td><b>";
        $point = 0;
        foreach($adrIp as $val){
           
            echo $val;

            if($point <=2)
                 echo".";
            $point++;
        }
        echo"</tr><tr><td>Adresse IP traduite : </td>
        <td><b>";
        $point = 0;
        foreach($adrIp as $val){
           
            echo  hexdec($val);
            
            if($point <=2)
                echo".";
            $point++;
        }
        echo"</td></b>";
        echo"</tr>";
    }
    
}
if (isset($_GET['id'])){
    if($_GET['id']=='0'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='1'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
    if($_GET['id']=='2'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
        }
    if($_GET['id']=='3'){
        echo"<p style='color:red'>adresse ip entree invalide </p>";
    }
}




?>

