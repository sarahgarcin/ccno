Date de soumission: <?php echo date("d/m/Y - h:i") ?>

NOM DE L'ENFANT: <?php echo $data['lastname'] ?> 
PRENOM DE L'ENFANT: <?php echo $data['firstname'] ?> 
AGE DE L'ENFANT: <?php echo $data['birthdate'] ?>

NOM DU RESPONSABLE: <?php echo $data['responsable'] ?> 
PRENOM DU RESPONSABLE: <?php echo $data['responsablefirst'] ?> 
EMAIL: <?php echo $data['email'] ?> 
TÉLÉPHONE: <?php echo $data['phone'] ?> 

Expliquez la pratique de la danse de votre enfant : <?php echo $data['danse'] ?>

Choix de la date de l’audition : <?php echo $data['auditiondate'] ?>

Êtes-vous disponibles sur l’ensemble des périodes de répétitions? : <?php echo $data['repet'] ?> 

Liens vidéo: <?php echo $data['liensvideos'] ?> 
Photo: http://www.ccn-orleans.com/content/auditions-2022/<?php echo $data['picture']['name'] ?> 


Accéder au tableau csv de toutes les candidatures : http://www.ccn-orleans.com/content/auditions-2022/auditions-2022.csv
