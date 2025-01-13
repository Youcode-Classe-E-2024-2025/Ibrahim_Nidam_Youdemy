<?php

    namespace Middleware;

    use Security\Security;

    class CsrfMiddleware {
        private $security;

        public function __construct(){
            $this->security = new Security();
        }

        public function handle($request){

            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $csrfToken = $request["csrf_token"] ?? null;

                if(!$csrfToken || !$this->security->verifyCsrfToken($csrfToken)){
                    http_response_code(403);
                    die("Forbidden: Invalid CSRF Token.");
                }
            }
            return true;
        }
    }