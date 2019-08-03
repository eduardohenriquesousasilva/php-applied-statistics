<?php

namespace drdhnrq\PhpAppliedStatistics\Exceptions;

use Exception;

class FrequencyNotDefined extends Exception
{
    /**
     * Default message that will show when frequency
     * wasn't defined
     */
    const MESSAGE_ERROR = 'The frequency wasn\'t defined';

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
        return __CLASS__ . ": [FrequencyNotDefined]: {$this->message}\n";
    }
}