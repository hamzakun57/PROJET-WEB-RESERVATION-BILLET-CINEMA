<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
     // Paramètres généraux pour l'email
     public $fromEmail = 'uizcinema@gmail.com';  // L'email de l'expéditeur
     public $fromName  = 'Cinema Ticket';          // Le nom de l'expéditeur
 
     public $recipients = '';  // Destinataire, vide ici mais à définir dans le contrôleur
 
     // Utilisation de SMTP pour envoyer les e-mails
     public $protocol = 'smtp';
 
     // Configuration du serveur SMTP (ici pour Gmail)
     public $SMTPHost = 'smtp.gmail.com';  // Serveur SMTP
     public $SMTPUser = 'uizcinema@gmail.com';  // Votre adresse e-mail Gmail
     public $SMTPPass = 'gsif yxsr mmmi mqxz'; // Mot de passe de votre compte Gmail
     public $SMTPPort = 587;  // Port SMTP (587 pour TLS, 465 pour SSL)
     public $SMTPCrypto = 'tls'; // Utilisation de TLS pour sécuriser la connexion
 
     // Paramètres supplémentaires
     public $mailType = 'html';  // Format HTML
     public $charset = 'UTF-8';  // Encodage du message
     public $wordWrap = true;    // Enveloppe des lignes pour éviter les coupures
     public $validate = false;   // Désactive la validation du serveur (vous pouvez la laisser comme ça si vous n'avez pas de besoin spécifique)
 }
