<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Component\Input\Button;

use PHPUnit\Framework\TestCase;
use Yii\Forms\Component\Input\Button;
use Yii\Forms\Tests\Support\TestTrait;
use Yiisoft\Definitions\Exception\CircularReferenceException;
use Yiisoft\Definitions\Exception\InvalidConfigException;
use Yiisoft\Definitions\Exception\NotInstantiableException;
use Yiisoft\Factory\NotFoundException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class ImmutabilityTest extends TestCase
{
    use TestTrait;

    /**
     * @throws InvalidConfigException
     * @throws NotFoundException
     * @throws NotInstantiableException
     * @throws CircularReferenceException
     */
    public function testImmutability(): void
    {
        $button = Button::widget();

        $this->assertNotSame($button, $button->disabled());
        $this->assertNotSame($button, $button->form(''));
        $this->assertNotSame($button, $button->type(''));
    }
}
