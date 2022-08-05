<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class PowerCommand extends BaseCommand
{
    public function __construct()
    {
        $this->commandVerb = "power";
        $this->commandPassiveVerb = "powered";
        $this->operator = "^";

        parent::__construct();
    }
}
