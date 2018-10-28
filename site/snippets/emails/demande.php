Date de soumission: <?php echo date("d/m/Y - h:i") ?>
NOM du porteur de projet: <?php echo $data['name'] ?> 
PRENOM du porteur de projet: <?php echo $data['firstname'] ?> 
NOM de la structure / compagnie: <?php echo $data['structurename'] ?> 
REGION d’implantation: <?php echo $data['region'] ?> 
Contact administration (nom, prénom): <?php echo $data['contact'] ?> 
ADRESSE du siège social : <?php echo $data['adresse'] ?> 
TELEPHONE 1: <?php echo $data['telephone1'] ?> 
TELEPHONE 2: <?php echo $data['telephone2'] ?> 
EMAIL 1: <?php echo $data['email1'] ?> 
EMAIL 2: <?php echo $data['email2'] ?> 

TITRE du projet : <?php echo $data['titre'] ?> 
Distribution complète : <?php echo $data['distribution'] ?> 
Période(s) de travail en studio demandée(s) : <?php echo $data['periode'] ?> 
Nombre de personnes en résidence pour la ou les période(s) de travail en studio demandée(s) : <?php echo $data['nombrepersonne'] ?> 
Calendrier de création : <?php echo $data['calendrier'] ?> 
Montant du budget de création : <?php echo $data['budget'] ?> 
Montant de l’aide sollicitée : <?php echo $data['aide'] ?> 
Coproductions et dates envisagés et confirmés : <?php echo $data['coproductions'] ?> 
Liens vidéo d’extraits du projet: <?php echo $data['liensvideos'] ?> 
Pièce-jointe 1 : dossier de présentation du projet (distribution, note d’intention, biographies…): http://www.ccn-orleans.com/content/<?php echo $data['presentation']['name'] ?> 
Pièce-jointe 2 : le budget: http://www.ccn-orleans.com/content/<?php echo $data['budgetpdf']['name'] ?> 
 