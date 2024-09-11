<?php
// File: app/Model/Conge.php
App::uses('AppModel', 'Model');

class Conge extends AppModel
{
    public $name = 'Conge';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    // Ajout de règles de validation
    public $validate = array(
        'nombreJours' => array(
            'rule' => array('comparison', '<', 22),
            'message' => 'Le nombre de jours doit être inférieur à 22.'
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

    // Validation personnalisée pour vérifier que la date de fin est après la date de début
    public function validateEndDate($check, $startDateField)
    {
        $endDate = array_values($check)[0];
        $startDate = $this->data[$this->alias][$startDateField];
        return strtotime($endDate) > strtotime($startDate);
    }
}
