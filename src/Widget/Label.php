<?php

declare(strict_types=1);

namespace Yii\Forms\Widget;

use Stringable;
use Yii\Forms\Exception\AttributeNotSet;
use Yii\Html\Attribute\Form;
use Yii\Html\Helper\Encode;
use Yii\Html\Tag;
use Yii\Model\AbstractFormModel;
use Yiisoft\Widget\Widget;

/**
 * The Label widget generates a label tag for the specified form model attribute.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/label.html
 */
final class Label extends Widget
{
    use Form;

    private array $attributes = [];
    private string $content = '';

    public function __construct(private AbstractFormModel $formModel, private string $attribute = '')
    {
        if ($this->formModel->has($this->attribute) === false) {
            throw new AttributeNotSet();
        }
    }

    /**
     * The HTML attributes. The following special options are recognized.
     *
     * @param array $values Attribute values indexed by attribute names.
     */
    public function attributes(array $values): static
    {
        $new = clone $this;
        $new->attributes = $values;

        return $new;
    }

    /**
     * Returns a new instance specifying the label to be displayed.
     *
     * @param string $content The label to be displayed.
     * @param bool $encode Whether to encode the label.
     */
    public function content(string $content, bool $encode = true): self
    {
        $new = clone $this;
        $new->content = $encode ? Encode::content($content) : $content;

        return $new;
    }

    /**
     * Returns a new instance with the id of a labelable form-related element in the same document as the tag label
     * element.
     *
     * The first element in the document with an id matching the value of the for attribute is the labeled control for
     * this label element, if it is a labelable element.
     *
     * @param string $value The id of a labelable form-related element in the same document as the tag label
     * element. If null, the attribute will be removed.
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/label.html#label.attrs.for
     */
    public function for(string $value): self
    {
        $new = clone $this;
        $new->attributes['for'] = $value;

        return $new;
    }

    public function render(): string|Stringable
    {
        $attributes = $this->attributes;
        $content = $this->content;

        if ($content === '') {
            $content = Encode::content($this->formModel->getLabel($this->attribute));
        }

        if (!array_key_exists('for', $attributes)) {
            $attributes['for'] = $this->formModel->getInputId($this->attribute);
        }

        return match ($content) {
            '' => '',
            default => Tag::create('label', $content, $attributes),
        };
    }
}
