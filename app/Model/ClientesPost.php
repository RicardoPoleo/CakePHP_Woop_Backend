<?php
App::uses('AppModel', 'Model');
/**
 * ClientesPost Model
 *
 * @property Clientes $Clientes
 */
class ClientesPost extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'clientes_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descripcion' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Clientes' => array(
			'className' => 'Clientes',
			'foreignKey' => 'clientes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
