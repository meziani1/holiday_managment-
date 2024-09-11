<?php
class Certificat extends AppModel {
    public $name = 'Certificat';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
       // Méthode pour calculer le nombre de jours restants avant la fin du congé
       public function calculateDaysRemaining($date_fin) {
        $currentDate = new DateTime(); // Date actuelle
        $endDate = new DateTime($date_fin); // Date de fin du congé

        // Calculer la différence entre la date actuelle et la date de fin
        $interval = $currentDate->diff($endDate);

        // Si la date de fin est déjà passée, retourner 0
        if ($endDate < $currentDate) {
            return 0;
        }

        return $interval->days; // Retourne le nombre de jours restants
    }


  
}
?>
