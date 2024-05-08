<?php
    echo "<center><br><form action='include/select_tablice.php' method='POST'>
    <label for='tablice'><center>Wybierz co wyświetlić:</center></label>
    <select name='tablice' id='tablice'>
      <option value='kierowcy'>Kierowcy</option>
      <option value='tory'>Tory</option>
      <option value='zawody'>Zawody</option>
    </select>
    <br>
    <input type='submit' value='Wybierz'>
  </form></center>";