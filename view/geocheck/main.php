<?php

namespace Anax\View;

?>
<h1>Geografisk position</h1>

<h4>Text-format</h4>
<form method='post'>
        <label for="ipaddress">IP-address: </label>
        <input type="text" name="ipaddress" placeholder="Ange IP-address">
        <input type="submit" value="Validera">
</form>

<h4>JSON-format</h4>
<form method='post' action='./geoapicheck'>
        <label for="ipaddress">IP-address: </label>
        <input type="text" name="ipaddress" placeholder="Ange IP-address">
        <input type="submit" value="Validera">
</form>

<p> API sänder en post-request till en kontroll. Kontrollen använder sig utav
    en modul som hämtar information från en externtjänst.
    Svaret ges i JSON-format.
</p>

<h5>Exempel för JSON-format</h5>
<form method='post' action='./geoapicheck'>
    <input type="submit" name="ipaddress" value="88.206.249.29"> (Validerar)<br><br>
    <input type="submit" name="ipaddress" value="192.1687.0.1"> (Validerar inte)

</form>
