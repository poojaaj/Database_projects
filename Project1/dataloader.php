<?php

// Set directory containing Input Data Files
$dataFilesPath = 'Input_Data/';

// Fetch all CSV files from the directory
//$dataFiles = glob($dataFilesPath. '*.csv');

// Not fetching the filenames programmatically because `players` table need to be populated first, due to foreign
// key checks.
$dataFiles = array(
    'Input_Data/Country.csv',
    'Input_Data/Match_results.csv',
    'Input_Data/Players.csv',
    'Input_Data/Player_Assists_Goals.csv',
    'Input_Data/Player_Cards.csv',
);

// Connect to SQL DB
$con = oci_connect('paj6373', 'Jeergyal2019');
if (!$con) {
    $e = oci_error();
    echo "\nFailed to connect to SQL: " . $e['message'];
}
else{
    // Iterate over each filename in the filename array
    foreach ($dataFiles AS $file){
        $tableData = array();
        $pathInfo = pathinfo($file);
        $fileName = strtolower(substr_replace($pathInfo['basename'], '', -4, 4));
        $lines = preg_split('/\n|\r\n?/', file_get_contents($file));

        echo "\nEntering Data into table = " . $fileName . "\n";

        $count = 1;
        foreach ($lines AS $line) {
            if(!empty($line)){
                
                $lineArray = explode(',', $line);

                switch ($fileName) {
                    case 'country':
                        $sql = "INSERT INTO country (Country_name, Population, No_of_worldcup_won, Manager) VALUES ($lineArray[0], $lineArray[1], $lineArray[2], $lineArray[3])";
                        break;

                    case 'match_results':
                        $sql = "INSERT INTO match_results (Match_id, Date_of_match, Start_time_of_match, Team1, Team2, Team1_score, Team2_score, Stadium_name, Host_city) VALUES ($lineArray[0], TO_DATE($lineArray[1], 'YYYY-MM-DD'), $lineArray[2], $lineArray[3], $lineArray[4], $lineArray[5], $lineArray[6], $lineArray[7], $lineArray[8])";
                        break;

                    case 'players':
                        $sql = "INSERT INTO players (Player_id, Name, Fame, Lname, DOB, country, Height_cm, Club, Position, Caps_for_country, IS_CAPTAIN) VALUES ($lineArray[0], $lineArray[1], $lineArray[2], $lineArray[3], TO_DATE($lineArray[4], 'YYYY-MM-DD'), $lineArray[5], $lineArray[6], $lineArray[7], $lineArray[8], $lineArray[9], '$lineArray[10]')";
                        break;

                    case 'player_assists_goals':
                        $sql = "INSERT INTO player_assists_goals (Player_id, No_of_matches, Goals, Assists, Minutes_played) VALUES ($lineArray[0], $lineArray[1], $lineArray[2], $lineArray[3], $lineArray[4])";
                        break;

                    case 'player_cards':
                        $sql = "INSERT INTO player_cards (Player_id, Yellow_cards, Red_cards) VALUES ($lineArray[0], $lineArray[1], $lineArray[2])";
                        break;
                }

                echo "Row Count: " . $count . ' - ';
                echo $sql . "\n";
                $count++;
               insert_data($sql, $con);
            }
        }
    }
}

function insert_data($sql, $con){
    $result = oci_parse($con, $sql);
    if(oci_execute($result))
        echo " - Data inserted\n";
    else{
        $e = oci_error();
        echo "\n" . $e['message'];
    }
}


