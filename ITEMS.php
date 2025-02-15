<?php
#too lazy to make a json and figure out how to parse that in php
#so three arrays will work, be semantic enough, and be easy to refactor later
$ITEMS = [
    'A' => 500,
    'B' => 1000,
    'C' => 4000
];
$IMAGES = [
    'A' => 'https://images.pexels.com/photos/128756/pexels-photo-128756.jpeg?cs=srgb&dl=pexels-crisdip-35358-128756.jpg&fm=jpg',
    'B' => 'https://cff2.earth.com/uploads/2023/06/21135110/bobtail-squid_albino-bobtail-squid_Euprymna-berryi_3medium-scaled.jpg',
    'C' => 'https://cdn.mos.cms.futurecdn.net/oJYxSWiFSJQc27YQeeE7qB-1200-80.png'
];
$DESC = [
    'A' => 'funky clownfish',
    'B' => 'some kind of GMO squids',
    'C' => 'we dont know what this one is. every time we sell and ship one, '
    . 'it shows up in our warehouse again the next day.',
];