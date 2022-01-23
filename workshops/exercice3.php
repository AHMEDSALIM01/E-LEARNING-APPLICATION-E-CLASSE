
<?php

    $monNom= "Salim";
    $monPrenom= "ahmed";
    $monAge= 26;
  


//affichage avec "" :

    echo "$monNom"." $monPrenom"." $monAge";
    echo '<br/>';

//affichage avec '' :

echo '$monNom'.' $monPrenom'.' $monAge';
echo '<br/>';

/* la différence entre "" et '' c'est que la première affiche la valeur d'une varieble mais la deuxiéme peut affiché just le contenue écrit entre '' */

//affichage avec Heredoc :

echo <<<EOT

    $monNom
    $monPrenom
    $monAge
EOT;
echo '<br/>';

//affichage avec Nowdoc :

echo <<<'EOT'

    $monNom
    $monPrenom
    $monAge
EOT;

/* la différence entre Heredoc et Nowdoc s'est la meme chose que "" et '' on peut dir alors que Herdoc affiche la valeur de variable mais Nowdoc affiche just le contenu écrit sur elle */

?>    

