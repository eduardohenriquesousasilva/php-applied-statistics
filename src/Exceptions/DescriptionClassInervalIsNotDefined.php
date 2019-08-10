<?php

namespace drdhnrq\PhpAppliedStatistics\Exceptions;

use Exception;

class DescriptionClassInervalIsNotDefined extends Exception
{
    /**
     * Default message that will show when description class interval wasn't defined
     * in the frequencies
     */
    const MESSAGE_ERROR = 'The description class interval wasn\'t in the frequencies defined';

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
        return __CLASS__ . ": [DescriptionClassInervalIsNotDefined]: {$this->message}\n";
    }
}