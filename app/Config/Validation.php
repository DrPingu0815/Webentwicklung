<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];



    public array $taskbearbeiten = [
        "tasks" => 'required',
        "taskart" => 'required',
        "person" => 'required',
        "erstellungsdatum" => 'required',
        "erinnerungsdatum" => 'required',
        "erinnerung" => 'required',
        "notiz" => 'required',
        "spalte" => 'required',
    ];


    public array $taskbearbeiten_errors =
        [
        'tasks' => ['required' => 'Bitte tragen Sie eine Taskbezeichnung ein.'],
        'taskart' => ['required' => 'Bitte tragen Sie eine Taskart ein.'],
        'person' => ['required' => 'Bitte geben Sie eine Person an.'],
        'erstellungsdatum' => ['required' => 'Bitte geben Sie ein Erstellungsdatum an.'],
        'erinnerungsdatum' => ['required' => 'Bitte geben Sie ein Erinnerungsdatum an.'],
        'erinnerung' => ['required' => 'Bitte geben Sie eine Erinnerung an.'],
        'notiz' => ['required' => 'Bitte tragen Sie eine Notiz ein.'],
        'spalte' => ['required' => 'Bitte geben Sie eine Spalte an.']
        ];



    public array $spaltenbearbeiten = [
        "spaltenbeschreibung" => 'required',
        "spalte" => 'required',
        "sortid" => 'required',

    ];


    public array $spaltenbearbeiten_errors =
        [
            'spaltenbeschreibung' => ['required' => 'Bitte tragen Sie eine Spaltenbeschreibung ein.'],
            'spalte' => ['required' => 'Bitte tragen Sie eine Spaltenbezeichnung ein.'],
            'sortid' => ['required' => 'Bitte tragen Sie eine SortID ein.'],

        ];



    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}




