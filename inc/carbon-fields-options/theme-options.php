<?php

if (!defined('ABSPATH')) {
    exit();
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', 'crb_attach_theme_options');

Container::make('theme_options', __('Нaстройки темы'))
    ->add_tab(__('Основные настройки'), array(
        Field::make('textarea', 'logo', __('Код svg Логотип'))
            ->set_width(89),

        Field::make('text', 'adress', __('Город'))
            ->set_width(20),
        Field::make('text', 'tel', __('Телефон'))
            ->set_width(20),
        Field::make('text', 'short-header', __('Шорткод для формы в шапке'))
            ->set_width(100),

    ))

    ->add_tab(__('Подвал'), array(
        Field::make('textarea', 'text-one', __('Текст 1'))
            ->set_width(50),
        Field::make('textarea', 'text-two', __('Текст 2'))
            ->set_width(50),
        Field::make('text', 'short', __('Шорткод для формы'))
            ->set_width(20),

    ));
