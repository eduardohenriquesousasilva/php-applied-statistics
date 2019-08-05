<?php

namespace drdhnrq\PhpAppliedStatistics\Exceptions;

use Exception;

class DataIsnotOrdered extends Exception
{
    /**
     * Default message that will show when data isn't ordered
     */
    const MESSAGE_ERROR = 'The data to calculate isn\'t ordered';

    /**
     * The message can be null, in this case the message will use
     * the default message defined in the MESSAGE_ERRO constant
     *
     * @param string $message
     */
    public function __construct(string $message = null) {
        $message = is_null($message)
            ? self::MESSAGE_ERROR
            : $message;

        parent::__construct($message);
    }

    /**
     * This method contains the way that the error
     * message will be show
     *
     * @return string
     */
    public function __toString() {
        return __CLASS__ . ": [DataIsnotOrdered]: {$this->message}\n";
    }
}