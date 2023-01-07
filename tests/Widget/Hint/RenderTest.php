<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Widget\Hint;

use PHPUnit\Framework\TestCase;
use Yii\Forms\Tests\Support\TestForm;
use Yii\Forms\Tests\Support\TestTrait;
use Yii\Forms\Widget\Hint;
use Yii\Support\Assert;

final class RenderTest extends TestCase
{
    use TestTrait;

    public function testFormModelWithAddHint(): void
    {
        $errorWidget = Hint::widget([new TestForm(), 'string']);

        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            String hint.
            </div>
            HTML,
            $errorWidget->render(),
        );
    }

    public function testRender(): void
    {
        $hintWidget = Hint::widget([new TestForm(), 'string']);
        $hintWidget = $hintWidget->message('Custom string hint.');

        Assert::equalsWithoutLE(
            <<<HTML
            <div>
            Custom string hint.
            </div>
            HTML,
            $hintWidget->render(),
        );
    }
}