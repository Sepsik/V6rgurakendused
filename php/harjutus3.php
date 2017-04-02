<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> PHP harjutus 3</title>
    </head>
    <body>
        <?php

            $koerad= array( 
                array('nimi'=>'Filip', 'vanus'=>6, 'tegevus'=>'söömine'), 
                array('nimi'=>'Dominiq', 'vanus'=>6, 'tegevus'=>'magamine'),
                array('nimi'=>'Liis', 'vanus'=>1, 'tegevus'=>'mängimine'),
                array('nimi'=>'Jackie', 'vanus'=>2, 'tegevus'=>'jalutamine')
        );

            foreach ($koerad as $value) {
                include ('kirjeldused.html');
            }
    

        ?>
    </body>
</html>