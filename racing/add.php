<?php
    echo "<center><br><form action='include/add_tablice.php' method='POST'>
    <label for='tablice'><center>Wybierz co dodać:</center></label>
    <select name='tablice' id='tablice'>
      <option value='kierowcy'>Kierowcę</option>
      <option value='przejazdy'>Przejazd</option>
      <option value='tory'>Tor</option>
      <option value='zawody'>Zawody</option>
      <option value='torzawody'>Tor do zawodów</option>
    </select>
    <br>
    <input type='submit' value='Wybierz'>
  </form></center>";