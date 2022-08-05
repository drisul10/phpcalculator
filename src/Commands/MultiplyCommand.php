<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class MultiplyCommand extends BaseCommand
{
    public function __construct()
    {
        $this->commandVerb = "multiply";
        $this->commandPassiveVerb = "multiplied";
        $this->operator = "*";

        parent::__construct();
    }
}
