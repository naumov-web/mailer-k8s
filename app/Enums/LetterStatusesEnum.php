<?php

namespace App\Enums;

/**
 * Class LetterStatusesEnum
 * @package App\Enums
 */
class LetterStatusesEnum
{

    /**
     * Draft status
     * @var int
     */
    const DRAFT = 1;

    /**
     * Email is sent
     * @var int
     */
    const SENT = 2;

    /**
     * Email has error
     * @var int
     */
    const ERROR = 3;

}
