<?php
namespace NeutrinoAPI\Call;

use NeutrinoAPI\Parameters;

interface CallInterface
{
    public function params(Parameters &$parameters);
}