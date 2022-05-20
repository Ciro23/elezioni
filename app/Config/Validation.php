<?php

namespace Config;

use App\Validation\UserRules;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        UserRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
		'custom_errors' => '_error_list',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $user = [
		"tessera_elettorale" => "required|is_unique[utenti.tessera_elettorale]|max_length[10]",
		"nome" => "required|alpha_space|max_length[30]",
		"cognome" => "required|alpha_space|max_length[30]",
        "eta" => "required|integer",
		"sesso" => "required",
        "regione" => "required|integer",
	];
}
