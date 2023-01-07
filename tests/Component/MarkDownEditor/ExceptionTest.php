<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Component\MarkDownEditor;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Yii\Forms\Component\MarkDownEditor;
use Yii\Forms\Tests\Support\TestForm;
use Yii\Forms\Tests\Support\TestTrait;

final class ExceptionTest extends TestCase
{
    use TestTrait;

    public function testHiddenIcons(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid toolbar item: test');

        MarkDownEditor::widget([new TestForm(), 'string'])->hiddenIcons(['test']);
    }

    public function testShowIcons(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid toolbar item: test');

        MarkDownEditor::widget([new TestForm(), 'string'])->showIcons(['test']);
    }

    public function testToolbar(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid toolbar item: test1');

        MarkDownEditor::widget([new TestForm(), 'string'])->toolbar(['test1']);
    }
}
