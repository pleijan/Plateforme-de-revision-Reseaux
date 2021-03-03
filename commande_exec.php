<?php
function display($a){
echo "<pre>";
print_r($a);
echo "</pre>";
}
echo "<h2>Avec un ping</h2>";
echo "<p>la commande ping est la suivante :<code> ping -c3 www.uvsq.fr</code></p>";
echo "<h3>Resultat</h3>";
$cmd="ping -c 3 www.uvsq.fr";
exec($cmd,$out,$status);
display($out);
echo "<hr>";
display($status);

echo "<h2>Avec un nslookup</h2>";
echo "<p>la commande nslookup est la suivante :<code> nslookup www.free.fr</code></p>";
echo "<h3>Resultat</h3>";
$cmd2="nslookup www.free.fr";
exec($cmd2,$out2,$status2);
display($out2);
echo "<hr>";
display($status2);

echo "<h2>Avec nmap</h2>";
echo "<p>la commande nmap est la suivante : <code>nmap www.google.com</code></p>";
echo "<h3>Resultat</h3>";
$cmd3="nmap www.google.com";
exec($cmd3,$out3,$status3);
display($out3);
echo "<hr>";
display($status3);

echo "<h2>Avec un man</h2>";
echo "<p> on fait le man de ip : <code> man ip </code</p>";
echo "<h3>Resultat</h3>";
$cmd4="man IP";
exec($cmd4,$out4,$status4);
display($out4);
echo "<hr>";
display($status4);
?>
