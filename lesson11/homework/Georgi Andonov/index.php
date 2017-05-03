<?php

require_once("modelHW.php");

$students_table = new Example("students");
$subjects_table = new Example("subjects");

// $data = [];
// $data["id"] = 0;
// $data["subject_name"] = 'Bulgarian';
// $data["classes_per_year"] = 144;
// $data["teacher"] = 'Shinka Dicheva';

// $subjects_table->insert($data);


// $id = 9;
// $subjects_table->delete($id);


// $result = $students_table->getById(3);
// var_dump($result);

$students_table->custom_query($subjects_table->getName(), 3);