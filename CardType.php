<?php

function verify_card($n, $valid_prefixes, $valid_lengths) {
    #check prefix first, thank God for Regex
    foreach ((array) $valid_prefixes as $prefix) {
        switch (preg_match("/\A$prefix/", $n)) {
            # could use an if, but im just making 2x sure preg_match always works
            case false:
            case 0:
                continue 2; #check next prefix
            case 1:
                #if prefix matches, check length and numeric-ness
                return in_array(strlen($n), (array) $valid_lengths) 
                    && is_numeric($n); #BUG: this doesn't catch 'e'
        }
    }
    return false;
}
