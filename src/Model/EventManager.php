<?php

namespace App\Model;

class EventManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'event';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

}