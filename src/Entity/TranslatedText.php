<?php


namespace App\Entity;


class TranslatedText
{
    private string $originalText;

    /**
     * @return string
     */
    public function getOriginalText(): string
    {
        return $this->originalText;
    }

    /**
     * @param string $originalText
     */
    public function setOriginalText(string $originalText): void
    {
        $this->originalText = $originalText;
    }

    public function getFormattedText(): string
    {
        return preg_replace('([a-zA-Z]+)', '<span>$0</span>',
            $this->originalText);
    }
}
