<?php
    echo "<center><br><form action='include/edit_tablice.php' method='POST'>
    <label for='tablice'><center>Wybierz co edytować:</center></label>
    <select name='tablice' id='tablice'>
      <option value='kierowcy'>Kierowcy</option>
      <option value='przejazdy'>Przejazd</option>
      <option value='tory'>Tory</option>
      <option value='zawody'>Zawody</option>
    </select>
    <br>
    <input type='submit' value='Wybierz'>
  </form></center>";