<?php

$loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

echo "<p>{$loremIpsum}</p>";
echo "Panjang Karakter: " . strlen($loremIpsum) . "<br>";
echo "Panjang Kata: " . str_word_count($loremIpsum) . "<br>";
echo "<p>" . strtoupper($loremIpsum) . "</p>";
echo "<p>" . strtolower($loremIpsum) . "</p>";

?>