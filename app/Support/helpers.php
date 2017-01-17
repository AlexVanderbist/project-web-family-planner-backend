<?php

function getScreenType($typeId) {
    $screenTypes = config('general.screen_types');
    if(! array_key_exists($typeId, $screenTypes)) return 'unknown';
    return $screenTypes[$typeId];
}
