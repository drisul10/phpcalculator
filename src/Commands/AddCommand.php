<?php

namespace Jakmall\Recruitment\Calculator\Commands;

class AddCommand extends BaseCommand
{
    public function __construct()
    {
        $this->commandVerb = "add";
        $this->commandPassiveVerb = "added";
        $this->operator = "+";

        parent::__construct();
    }
}
