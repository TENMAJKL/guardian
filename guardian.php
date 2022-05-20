<?php

$password = readline('Enter password: ');

$from = (int) readline('Enter starting position of generation: ');
$to = (int) readline('Enter number of generated passwords: ');

echo PHP_EOL;

$seed = array_reduce(str_split(sha1($password)), fn($carry, $item) => $carry+ord($item));

srand($seed);

foreach (range(1, $from) as $_) {
    rand();
}

foreach(range(1, $to) as $_) {
    $base = str_split(str_shuffle(sha1(rand(-$seed, $seed) + $seed).'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+-)'));
    echo array_reduce(array_rand($base, 20), fn($carry, $item) => $carry.$base[$item]), PHP_EOL;
}

echo PHP_EOL;
