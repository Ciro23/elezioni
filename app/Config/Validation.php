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

    public array $user = [
		"tessera_elettorale" => "required|is_unique[utenti.tessera_elettorale]|max_length[9]",
		"nome" => "required|alpha_space|max_length[30]",
		"cognome" => "required|alpha_space|max_length[30]",
        "email" => "required|valid_email|is_unique[utenti.email]",
        "eta" => "required|integer",
		"sesso" => "required",
        "regione" => "required|integer",
	];

    public array $user_errors = [
        "tessera_elettorale" => [
            "required" => "Il numero tessera elettorale non può essere lasciato vuoto",
            "is_unique" => "Esiste già un utente registrato con questa tessera elettorale",
            "max_length" => "Il numero tessera elettorale non può superare i 9 caratteri",
        ],
        "nome" => [
            "required" => "Il nome non può essere lasciato vuoto",
            "alpha_space" => "Il nome può contenere solo lettere e spazi",
            "max_length" => "Il nome non può essere più lungo di 30 caratteri",
        ],
        "cognome" => [
            "required" => "Il cognome non può essere lasciato vuoto",
            "alpha_space" => "Il cognome può contenere solo lettere e spazi",
            "max_length" => "Il cognome non può essere più lungo di 30 caratteri",
        ],
        "email" => [
            "required" => "L'email non può essere lasciata vuota",
            "valid_email" => "Formato email errato",
            "max_length" => "L'email è già registrata",
        ],
        "eta" => [
            "required" => "L'età non può essere lasciata vuota",
            "integer" => "L'età deve essere un numero",
        ],
        "sesso" => [
            "required" => "Seleziona un sesso",
        ],
        "regione" => [
            "required" => "Seleziona una regione",
        ],
    ];

    public array $login = [
        "pin" => "required|does_pin_exist[pin]|has_not_voted[pin]",
    ];

    public array $login_errors = [
        "pin" => [
            "does_pin_exist" => "Il pin non esiste",
            "has_not_voted" => "Impossibile votare più di una volta",
        ],
    ];

    public array $vote = [
        "partito" => "required",
    ];

    public array $vote_errors = [
        "partito" => [
            "required" => "Seleziona un partito",
        ],
    ];
}
