<form action="controller/controller.php?action=changeAlias" method="POST">
    <label for="alAct">Introduce el alias actual</label>
    <input type="text" name="alAct" id="alAct"><br>
    <label for="newAlias">Introduce el nuevo alias</label>
    <input type="text" name="newAlias" id="newAlias"><br>
    <label for="newAlias2">Repita el nuevo alias</label>
    <input type="text" name="newAlias2" id="newAlias2"><br>
    
    <input type="submit" value="Cambiar">
</form>

<?php
if (isset($_REQUEST['error'])) {
    
}
?>