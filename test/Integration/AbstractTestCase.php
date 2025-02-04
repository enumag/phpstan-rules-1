<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2023 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/phpstan-rules
 */

namespace Ergebnis\PHPStan\Rules\Test\Integration;

use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 */
abstract class AbstractTestCase extends RuleTestCase
{
    /**
     * @dataProvider provideCasesWhereAnalysisShouldSucceed
     */
    final public function testAnalysisSucceeds(string $path): void
    {
        $this->analyse(
            [
                $path,
            ],
            []
        );
    }

    /**
     * @dataProvider provideCasesWhereAnalysisShouldFail
     */
    final public function testAnalysisFails(string $path, array $error): void
    {
        $this->analyse(
            [
                $path,
            ],
            [
                $error,
            ]
        );
    }

    abstract public function provideCasesWhereAnalysisShouldSucceed(): iterable;

    abstract public function provideCasesWhereAnalysisShouldFail(): iterable;
}
