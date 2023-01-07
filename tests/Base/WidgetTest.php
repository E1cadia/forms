<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Base;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use Stringable;
use Yii\Forms\Base\AbstractFormWidget;
use Yii\Forms\Tests\Support\PropertyTypeForm;
use Yii\Html\Helper\Attributes;
use Yii\Model\AbstractFormModel;
use Yii\Support\Assert;

final class WidgetTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAttributes(): void
    {
        $widget = $this->createWidget(new PropertyTypeForm(), 'string')->attributes(['class' => 'test']);

        $this->assertSame('<class="test" id="test">', $widget->render());
    }

    /**
     * @throws ReflectionException
     */
    public function testGetId(): void
    {
        $widget = $this->createWidget(new PropertyTypeForm(), 'string');

        $this->assertSame('test', Assert::invokeMethod($widget, 'getId'));
    }

    private function createWidget(AbstractFormModel $formModel, string $fieldAttributes): AbstractFormWidget
    {
        return new class ($formModel, $fieldAttributes) extends AbstractFormWidget {
            protected array $attributes = ['id' => 'test'];

            public function render(): string|Stringable
            {
                return '<' . trim((new Attributes())->render($this->attributes)) . '>';
            }
        };
    }
}