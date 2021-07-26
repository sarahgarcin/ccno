<?php

use Uniform\Form;

return function ($site, $pages, $page)
{
    $form = new Form([
        'name' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'firstname'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'structurename'=> [],
        'region' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'contact' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'adresse' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'telephone1' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'telephone2' => [],
        'email1' => [
            'rules' => ['required', 'email'],
            'message' => 'Merci d\'ajouter une adresse email valide',
        ],
        'email2' => [],
        'titre' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'distribution' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'periode' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'nombrepersonne' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'calendrier' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'budget' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'aide' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'coproductions' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'liensvideos' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'presentation' => [
            'rules' => [
                'required',
                'file',
                'mime' => ['application/pdf'],
                'filesize' => 5000,
            ],
            'message' => [
                'Please choose a file.',
                'Please choose a file.',
                'Please choose a PDF.',
                'Please choose a file that is smaller than 5 MB.',
            ],
        ],
        'budgetpdf' => [
            'rules' => [
                'required',
                'file',
                'mime' => ['application/pdf'],
                'filesize' => 5000,
            ],
            'message' => [
                'Please choose a file.',
                'Please choose a file.',
                'Please choose a PDF.',
                'Please choose a file that is smaller than 5 MB.',
            ],
        ],


    ]);

    

    if (r::is('POST')) {
        $form->emailAction([
            'to' => 'elsajourdain@ccn-orleans.com',
            //'to' => 'garcinsarah@gmail.com',
            'from' => 'elsajourdain@ccn-orleans.com',
            'subject' => 'Nouvelle demande de prêt de studio et accueil studio',
            // Use a snippet for the email body (see below).
            'snippet' => 'emails/demande',
        ])
        ->emailAction([
            // Send the success email to the email address of the submitter.
            'to' => $form->data('email1'),
            'from' => 'elsajourdain@ccn-orleans.com',
            // Set replyTo manually, else it would be set to the value of 'email'.
            'replyTo' => 'elsajourdain@ccn-orleans.com',
            'subject' => '[CCNO] - Confirmation de demande de prêt de studio et accueil studio',
            // Use a snippet for the email body (see below).
            'snippet' => 'emails/success',
        ])
        ->uploadAction(['fields' => [
            'presentation' => [
                'target' => kirby()->roots()->content().'/demande-accueil-studio',
                'prefix' => false,
            ],
            'budgetpdf' => [
                'target' => kirby()->roots()->content().'/demande-accueil-studio',
                'prefix' => false,
            ],
        ]])
        ->logAction([
            'file' => kirby()->roots()->content().'/messages.log', 
            'snippet' => 'uniform/log-json',
        ]);
    }

    return compact('form');
};