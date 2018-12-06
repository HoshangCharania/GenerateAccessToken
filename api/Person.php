<?php
include_once 'HTTPRequest.php';
include_once 'FieldMaker.php';
class Person
	{
        /**
         * Person Object,
         * Getters and setters to follow OOP rules.
         * 
         */
        private $firstName;
        private $lastName;
        private $nickname;
        /**
         * You could usually set up your pre processed details here.
         */
        function __construct($firstName,$lastName,$nickname){
            $this->firstName=$firstName;
            $this->lastName=$lastName;
            $this->nickname=$nickname;
        }
        /**
         * @description Get First Name
         * @return firstName
         */
        protected function getFirstName(){
            return $this->firstName;
        }
        /**
         * @description Set First Name
         * @return firstName
         */
        protected function setFirstName($firstName){
            $this->firstName=$firstName;
        }
        /**
         * @description Get Last Name
         * @return String
         */
        protected function getLastName(){
            return $this->lastName;
        }
        /**
         * @description Set Last Name
         * @param lastName
         */
        protected function setLastName($lastName){
            $this->lastName=$lastName;
        }
        /**
         * @description Get Nickname
         * @return String
         */
        protected function getNickname(){
            return $this->nickname;
        }
        /**
         * @description Set Nickname
         * @return String
         */
        protected function setNickname($nickname){
            $this->nickname=$nickname;
        }
         /**
          *  @description Add to the Form
          *  @param access_token
          *  @return HTTP-Response
          */
         function add($access_token){
            $fields=new FieldMaker();
            /* Add each attribute to the fields array */
            $fields->setField('first_name',$this->getFirstName());
            $fields->setField('last_name',$this->getLastName());
            $fields->setField('nickname',$this->getNickname());
            $params=$fields->getFields(); 
            $url="https://app.iformbuilder.com/exzact/api/v60/profiles/481947/pages/3728385/records";
            $request= new HTTPRequest();
            $header = array(
                "Authorization: Bearer " . $access_token,
                "Content-Type: application/json"
            );
            $response=$request->HTTPPost($url,$params,$header);
            return $response;
         }
		
    } 
    
?>