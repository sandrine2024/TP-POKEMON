<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POKEMON</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="https://www.freeiconspng.com/thumbs/pokeball-png/file-pokeball-png-0.png" type="image/x-icon">

</head>

<body>
    <main>

        <?php


        /*
    TP ---
------

Créer une class Pokemon 
	propriétés protected
    	- nom
        - puissance (int)
        - vie (int)
        - vitesse (int)
        - image (facultative)
        
        
Créer au moins 3 class : Eau, Feu, Roche, Acier .... 

ces class vont hériter dans la class Pokemon
	créer une constante TYPE qui contiendra le type 


créer qq 2-3 objets de chaque type
à l'instanciation de l'objet, il faudra obligatoirement définir les propriétes obligatoires (toutes sauf image)


Créer une méthode public dans les class fille et générer une belle fiche 

Créer une méthode static dans la class Mère Pokemon fight :
	2 arguments (objets)
    le plus rapide (vitesse) donne le coup
    soustaire à l'autre la frappe (puissance) de sa vie
*/


        class Pokemon
        {
            protected $nom;
            protected $puissance;
            protected $vie;
            protected $vitesse;
            protected $image;
            protected $couleur;

            function getVitesse()
            {
                return $this->vitesse;
            }
            function getNom()
            {
                return $this->nom;
            }
            function getPuissance()
            {
                return $this->puissance;
            }
            function getVie()
            {
                return $this->vie;
            }
            function setVie($attaquer)
            {
                return $this->vie = $attaquer;
            }

            public function __construct($nom, $puissance, $vie, $vitesse, $image)
            {
                $this->nom = $nom;
                $this->puissance = $puissance;
                $this->vie = $vie;
                $this->vitesse = $vitesse;
                $this->image = $image;
            }

            public static function fight(object $Pokemon1, object $Pokemon2)
            {
                $vitesse1 = $Pokemon1->getVitesse();
                $vitesse2 = $Pokemon2->getVitesse();
                // Vérifie si les deux Pokémon ont encore des points de vie
                if ($Pokemon1->getVie() != 0 && $Pokemon2->getVie() != 0) {
                    // Si le Pokémon 1 est plus rapide que le Pokémon 2
                    if ($vitesse1 > $vitesse2) {
                        // Réduit les points de vie du Pokémon 2 en fonction de la puissance du Pokémon 1
                        $nouvelleViePokemon2 = $Pokemon2->getVie() - $Pokemon1->getPuissance();
                        $Pokemon2->setVie($nouvelleViePokemon2);

                        // Vérifie si le Pokémon 2 est toujours en vie
                        if ($Pokemon2->getVie() > 0) {
                            // Réduit les points de vie du Pokémon 1 en fonction de la puissance du Pokémon 2
                            $nouvelleViePokemon1 = $Pokemon1->getVie() - $Pokemon2->getPuissance();
                            $Pokemon1->setVie($nouvelleViePokemon1);
                        } else {
                            return " <h5 style='color:red'> ". $Pokemon2->getNom() . " est mort </h5>"; // Affiche un message si le Pokémon 2 est vaincu
                        }
                    } else { // Si le Pokémon 2 est plus rapide que le Pokémon 1
                        // Réduit les points de vie du Pokémon 1 en fonction de la puissance du Pokémon 2
                        $nouvelleViePokemon1 = $Pokemon1->getVie() - $Pokemon2->getPuissance();
                        $Pokemon1->setVie($nouvelleViePokemon1);

                        // Vérifie si le Pokémon 1 est toujours en vie
                        if ($Pokemon1->getVie() > 0) {
                            // Réduit les points de vie du Pokémon 2 en fonction de la puissance du Pokémon 1
                            $nouvelleViePokemon2 = $Pokemon2->getVie() - $Pokemon1->getPuissance();
                            $Pokemon2->setVie($nouvelleViePokemon2);
                        } else {
                            return " <p style='color:red'>" . $Pokemon1->getNom() ." est mort</p>"; // Affiche un message si le Pokémon 1 est vaincu"
                        }
                    }
                }
                
            }
        }

        class Eau extends Pokemon
        {
            public const TYPE = "eau";
            public const COULEUR = "#79B6F6";
            public function information(): string
            {
                return " <div class='col-md-4 ms-5 mt-5' style='width:250px '>
        <div class='card bg-default mb-3 border border-1 border-black shadow' style='background-color :" . $this::COULEUR . "' >
        <div class='card-header d-flex justify-content-between'><b>$this->nom</b><b>$this->vie PV</b></div>
        <img class='card-img-top px-2 pt-1 border border-2 border-light'style='height: 250px ; border-radius:10px' src='$this->image' alt='$this->nom'>
        <hr class='w-75 mx-auto'>
        <div class='text-center fst-italic'>" . $this::TYPE . "  </div>
        <div class='card-body'>
           <div class='card-text d-flex justify-content-between'> 
              <b>Puissance :</b> 
              <p> $this->puissance</p>
           </div>
           <div class='card-text d-flex justify-content-between'> 
              <b>Vitesse :</b> 
              <p> $this->vitesse</p>
           </div>
         </div>
        </div>
     </div>";;
            }
        }
        class Feu extends Pokemon
        {
            public const TYPE = "feu";
            public const COULEUR = "#FF6868";
            public function information(): string
            {
                return " <div class='col-md-4 ms-5 mt-5' style='width:250px '>
        <div class='card bg-default mb-3 border border-1 border-black shadow' style='background-color :" . $this::COULEUR . "' >
        <div class='card-header d-flex justify-content-between'><b>$this->nom</b><b>$this->vie PV</b></div>
        <img class='card-img-top px-2 pt-1 border border-2 border-light'style='height: 250px ;border-radius:10px' src='$this->image' alt='$this->nom'>
        <hr class='w-75 mx-auto'>
        <div class='text-center fst-italic'> " . $this::TYPE . " </div>
        <div class='card-body'>
           <div class='card-text d-flex justify-content-between'> 
              <b>Puissance :</b> 
              <p> $this->puissance</p>
           </div>
           <div class='card-text d-flex justify-content-between'> 
              <b>Vitesse :</b> 
              <p> $this->vitesse</p>
           </div>
         </div>
        </div>
     </div>";;
            }
        }
        class Roche extends Pokemon
        {
            public const TYPE = "roche";
            public const COULEUR = "#79B6F6";
            public function information(): string
            {
                return " <div class='col-md-4 ms-5 mt-5' style='width:250px '>
        <div class='card bg-default mb-3 border border-1 border-black shadow' style='background-color :" . $this::COULEUR . "' >
        <div class='card-header d-flex justify-content-between'><b>$this->nom</b><b>$this->vie PV</b></div>
        <img class='card-img-top px-2 pt-1 border border-2 border-light'style='height: 250px ;border-radius:10px' src='$this->image' alt='$this->nom'>
        <hr class='w-75 mx-auto'>
        <div class='text-center fst-italic'> " . $this::TYPE . "  </div>
        <div class='card-body'>
           <div class='card-text d-flex justify-content-between'> 
              <b>Puissance :</b> 
              <p> $this->puissance</p>
           </div>
           <div class='card-text d-flex justify-content-between'> 
              <b>Vitesse :</b> 
              <p> $this->vitesse</p>
           </div>
         </div>
        </div>
     </div>";;
            }
        }
        class Plante extends Pokemon
        {
            public const TYPE = "plante";
            public const COULEUR = "#90D26D";
            public function information(): string
            {
                return " <div class='col-md-4 ms-5 mt-5' style='width:250px '>
        <div class='card bg-default mb-3 border border-1 border-black shadow' style='background-color :" . $this::COULEUR . "' >
        <div class='card-header d-flex justify-content-between'><b>$this->nom</b><b>$this->vie PV</b></div>
        <img class='card-img-top px-2 pt-1 border border-2 border-light'style='height: 250px ;border-radius:10px' src='$this->image' alt='$this->nom'>
        <hr class='w-75 mx-auto'>
        <div class='text-center fst-italic'>" . $this::TYPE . " </div>
        <div class='card-body'>
           <div class='card-text d-flex justify-content-between'> 
              <b>Puissance :</b> 
              <p> $this->puissance</p>
           </div>
           <div class='card-text d-flex justify-content-between'> 
              <b>Vitesse :</b> 
              <p> $this->vitesse</p>
           </div>
         </div>
        </div>
     </div>";;
            }
        }
        class Electrique extends Pokemon
        {
            public const TYPE = "electrique";
            public const COULEUR = "#ffd700";
            public function information(): string
            {
                return " <div class='col-md-4 ms-5 mt-5' style='width:250px '>
        <div class='card bg-default mb-3 border border-1 border-black shadow' style='background-color :" . $this::COULEUR . "' >
        <div class='card-header d-flex justify-content-between'><b>$this->nom</b><b>$this->vie PV</b></div>
        <img class='card-img-top px-2 pt-1 border border-2 border-light'style='height: 250px ;border-radius:10px' src='$this->image' alt='$this->nom'>
        <hr class='w-75 mx-auto'>
        <div class='text-center fst-italic'> " . $this::TYPE . "  </div>
        <div class='card-body'>
           <div class='card-text d-flex justify-content-between'> 
              <b>Puissance :</b> 
              <p> $this->puissance</p>
           </div>
           <div class='card-text d-flex justify-content-between'> 
              <b>Vitesse :</b> 
              <p> $this->vitesse</p>
           </div>
         </div>
        </div>
     </div>";
            }
        }


        // Creation des pokemons
        $Leviator = new Eau("Leviator", 180, 220, 20, "https://e1.pxfuel.com/desktop-wallpaper/287/131/desktop-wallpaper-1500x1150px-gyarados-gyarados-thumbnail.jpg");
        $Dracaufeu = new Feu("Dracaufeu", 300, 250, 70, "https://purdeliz.com/wp-content/uploads/2023/04/dracaufeu.jpg");
        $Onyx = new Roche("Onyx", 90, 200, 50, "https://fbi.cults3d.com/uploaders/17560495/illustration-file/092bc247-47b6-4080-8ae5-5867d000ee3e/onix.jpg");
        $Pikachu = new Electrique("Pikachu", 250, 200, 100, "https://static.printler.com/cache/c/5/a/7/7/8/c5a7786aed7583aa0e478c3ef4131764695ef603.jpg");
        $Empiflor = new Plante("Empiflor", 225, 195, 40, "https://www.pokepedia.fr/images/thumb/5/59/Empiflor_de_James.png/300px-Empiflor_de_James.png")
        ?>
        <div class=d-flex flex-row>
            <?= $Pikachu->information() ?>
            <?= $Leviator->information() ?>
            <?= $Dracaufeu->information() ?>
            <?= $Onyx->information() ?>
            <?= $Empiflor->information() ?>
        </div>
     
        <div class="d-flex flex-column align-items-center">
         <h2 class="text-center">Combat entre Empiflor et Dracaufeu</h2>
         <?=Pokemon::fight($Dracaufeu, $Empiflor);?> 
         <div class="d-flex flex-row  justify-content-center"> Cartes après le combat
               <?=$Empiflor->information();?>
               <?=$Dracaufeu->information();?>
         </div>
      </div>
      <div class="d-flex flex-column align-items-center">
         <h2 class="text-center">Combat entre Onyx et Leviator</h2>
         <?=Pokemon::fight($Onyx, $Leviator);?> 
         <div class="d-flex flex-row  justify-content-center"> Cartes après le combat
               <?=$Onyx->information();?>
               <?=$Leviator->information();?>
         </div>
      </div>
      <div class="d-flex flex-column align-items-center">
         <h2 class="text-center">Combat entre Onyx et Leviator</h2>
         <?php Pokemon::fight($Pikachu, $Leviator);?> 
         <div class="d-flex flex-row  justify-content-center"> Cartes après le combat
               <?=$Pikachu->information();?>
               <?=$Leviator->information();?>
         </div>
      </div>