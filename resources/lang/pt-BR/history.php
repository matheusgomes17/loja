<?php

return [

	/*
	|--------------------------------------------------------------------------
	| History Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain strings associated to the
	| system adding lines to the history table.
	|
	*/

	'backend' => [
		'none' => 'Não há história recente.',
		'none_for_type' => 'Não há nenhum histórico para este tipo.',
		'none_for_entity' => "Não há nenhuma história para essa :entity.",
		'recent_history' => 'Histórico recente',

		'roles' => [
			'created' => 'papél criado',
			'deleted' => 'papél apagado',
			'updated' => 'papél atualizado',
		],
		'users' => [
			'changed_password' => 'mudado senha para o usuário',
			'created' => 'usuário criado',
			'deactivated' => 'usuário desativado',
			'deleted' => 'usuário apagado',
			'permanently_deleted' => 'usuário apagado permanentemente',
			'updated' => 'usuário atualizado',
			'reactivated' => 'usuário reativado',
			'restored' => 'usuário restaurado',
		],

		'products' => [
			'created' => 'produto criado',
			'deactivated' => 'produto desativado',
			'deleted' => 'produto apagado',
			'permanently_deleted' => 'produto apagado permanentemente',
			'updated' => 'produto atualizado',
			'reactivated' => 'produto reativado',
			'restored' => 'produto restaurado',

			'categories' => [
				'created' => 'categoria do produto criado',
				'deleted' => 'categoria do produto apagado',
				'updated' => 'categoria do produto atualizado',
			],

			'sizes' => [
				'created' => 'medida do produto criado',
				'deleted' => 'medida do produto apagado',
				'updated' => 'medida do produto atualizado',
			],
		],
	],
];