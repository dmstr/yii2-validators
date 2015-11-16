<?php

namespace dmstr\modules\widgets\helpers;

use yii\base\Object;

class JsonValidator extends Object
{
    protected function validateAttribute($jsonEditorOutput)
    {
        if (!is_string($jsonEditorOutput)) {
            return false;
        }
        $jsonEditorOutput = trim($jsonEditorOutput);
        $firstChar        = substr($jsonEditorOutput, 0, 1);
        $lastChar         = substr($jsonEditorOutput, -1);
        if (!$firstChar || !$lastChar) {
            return false;
        }
        if (($firstChar !== '{' xor $firstChar !== '[') && ($lastChar !== '}' xor $lastChar !== ']')) {
            return false;
        }
        json_decode($jsonEditorOutput);
        $isValid = json_last_error() === JSON_ERROR_NONE;
        return $isValid;
    }
}