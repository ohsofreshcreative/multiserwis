<?php

namespace App\Options;

use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Locations extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Lokacje';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Lokacje | Opcje';

    /**
     * The option page field group.
     *
     * @return array
     */
    public function fields()
    {
        $locations = new FieldsBuilder('locations_settings');

        $locations
            ->addRepeater('locat', [
                'label' => 'Placówki',
                'instructions' => 'Dodaj placówkę i wgraj dla niej plik z kursami (TXT lub XML).',
                'button_label' => 'Dodaj placówkę',
                'layout' => 'block',
            ])
                ->addText('name', [
                    'label' => 'Nazwa placówki',
                    'required' => 1,
                ])
                ->addText('slug', [
                    'label' => 'Slug (opcjonalnie)',
                    'instructions' => 'Pozostaw puste — zostanie wygenerowany z nazwy.',
                ])
                ->addFile('rates_file', [
                    'label' => 'Plik z kursami',
                    'return_format' => 'array',
                    'mime_types' => 'txt,xml',
                    'required' => 1,
                ])
            ->endRepeater();

        return $locations->build();
    }
}