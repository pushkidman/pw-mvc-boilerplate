<?php

use ProcessWire as PW;

trait Search
{
    public static function __searchInitialize($obj)
    {
        $obj->add_view_vars($obj->get_search_vars());
    }

    public static function get_query()
    {
        $input = PW\wire('input');
        $sanitizer = PW\wire('sanitizer');

        return $sanitizer->selectorValue($input->get->q);
    }

    public static function get_stored_query()
    {
        $input = PW\wire('input');
        $query = self::get_query();

        return $input->whitelist('q', $query)->q;
    }

    public function get_search_vars()
    {
        return array(
            'q' => $this->get_stored_query(),
        );
    }
}
