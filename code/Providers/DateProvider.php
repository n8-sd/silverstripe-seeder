<?php

use LittleGiant\SilverStripeSeeder\Providers\Provider;

class DateProvider extends Provider
{
    public static $shorthand = 'Date';

    protected function generateField($field, $state)
    {
        $time = 'now';

        $format = 'Y-m-d H:i:s';
        $type = strtolower($field->dataType);
        if ($type === 'date') {
            $format = 'Y-m-d';
        } else if ($type === 'time') {
            $format = 'H:i:s';
        }

        if (!empty($field->arguments['arguments'])) {
            $args = $field->argument['arguments'];
            $time = $args[0];

            if (count($args) >= 2) {
                $format = $args[1];
            }
        }

        return date($format, strtotime($time));
    }
}
