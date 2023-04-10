<?php

namespace App\Constants;

class Mensagem
{
    const SIM_EXCLUIR = 'Sim, excluir';
    const ERRO_EXCLUIR = 'Erro ao excluir';

    // REMOVER PESSOA
    const PESSOA_DELETE_CONFIRM = 'Você deseja realmente excluir <strong>:nome</strong>?';
    const PESSOA_DELETE_SUCCESS = 'Pessoa excluída com sucesso!';
    const PESSOA_DELETE_CONFIRM_CONFIG = [
        'onConfirmed' => 'excluirPessoa',
        'confirmButtonText' => 'Sim, excluir',
        'title' => 'Excluir pessoa',
        'customClass' => [
            'confirmButton' => 'btn-confirm-alert',
            'cancelButton' => 'btn-cancel'
        ]
    ];

    // REMOVER CONTA
    const CONTA_DELETE_CONFIRM = 'Você deseja realmente excluir a conta <strong>:conta</strong>?';
    const CONTA_DELETE_CONFIRM_SALDO = 'Você deseja realmente excluir a conta <strong>:conta</strong> e todas as suas movimentações? Há um saldo de R$ :saldo.';
    const CONTA_DELETE_SUCCESS = 'Conta excluída com sucesso!';
    const CONTA_DELETE_CONFIRM_CONFIG = [
        'onConfirmed' => 'excluirConta',
        'confirmButtonText' => 'Sim, excluir',
        'title' => 'Excluir conta',
        'customClass' => [
            'confirmButton' => 'btn-confirm-alert',
            'cancelButton' => 'btn-cancel'
        ]
    ];


    // SAVE
    const SAVE_SUCCESS = 'Salvo com sucesso';
    const SAVE_ERROR = 'Houve um problema ao salvar, por favor tente novamente mais tarde';
    const SAVE_ERROR_CONFIG = [
        'icon' => 'error',
        'showCancelButton' => false,
        'onConfirmed' => null,
        'customClass' => [
            'confirmButton' => 'blue-button'
        ]
    ];

    //DELETE
    const DELETE_SUCCESS = 'Registro excluído com sucesso';
    const DELETE_ERROR = 'Houve um problema ao excluir o registro, por favor tente novamente mais tarde';
    const DELETE_ERROR_CONFIG = [
        'icon' => 'error',
        'title' => self::ERRO_EXCLUIR,
        'text' => 'Houve um problema ao excluir o registro, por favor tente novamente mais tarde.',
        'confirmButtonText' => 'Ok',
        'showCancelButton' => false,
        'onConfirmed' => null,
        'customClass' => ['confirmButton' => 'blue-button']
    ];

    // ALERTA
    const ALERT_CONFIG = [
        'showCancelButton' => false,
        'onConfirmed' => NULL,
        'icon' => 'warning',
        'customClass' => [
            'confirmButton' => 'blue-button'
        ]
    ];
}
