<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Base;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use Stringable;
use Yii\Forms\Base\AbstractFormWidget;
use Yii\Forms\Tests\Support\PropertyTypeForm;
use Yii\Model\AbstractFormModel;

final class InmutabilityGlobalsTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $globals = $this->createWidget(new PropertyTypeForm(), 'string');
        $this->assertNotSame($globals, $globals->autoFocus());
        $this->assertNotSame($globals, $globals->class(''));
        $this->assertNotSame($globals, $globals->charset(''));
        $this->assertNotSame($globals, $globals->id(''));
        $this->assertNotSame($globals, $globals->name(''));
        $this->assertNotSame($globals, $globals->tabindex(0));
        $this->assertNotSame($globals, $globals->title(''));
    }

    private function createWidget(AbstractFormModel $formModel, string $fieldAttributes): AbstractFormWidget
    {
        return new class ($formModel, $fieldAttributes) extends AbstractFormWidget {
            public function render(): string|Stringable
            {
                return '';
            }
        };
    }
}
