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
        private $age;
        private $datetime;
        private $email;
        private $zip;
        private $info;
        /**
         * You could usually set up your pre processed details here.
         */
        function __construct($firstName,$lastName,$nickname,$email,$datetime,$age,$zip,$info,$id=null){
            if($id!=null){
                $this->id=$id;
            }
            $this->firstName=$firstName;
            $this->lastName=$lastName;
            $this->nickname=$nickname;
            $this->email=$email;
            $this->datetime=$datetime;
            $this->age=$age;
            $this->zip=$zip;
            $this->info=$info;
        }
        /**
         * @description Get ID
         * @return id
         */
        protected function getID(){
            return $this->id;
        }
        /**
         * @description Set ID
         * @return ID
         */
        protected function setID($id){
            $this->id=$id;
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
         * @description Get Age
         * @return String
         */
        protected function getAge(){
            return $this->age;
        }
        /**
         * @description Set Age
         * @return String
         */
        protected function setAge($age){
            $this->age=$age;
        }
        /**
         * @description Get Datetime
         * @return String
         */
        protected function getDatetime(){
            return $this->datetime;
        }
        /**
         * @description Set Datetime
         * @return String
         */
        protected function setDatetime($datetime){
            $this->datetime=$datetime;
        }
        /**
         * @description Get Email
         * @return String
         */
        protected function getEmail(){
            return $this->email;
        }
        /**
         * @description Set Email
         * @return String
         */
        protected function setEmail($email){
            $this->email=$email;
        }
        /**
         * @description Get Zip
         * @return String
         */
        protected function getZip(){
            return $this->zip;
        }
        /**
         * @description Set Zip
         * @return String
         */
        protected function setZip($zip){
            $this->zip=$zip;
        }
        /**
         * @description Get Info
         * @return String
         */
        protected function getInfo(){
            return $this->info;
        }
        /**
         * @description Set Info
         * @return String
         */
        protected function setInfo($info){
            $this->info=$info;
        }
         /**
          *  @description Add to the Form
          *  @param access_token
          *  @return HTTP-Response
          */
         public function add($access_token){
            $fields=new FieldMaker();
            /* Add each attribute to the fields array */
            $fields->setField('first_name',$this->getFirstName());
            $fields->setField('last_name',$this->getLastName());
            $fields->setField('nickname',$this->getNickname());
            $fields->setField('datetime', $this->getDatetime());
            // DateTime format confused.Not mentioned clear ind docs.
            $fields->setField('email', $this->getEmail());
            $fields->setField('age', $this->getAge());
            $fields->setField('zip', $this->getZip());
            $fields->setField('info', $this->getInfo());
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
         /**
          *  @description View Form
          *  @param access_token
          *  @param id
          *  @return HTTP-Response
          */
         public static function view($access_token,$id){
             $request= new HTTPRequest();
             $header = array(
                "Authorization: Bearer " . $access_token,
                "Content-Type: application/json"
            );
            $url="https://app.iformbuilder.com/exzact/api/v60/profiles/481947/pages/3728385/records/".$id;
            $response=$request->HTTPGet($url,$header);
             return $response; 
         }
         /**
          *  @description Add to the Form
          *  @param access_token
          *  @return HTTP-Response
          */
         public function edit($access_token){
            $fields=new FieldMaker();
            /* Add each attribute to the fields array */
            $fields->setField('first_name',$this->getFirstName());
            $fields->setField('last_name',$this->getLastName());
            $fields->setField('nickname',$this->getNickname());
            $fields->setField('datetime', $this->getDatetime());
            // DateTime format confused.Not mentioned clear ind docs.
            $fields->setField('email', $this->getEmail());
            $fields->setField('age', $this->getAge());
            $fields->setField('zip', $this->getZip());
            $fields->setField('info', $this->getInfo());
            $params=$fields->getFields(); 
             $request= new HTTPRequest();
             $header = array(
                "Authorization: Bearer " . $access_token,
                "Content-Type: application/json"
            );
            $url="https://app.iformbuilder.com/exzact/api/v60/profiles/481947/pages/3728385/records/".$this->getID();
            $response=$request->HTTPPut($url,$params,$header);
             return $response; 
         }
		
    } 
    
?>