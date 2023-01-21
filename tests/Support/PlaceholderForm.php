<?php

declare(strict_types=1);

namespace Yii\Forms\Tests\Support;

final class PlaceholderForm extends AbstractFormModel
{
    private string $text = '';

    public function getPlaceHolders(): array
    {
        return [
            'text' => 'Enter your text',
        ];
    }
}
