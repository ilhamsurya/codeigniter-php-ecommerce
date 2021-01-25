<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $mahasiswa = [
	'trx_file' => 'uploaded[trx_file]|ext_in[trx_file,xls,xlsx]|max_size[trx_file,1000]',
	];

	public $mahasiswa_errors = [
	'trx_file'=> [
	'ext_in' => 'File Excel hanya boleh diisi dengan xls atau xlsx.',
	'max_size' => 'File Excel product maksimal 1mb',
	'uploaded' => 'File Excel product wajib diisi'
	]
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}