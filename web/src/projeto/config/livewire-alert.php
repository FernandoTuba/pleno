<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */
return [
    'alert' => [
        'position' => 'center',
        'timer' => 2000,
        'toast' => true,
        'text' => null,
        'showCancelButton' => false,
        'showConfirmButton' => false,
        'width' => '200px'
    ],
    'confirm' => [
        'icon' => 'warning',
        'position' => 'center',
        'toast' => false,
        'timer' => null,
        'showConfirmButton' => true,
        'showCancelButton' => true,
        'cancelButtonText' => 'Cancelar',
        'focusConfirm' => false,
        'focusCancel' => true,
        'buttonsStyling' => false,
        'customClass' => [
            'cancelButton' => 'white-button',
            'confirmButton' => 'red-button',
        ]
    ],
    [
    'customClass' => [
        'container' => '',
        'popup' => '',
        'header' => '',
        'title' => '',
        'closeButton' => '',
        'icon' => '',
        'image' => '',
        'content' => '',
        'htmlContainer' => '',
        'input' => '',
        'inputLabel' => '',
        'validationMessage' => '',
        'actions' => '',
        'confirmButton' => '',
        'denyButton' => '',
        'cancelButton' => '',
        'loader' => '',
        'footer' => ''
        ]
    ]

];
