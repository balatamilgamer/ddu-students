<?php 

$questions = array(
    array(
        'question' => 'What is the capital of France?',
        'answers' => array(
            'Paris',
            'London',
            'Berlin',
            'Rome'
        ),
        'correct' => 'Paris'
    ),
    array(
        'question' => 'What is the capital of Germany?',
        'answers' => array(
            'Paris',
            'London',
            'Berlin',
            'Rome'
        ),
        'correct' => 'Berlin'
    ),
    array(
        'question' => 'What is the capital of Italy?',
        'answers' => array(
            'Paris',
            'London',
            'Berlin',
            'Rome'
        ),
        'correct' => 'Rome'
    ),
);

echo json_decode($questions);

?>