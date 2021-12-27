<?php

declare(strict_types=1);

use Blumilk\Codestyle\Config;
use Blumilk\Codestyle\Configuration\Defaults\CommonSkippedRules;
use Blumilk\Codestyle\Configuration\Utils\Rule;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSemicolonToColonFixer;

$skipped = new CommonSkippedRules();
$skipped->add(new Rule(SwitchCaseSemicolonToColonFixer::class));

$config = new Config(
    skipped: $skipped
);

return $config->config();