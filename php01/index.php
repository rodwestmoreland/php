<?php 
$myName = "Rod Westmoreland"; 
$myHash = hash('sha256',$myName);
$myASCII = 
"<pre>
    ####
    #  #
    ####
    #   #
    #    #
</pre>"
?>
<html><head><title> <?php print ($myName); ?> </title></head>
<h1> <?php print ("<p> ".$myName." Request\Response</p>"); ?> </h1>
<?php print ("<p>The SHA256 of \"".$myName."\" is ".$myHash."</p>"); ?> 
<p>ASCII Art </br><?php print ($myASCII) ?></p>
<p>
    <a href="fail.php">Click here to check the error setting</a>
    <br>
    <a href="check.php">Click here to cause a traceback</a>
</p>
</html>