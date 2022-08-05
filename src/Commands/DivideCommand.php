<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class DivideCommand extends BaseCommand
{
    public function __construct()
    {
        $this->commandVerb = "divide";
        $this->commandPassiveVerb = "divided";
        $this->operator = "/";

        parent::__construct();
    }
}
