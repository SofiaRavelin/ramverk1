<?php

namespace Anax\View;

?>
<h1>IP Validering</h1>

<h4>Text-format</h4>
<form method='post'>
        <label for="ipaddress">IP-address: </label>
        <input type="text" name="ipaddress" placeholder="Ange IP-address" >
        <input type="submit" value="Validera">
</form>

<h4>JSON-format</h4>
<form method='post' action='./apicheck'>
        <label for="ipaddress">IP-address: </label>
        <input type="text" name="ip" placeholder="Ange IP-address" >
        <input type="submit" value="Validera">
</form>

<h5>Exempel för JSON-format</h5>
<form method='post' action='./apicheck'>
    <input type="submit" name="ip" value="192.168.0.1"> (Validerar)<br><br>
    <input type="submit" name="ip" value="192.1687.0.1"> (Validerar inte)

</form>
