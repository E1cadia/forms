<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Component\Input\File;

use PHPUnit\Framework\TestCase;
use Yii\Forms\Component\Input\File;
use Yii\Forms\Tests\Support\TestForm;
use Yii\Forms\Tests\Support\TestTrait;
use Yiisoft\Definitions\Exception\CircularReferenceException;
use Yiisoft\Definitions\Exception\InvalidConfigException;
use Yiisoft\Definitions\Exception\NotInstantiableException;
use Yiisoft\Factory\NotFoundException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class GlobalAttributesTest extends TestCase
{
    use TestTrait;

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testAttributes(): void
    {
        $this->assertSame(
            '<input id="id" name="name[]" type="file">',
            File::widget([new TestForm(), 'string'])
                ->attributes(['id' => 'id', 'name' => 'name', 'value' => 'value'])
                ->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testAutofocus(): void
    {
        $this->assertSame(
            '<input id="testform-string" name="TestForm[string][]" type="file" autofocus>',
            File::widget([new TestForm(), 'string'])->autofocus()->render()
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testClass(): void
    {
        $this->assertSame(
            '<input class="class" id="testform-string" name="TestForm[string][]" type="file">',
            File::widget([new TestForm(), 'string'])->class('class')->render()
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testId(): void
    {
        $this->assertSame(
            '<input id="id" name="TestForm[string][]" type="file">',
            File::widget([new TestForm(), 'string'])->id('id')->render()
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testName(): void
    {
        $this->assertSame(
            '<input id="testform-string" name="name[]" type="file">',
            File::widget([new TestForm(), 'string'])->name('name')->render()
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testTabindex(): void
    {
        $this->assertSame(
            '<input id="testform-string" name="TestForm[string][]" type="file" tabindex="1">',
            File::widget([new TestForm(), 'string'])->tabindex(1)->render()
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testTitle(): void
    {
        $this->assertSame(
            '<input id="testform-string" name="TestForm[string][]" type="file" title="title">',
            File::widget([new TestForm(), 'string'])->title('title')->render()
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testValue(): void
    {
        $this->assertSame(
            '<input id="testform-string" name="TestForm[string][]" type="file">',
            File::widget([new TestForm(), 'string'])->value('value')->render()
        );
    }
}
