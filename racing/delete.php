<?php
    echo "<center><br><form action='include/delete_tablice.php' method='POST'>
    <label for='tablice'><center>Wybierz co usunąć:</center></label>
    <select name='tablice' id='tablice'>
      <option value='kierowcy'>Kierowcę</option>
      <option value='tory'>Tor</option>
      <option value='zawody'>Zawody</option>
      <option value='torzaw'>Tor z zawodów</option>
    </select>
    <br>
    <input type='submit' value='Wybierz'>
  </form></center>";