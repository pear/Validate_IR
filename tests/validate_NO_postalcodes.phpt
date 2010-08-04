--TEST--
Test norway postal codes
--FILE--
<?php
$noYes = array('NO', 'YES');
if (is_file(dirname(__FILE__) . '/../Validate/NO.php')) {
    require_once dirname(__FILE__) . '/../Validate/NO.php';
} else {
    require_once 'Validate/LI.php';
}


$postalCodes = array(
    1234,//ok
    9238,//ok
    'a123',//no
    '923Z',//no
    123,//no
    12,//no
    1,//no
);

foreach ($postalCodes as $postalCode) {
    echo "{$postalCode}: "
        . $noYes[
            Validate_NO::postalCode($postalCode)
        ] . "\n";
}

--EXPECT--
1234: YES
9238: YES
a123: NO
923Z: NO
123: NO
12: NO
1: NO
