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
        'email'=> [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'liensvideos' => [
            'rules' => ['required'],
            'message' => 'Ce champ est requis',
        ],
        'cv' => [
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
        'picture' => [
            'rules' => [
                'required',
                'file',
                'mime' => ['image/jpeg'],
                'filesize' => 5000,
            ],
            'message' => [
                'Please choose a file.',
                'Please choose a file.',
                'Please choose a JPG.',
                'Please choose a file that is smaller than 5 MB.',
            ],
        ],


    ]);

    

    if (r::is('POST')) {
        $form->emailAction([
            'to' => 'production@ccn-orleans.com',
            //'to' => 'garcinsarah@gmail.com',
            'from' => 'production@ccn-orleans.com',
            'subject' => 'Nouvelle audition Paris',
            // Use a snippet for the email body (see below).
            'snippet' => 'emails/demandeauditionsparis',
        ])
        ->emailAction([
            // Send the success email to the email address of the submitter.
            'to' => $form->data('email'),
            'from' => 'production@ccn-orleans.com',
            // Set replyTo manually, else it would be set to the value of 'email'.
            'replyTo' => 'production@ccn-orleans.com',
            'subject' => '[CCNO] - Confirmation auditions de Paris',
            // Use a snippet for the email body (see below).
            'snippet' => 'emails/successauditionsparis',
        ])
        ->uploadAction(['fields' => [
            'cv' => [
                'target' => kirby()->roots()->content().'/auditions-paris',
                'prefix' => false,
            ],
            'picture' => [
                'target' => kirby()->roots()->content().'/auditions-paris',
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