<?php

namespace App\Repository\Upload;

use Exception;

class UploadFactory
{
    public function initialize($type = null)
    {
        if ($type === 'AWS') {
            return new AwsUploadRepository();
        } elseif ($type === 'DO') {
            return new DigitalOceanUploadRepository();
        }

        throw new Exception("Unsupported upload type.");
    }
}
