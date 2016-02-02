<?php
/**
 * LikeFixture
 *
 */
class LikeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'post_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'restaurante_rif' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'clientes_correo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'creacion' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'post_id' => 1,
			'restaurante_rif' => 'Lorem ipsum dolor sit amet',
			'clientes_correo' => 'Lorem ipsum dolor sit amet',
			'creacion' => '2015-09-26 15:25:30'
		),
	);

}
