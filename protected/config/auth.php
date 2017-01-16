<?php
return array(

	'guest' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'guest',
		'bizRule' => null,
		'data' => null
	),
	'user' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'user',
		'children' => array(
				'guest',
				),
		'bizRule' => null,
		'data' => null
	),

	'Support' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Support',
		'children' => array(
				'user',
				),
		'bizRule' => null,
		'data' => null
	),
	'Staffer' => array(
		'type' => CAuthItem::TYPE_ROLE,
			'description' => 'Staffer',
		'children' => array(
			'user',
			),
		'bizRule' => null,
		'data' => null
	),
	'Admin' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'Admin',
		'children' => array(
				'Support', 'Staffer'
				),
		'bizRule' => null,
		'data' => null
	),
);
