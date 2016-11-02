<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists' => 'Esse papel já existe. Por favor, escolha um nome diferente.',
                'cant_delete_admin' => 'Você não pode excluir o papel de Administrador.',
                'create_error' => 'Houve um problema ao criar esse papel. Por favor, tente novamente.',
                'delete_error' => 'Houve um problema ao excluir esse papel. Por favor, tente novamente.',
                'has_users' => 'Você não pode excluir um papel com usuários associados..',
                'needs_permission' => 'Você deve selecionar pelo menos uma permissão para este papel.',
                'not_found' => 'Este papel não existe.',
                'update_error' => 'Houve um problema ao atualizar esse papel. Por favor, tente novamente.',
            ],

            'users' => [
                'cant_deactivate_self' => 'Você não pode fazer isso com você mesmo.',
                'cant_delete_self' => 'Você não pode se excluir.',
                'create_error' => 'Houve um problema ao criar esse usuário. Por favor, tente novamente.',
                'delete_error' => 'Houve um problema ao excluir esse usuário. Por favor, tente novamente.',
                'email_error' => 'Esse endereço de e-mail pertence a um usuário diferente.',
                'mark_error' => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente',
                'not_found' => 'Esse usuário não existe.',
                'restore_error' => 'Houve um problema ao restaurar esse usuário. Por favor, tente novamente.',
                'role_needed_create' => 'Você deve escolher pelo menos uma função. O usuário foi criado, mas desativado.',
                'role_needed' => 'Você deve escolher pelo menos uma função.',
                'update_error' => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente.',
                'update_password_error' => 'Houve um problema ao alterar a senha do usuário. Por favor, tente novamente.',
            ],
        ],

        'products' => [
            'create_error' => 'Houve um problema ao criar esse produto. Por favor, tente novamente.',
            'update_error' => 'Houve um problema ao atualizar este produto. Por favor, tente novamente.',
            'delete_error' => 'Houve um problema ao excluir este produto. Por favor, tente novamente.',
            'belongs_user' => 'Este produto não pertence ao seu usuário!',
            'category_error' => 'Não existem categorias cadastradas',

            'sizes' => [
                'create_error' => 'Houve um problema ao criar a medida deste produto. Por favor, tente novamente.',
                'update_error' => 'Houve um problema ao atualizar a medida deste produto. Por favor, tente novamente.',
                'delete_error' => 'Houve um problema ao excluir a medida deste produto. Por favor, tente novamente.',
            ],

            'categories' => [
                'create_error' => 'Houve um problema ao criar a categoria deste produto. Por favor, tente novamente.',
                'update_error' => 'Houve um problema ao atualizar a categoria deste produto. Por favor, tente novamente.',
                'delete_error' => 'Houve um problema ao excluir a categoria deste produto. Por favor, tente novamente.',
                'have_products' => 'Você não pode excluir uma categoria que esteja atribuída a um produto.',
                'parent_error' => 'Não é possível excluir uma categoria principal que tenha outras categorias atribuídas a ela.',
                'main' => 'Categoria Principal',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Sua conta já está confirmada.',
                'confirm' => 'Confirme sua conta!',
                'created_confirm' => 'Sua conta foi criada com sucesso. Enviamos um e-mail para você confirmar a sua conta.',
                'mismatch' => 'Seu código de confirmação não corresponde.',
                'not_found' => 'Esse código de confirmação não existe.',
                'resend' => 'Sua conta não está confirmada. Por favor, clique no link de confirmação em seu e-mail, ou <a href="' . route('account.confirm.resend', ':user_id') . '">clique aqui</a> para reenviar o e-mail de confirmação.',
                'success' => 'Sua conta foi confirmada com sucesso!',
                'resent' => 'Um novo e-mail de confirmação foi enviado para você.',
            ],

            'deactivated' => 'Sua conta foi desativada.',
            'email_taken' => 'Esse endereço de e-mail já foi utilizado.',

            'password' => [
                'change_mismatch' => 'Essa não é a sua senha antiga.',
            ],


        ],
    ],
];
