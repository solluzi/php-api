<?php

declare(strict_types=1);
/**
 * @author Name <email@email.com>
 * @copyright 2019 Name
 * @package category
 * @license MIT
 */

namespace Traits;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Db\Transaction;
use Db\Repository;
use Db\Criteria;

/**
 *
 */
trait SendMailTrait
{
    /**
     * Método para envio de e-mail com a senha de acesso ao sistema
     *
     * @param [type] $password
     * @param [type] $template
     * @param [type] $recipient
     * @return void
     */
    public function sendPassword($password, $template = null, $recipient = null)
    {
        $mail = new PHPMailer(true);
        try {
            Transaction::open('api');
            $preference = new Repository('App\Model\Preference');
            $criteria = new Criteria();
            $preference_loads = $preference->load($criteria);

            if ($preference_loads) {
                // Server settings
                //$mail->SMTPDebug = 1;
                $mail->isSMTP();
                $mail->CharSet    = 'UTF-8';
                $mail->Host       = $preference_loads[0]->host;
                $mail->SMTPAuth   = ($preference_loads[0]->auth == 'Y') ? true : false;
                $mail->Username   = $preference_loads[0]->username;
                $mail->Password   = $preference_loads[0]->pass;
                $mail->SMTPSecure = 'tls';
                $mail->Port       = $preference_loads[0]->port;

                // Recipients
                $mail->setFrom($preference_loads[0]->mail_from, $preference_loads[0]->domain);
                $mail->addAddress($recipient);
                $mail->addReplyTo($preference_loads[0]->support);
                Transaction::close();

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Senha';
                $mail->Body    = "<b>Sua senha de acesso é $password";
                $mail->AltBody = "Sua senha de acesso é $password";

                // Send
                $mail->send();
                return 'success';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
