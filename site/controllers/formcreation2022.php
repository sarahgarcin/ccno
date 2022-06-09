<?php

use Uniform\Form;

return function ($site, $pages, $page)
{
    $form = new Form([
        'lastname' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'firstname'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'birthdate'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'responsable'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'responsablefirst'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'email'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'phone'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'danse'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'auditiondate'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'repet'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'liensvideos' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'picture' => [
            'rules' => [
                'required',
                'file',
                'mime' => ['application/pdf', 'image/jpeg', 'image/png'],
                'filesize' => 5000,
            ],
            'message' => [
                'Please choose a file.',
                'Please choose a file.',
                'Please choose a JPG.',
                'Please choose a file that is smaller than 5 MB.',
            ],
        ],
        // 'docs' => [
        //     'rules' => [
        //         'file',
        //         'mime' => ['application/pdf','image/jpeg', 'image/png'],
        //         'filesize' => 5000,
        //     ],
        //     'message' => [
        //         'Please choose a file.',
        //         'Please choose a file.',
        //         'Please choose a PDF.',
        //         'Please choose a file that is smaller than 5 MB.',
        //     ],
        // ],


    ]);

    

    if (r::is('POST')) {
        $form->emailAction([
            'to' => 'margauxroy.ccno@gmail.com',
            //'to' => 'production@ccn-orleans.com',
            //'to' => 'garcinsarah@gmail.com',
            'from' => 'production@ccn-orleans.com',
            //'from' => 'garcinsarah@gmail.com',
            'subject' => 'Audition création 2022',
            // Use a snippet for the email body (see below).
            'snippet' => 'emails/demandecreation2022',
        ])
        ->uploadAction(['fields' => [
            // 'docs' => [
            //     'target' => kirby()->roots()->content().'/auditions-2022',
            //     'prefix' => false,
            // ],
            'picture' => [
                'target' => kirby()->roots()->content().'/auditions-2022',
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