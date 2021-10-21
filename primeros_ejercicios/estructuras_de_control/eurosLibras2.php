<?php
    const LIBRA = 0.86;

    echo "<table>";
    echo "<tr>
            <th>Euros</th>
            <th>Libras</th>
          </tr>";
    $color1 = "#CCCCCC";
    $color1 = "#CCEEFF";

    for ($euros = 1; $euros < 11; $euros++) {
        echo"<tr><td>$euros</td><td>". LIBRA*$euros . "</td></tr>";
    }
                
    echo "</table>";