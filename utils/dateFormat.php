<?php
// TODO FUNCTION TO DATE FORMAT
function validateDateWithSpace($field, $value)
{
    if (empty($field) || $field === 'NULL') $result = $value;
    else {
        $dates = explode("-", $field);
        $result = $dates[2] . ' / ' . $dates[1] . ' / ' . $dates[0];
    }
    return $result;
}
