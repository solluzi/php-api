<?php

declare(strict_types=1);
/**
 * @author Mauro J. Miranda <mauro.miranda@solluzi.com.br>
 * @copyright 2019 Solluzi Tecnologia
 * @package App
 * @license MIT
 */

namespace App\Controller;

use Db\Filter;
use Db\Criteria;
use Db\Repository;
use Session\JWTWrapper;
use Controller\iMiddleware;
use Controller\Request;
use Validation\InputRequiredValidator;
use Db\Transaction;
use General\BCrypt;

class LoginController implements iMiddleware
{
    public function handle()
    {
        $data = new Request();

        try {
            // validação de campos
            InputRequiredValidator::fromString('Login', $data->username);
            InputRequiredValidator::fromString('Senha', $data->password);

            Transaction::open('api');
            $criteria = new Criteria();

            $criteria->add(new Filter('email', '=', "{$data->username}"));
            $criteria->add(new Filter('status', '=', 'Y'));

            $repository = new Repository('App\Model\SystemUser');
            $permanecer = (isset($data->remember)) ? 86400 : 3600;
            $results = $repository->load($criteria);

            if ($results) {
                $passwordRepository = new Repository('App\Model\UserLogin');
                $passCriteria = new Criteria();
                $passCriteria->add(new Filter('user_id', '=', $results[0]->id));
                $passResult = $passwordRepository->load($passCriteria);

                if (BCrypt::check($data->password, $passResult[0]->password)) {
                    $jwt = JWTWrapper::encode([
                        'expiration_sec' => $permanecer,
                        'iss' => 'solluzi.com.br',
                        'userdata' => [
                            'id'   => $results[0]->id,
                            'name' => $results[0]->firstname
                        ]
                    ]);
                    $return = [
                        'login'       => true,
                        'expiresIn'   => $permanecer,
                        'displayName' => $results[0]->firstname,
                        'idToken'     => $jwt,
                        'registered'  => true
                    ];
                    return $this->json($return);
                }
            } else {
                return $this->json(['login' => false, 'message' => 'Login Invalido']);
            }
            Transaction::close();
        } catch (\Exception $e) {
            return $this->json(['login' => false, 'message' => 'Login Invalido']);
        }
    }
}
