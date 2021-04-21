<?php 
    // Url de l'API
    $url = "http://api.openweathermap.org/data/2.5/weather?q=İstanbul&lang=tr&units=metric&appid=44026dc6ed7057b756409d797aea0a55";

    // sonuç
    $raw = file_get_contents($url);
    // json kod
    $json = json_decode($raw);

    //Şehir
    $name = $json->name;
    
    // Hava
    $weather = $json->weather[0]->main;
    $desc = $json->weather[0]->description;

    // sıcaklık
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;

    // rüzgar
    $speed = $json->wind->speed;
    $deg = $json->wind->deg;

    
?>

<!DOCTYPE html>
    <html lang="tr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Style -->
            <link rel="stylesheet" href="style.css">
            <title>Hava Durumu</title>
            <link rel="stylesheet" href="Style.css">
        </head>
        <body>
            <div class="container text-center py-5">
                <h1><strong><?php echo $name; ?>'da hava</strong></h1>

                <div class="row justify-content-center align-items-center">
                    <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>           
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="meteo_desc text-left">
                            <h2>
                                <?php echo $feel_like; ?> °C <br />
                                <?php echo $speed; ?> Km/h  <br /> 
                                <?php echo $desc; ?>
                        </h2>
                    </div>
                </div>
            </div>
        </body>
</html>