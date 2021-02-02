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
	public $register = [
		'nama' => 'required|trim|alpha_space',
		'nim' => 'required|numeric|min_length[9]|max_length[9]',
		'email' => 'required|valid_email',
		'hobby' => 'required',
		'pendidikan' => 'required',
		'umur' => 'numeric|required',
		'jeniskelamin' => 'required',
		
	];
	
	public $register_errors = [
		'nim' => [
			'required'      => 'nim wajib diisi',
			'numeric' => 'nim hanya boleh diisi dengan huruf dan angka',
			'min_length'    => 'nim minimal terdiri dari 9 karakter',
			'max_length'    => 'nim maksimal terdiri dari 9 karakter'
		],
		'nama' => [
			'required'          => 'Nama wajib diisi',
			'alpha_space' => 'Nama hanya boleh menggunakan huruf'
		],
		'hobby' => [
		'required' => 'hobby wajib diisi',
	
		],
		'pendidikan' => [
		'required' => 'pendidikan wajib diisi',
	
		],
		'umur' => [
			'numeric' => 'umur wajib angka',
			'required' => 'pendidikan wajib diisi',
	
		],
		'jeniskelamin' => [
		'required' => 'jeniskelamin wajib diisi',
	
		],
		'email' => [
			'required'          => 'Email wajib diisi',
			'email.valid_email' => 'Email tidak valid',
		],

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