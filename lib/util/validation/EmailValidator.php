<?php
declare(strict_types=1);
use SebastianBergmann\RecursionContext\InvalidArgumentException;


/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 */

 namespace util\validation;

 final class EmailValidator
 {
     private $email;

     private function __construct(string $email)
     {
         $this->ensureIsValidEmail($email);
         $this->email = $email;
     }

     public static function fromString(string $email) : self
     {
         return new self($email);
     }

     public function __toString() : string 
     {
         return $string->email;
     }

     private function ensureIsValidEmail(string $email) : void
     {
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             throw new InvalidArgumentException(
                 sprintf(
                     '"%s" is not a valid email address',
                     $email
                 )
             );
             
         }
     }
 }

