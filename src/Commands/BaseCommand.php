<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;

abstract class BaseCommand extends Command
{
    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $commandVerb;

    /**
     * @var string
     */
    protected $commandPassiveVerb;

    /**
     * @var string
     */
    protected $operator;

    public function __construct()
    {
        $commandVerb = $this->getCommandVerb();

        $this->signature = sprintf(
            '%s {numbers* : The numbers to be %s}',
            $commandVerb,
            $this->getCommandPassiveVerb()
        );
        $this->description = sprintf('%s all given Numbers', ucfirst($commandVerb));

        parent::__construct();
    }

    protected function getCommandVerb(): string
    {
        return $this->commandVerb;
    }

    protected function getCommandPassiveVerb(): string
    {
        return $this->commandPassiveVerb;
    }

    public function handle(): void
    {
        $numbers = $this->getInput();
        $description = $this->generateCalculationDescription($numbers);
        $result = $this->calculateAll($numbers);

        $this->comment(sprintf('%s = %s', $description, $result));
    }

    protected function getInput(): array
    {
        return $this->argument('numbers');
    }

    protected function generateCalculationDescription(array $numbers): string
    {
        $operator = $this->getOperator();
        $glue = sprintf(' %s ', $operator);

        return implode($glue, $numbers);
    }

    protected function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @param array $numbers
     *
     * @return float|int
     */
    protected function calculateAll(array $numbers)
    {
        $number = array_pop($numbers);

        if (count($numbers) <= 0) {
            return $number;
        }

        return $this->calculate($this->calculateAll($numbers), $number);
    }

    /**
     * @param int|float $number1
     * @param int|float $number2
     *
     * @return int|float
     */
    protected function calculate($number1, $number2)
    {
        switch ($this->operator) {
            case '+':
                return $number1 + $number2;
                break;

            case '-':
                return $number1 - $number2;
                break;

            case '*':
                return $number1 * $number2;
                break;

            case '/':
                return $number1 / $number2;
                break;

            case '^':
                return pow($number1, $number2);
                break;

            default:
                return 0;
                break;
        }
    }
}
