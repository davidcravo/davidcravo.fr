<?php

function get_csv_files($file, $template){

    // Ouverture du fichier
    $csv_file = fopen($file, 'r');

    // Ignorer la première ligne (en-têtes)
    fgetcsv($csv_file);

    // Tableau pour stocker les projets
    $files = [];

    // Lecture des lignes du fichier CSV
    while (($data = fgetcsv($csv_file, 1000, ';')) !== FALSE){
        if($template === "achievements"){
            $files[] = [
                'id' => $data[0],
                'name' => $data[1],
                'client' => $data[2],
                'technologies' => $data[3],
                'description' => $data[4],
                'date' => $data[5],
                'url' => $data[6],
                'image' => $data[7]
            ];
        }elseif($template === 'education'){
            $files[] = [
                'id' => $data[0],
                'name' => $data[1],
                'date' => $data[2],
                'training_center' => $data[3],
                'image' => $data[4]
            ];
        }elseif($template === 'experience'){
            $files[]= [
                'id' => $data[0],
                'role' => $data[1],
                'company' => $data[2],
                'start_date' => $data[3],
                'end_date' => $data[4],
                'city' => $data[5],
                'description' => $data[6],
                'logo' => $data[7]
            ];
        }elseif($template === 'programing_languages'){
            $files[]= [
                'id' => $data[0],
                'name' => $data[1],
                'logo' => $data[2],
                'description' => $data[3]
            ];
        }elseif($template === 'frameworks'){
            $files[]= [
                'id' => $data[0],
                'name' => $data[1],
                'logo' => $data[2],
                'description' => $data[3]
            ];
        }elseif($template === 'database'){
            $files[]= [
                'id' => $data[0],
                'name' => $data[1],
                'logo' => $data[2],
                'description' => $data[3]
            ];
        }elseif($template === 'tools'){
            $files[]= [
                'id' => $data[0],
                'name' => $data[1],
                'logo' => $data[2],
                'description' => $data[3]
            ];
        }elseif($template === 'foreign_languages'){
            $files[]= [
                'id' => $data[0],
                'name' => $data[1],
                'logo' => $data[2],
                'description' => $data[3]
            ];
        }
    }

    // Fermeture du fichier
    fclose($csv_file);

    return $files;
}