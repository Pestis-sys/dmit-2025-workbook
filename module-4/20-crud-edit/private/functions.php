<?php

$provincial_abbr = [
    'AB' => 'Alberta',
    'BC' => 'British Columbia',
    'MB' => 'Manitoba',
    'NB' => 'New Brunswick',
    'NL' => 'Newfoundland',
    'NT' => 'Northwest Territories',
    'NS' => 'Nova Scotia',
    'NU' => 'Nunuvut',
    'ON' => 'Ontario',
    'PE' => 'Prince Edward Island',
    'QC' => 'Quebec',
    'SK' => 'Saskatchewan',
    'YT' => 'Yukon Territories'
];


function generate_table($button_callback = null) {
    $cities = get_all_cities();

    if (count($cities) > 0) : ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-dark">
                    <th>City Name</th>
                    <th>Population</th>
                    <th>Trivia</th>

                    <?php if ($button_callback != null) : ?>
                        <th>Actions</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($cities as $city) {
                        extract($city);
                        $capital = ($is_capital) ? '&star;' : '';
                        $trivia_info = ($trivia != NULL) ? "<i class='bi bi-info-circle' data-bs-toggle='tooltip' title=\"$trivia\"></i>" : '';
                        $population = number_format($population);
                        ?>
                        <tr>
                            <td><?= "$capital $city_name, $province";?></td>
                            <td><?= $population ?></td>
                            <td><?= $trivia_info ?></td>

                            <?php 
                            if ($button_callback != null) : 
                                $buttons = call_user_func($button_callback, $city);
                                echo "<td>$buttons</td>";    
                            endif 
                            ?>

                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    <?php endif;
}


// validation area
function validate_city_input($city_name, $province, $population, $capital, $trivia, $provincial_abbr) {
    $errors = [];
    $validated_data = [];

    // city name
    $city_name = trim($city_name);
    if (empty($city_name)) {
        $errors[] = 'City name is required.';
    } elseif (strlen($city_name) < 2 || strlen($city_name) > 36) {
        $errors[] = 'City name cannot be less than 2 or more than 36 characters.';
    } 
    $city_name = htmlspecialchars($city_name);
    $validated_data['city_name'] = $city_name;

    // province or territory is the text version not the value from the select
    if (empty($province)) {
        $errors[] = 'Province is required.';
    } elseif (!array_key_exists($province, $provincial_abbr)) {
        $errors[] = 'Invalid province selected.';
    }
    $validated_data['province'] = $province;

    // population
    $population = filter_var($population, FILTER_SANITIZE_NUMBER_INT); 
    if (empty($population)) {
        $errors[] = 'Population is required.';
    } elseif ($population < 1) {
        // (!filter_var($population, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]))
        $errors[] = 'Population must be greater than 0.';
    }
    $validated_data['population'] = $population;

    // capital city (1 for yes, 0 for no)
    if (isset($capital)) {
        if ($capital != 1 && $capital != 0) {
            $errors[] = 'Invalid selection for capital.';
        } else {
            $validated_data['capital'] = $capital;
        }
    } else {
        // $capital = 0;
        $validated_data['capital'] = 0;
    }
    
    // trivia
    $trivia = trim($trivia);

    if (empty($trivia)) {
        $validated_data['trivia'] = null;
    } else {
        echo strlen($trivia);
        if (strlen($trivia) > 255) {
            $errors[] = 'Trivia must be less than 255 characters.';
        } else {
            $validated_data['trivia'] = htmlspecialchars($trivia);
        }
    }


    // can only return 1 thing from a function
    return [
        'errors' => $errors,
        'data'  => $validated_data,
        'is_valid' => empty($errors)
    ];
}

?>