<?php
    const LIBRA = 0.86;

    for ($euros = 1; $euros < 11; $euros++) {
        echo "$euros € = " . LIBRA*$euros . "<br>";
    }
