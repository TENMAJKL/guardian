<?php

$password = readline('Enter password: ');

$from = (int) readline('Enter starting position of generation: ');
$to = (int) readline('Enter number of generated passwords: ');

$seed = (int) array_reduce(str_split(sha1($password)), fn($item, $next) => ord($next).ord($item));

srand($seed);

foreach (range(1, $from) as $_) {
    rand();
}

foreach(range(1, $to) as $_) {
    echo str_shuffle(substr(sha1(rand(-$seed, $seed) + $seed), 5, 20).'#!~@') . PHP_EOL;
}
