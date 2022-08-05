<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class SubstractCommand extends BaseCommand
{
    public function __construct()
    {
        $this->commandVerb = "substract";
        $this->commandPassiveVerb = "substracted";
        $this->operator = "-";

        parent::__construct();
    }
}
