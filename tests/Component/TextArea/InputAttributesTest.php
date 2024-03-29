<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Component\TextArea;

use PHPUnit\Framework\TestCase;
use Yii\Forms\Component\TextArea;
use Yii\Forms\Tests\Support\TestForm;
use Yii\Forms\Tests\Support\TestTrait;
use Yiisoft\Definitions\Exception\CircularReferenceException;
use Yiisoft\Definitions\Exception\InvalidConfigException;
use Yiisoft\Definitions\Exception\NotInstantiableException;
use Yiisoft\Factory\NotFoundException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class InputAttributesTest extends TestCase
{
    use TestTrait;

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testAriaLabel(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" aria-label="test.areaLabel"></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->ariaLabel('test.areaLabel')->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testDirname(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" dirname="test.dir"></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->dirname('test.dir')->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testDisabled(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" disabled></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->disabled()->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testForm(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" form="test.form"></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->form('test.form')->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testMaxLength(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" maxlength="10"></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->maxlength(10)->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" minlength="4"></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->minlength(4)->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testPlaceholder(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" placeholder="test.placeholder"></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testReadonly(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" readonly></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->readonly()->render(),
        );
    }

    /**
     * @throws CircularReferenceException
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     */
    public function testRequired(): void
    {
        $this->assertSame(
            <<<HTML
            <textarea id="testform-string" name="TestForm[string]" required></textarea>
            HTML,
            TextArea::widget([new TestForm(), 'string'])->required()->render(),
        );
    }
}
