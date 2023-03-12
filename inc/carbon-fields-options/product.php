<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_post_options');

Container::make('post_meta', __('Настройки табов'))
    ->where('post_type', '=', 'product')
    ->add_tab(__('Табы'), array(
        Field::make('text', 'edinica', __('Единица измерения'))
            ->set_width(10),
        Field::make('image', 'img-icon', __('Иконка на фото'))
            ->set_width(7)
            ->set_value_type('url'),
        Field::make('rich_text', 'regions', __('Регионы допуска'))
            ->set_width(100),
        Field::make('rich_text', 'obrabotka', __('Обработка'))
            ->set_width(100),
        Field::make('rich_text', 'upakovka', __('Упаковка'))
            ->set_width(100),
        Field::make('rich_text', 'dostavka', __('Доставка'))
            ->set_width(100),
    ));




