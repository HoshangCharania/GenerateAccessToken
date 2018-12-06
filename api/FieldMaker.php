<?php

class FieldMaker{

    /**
     * Set Parameters to the format requested by iFormBuilder,
     * we would be creating multiple objects, it makes sense to
     * have a helper class which should facilitate this.
     * 
     */ 
     private $fields;
     function __construct(){
            $this->fields=["fields"=>[]];
     }
     /**
      * @param fieldName
      * @param fieldValue
      */
     function setField($fieldName,$fieldValue){
           $field=array("element_name"=>$fieldName,"value"=>$fieldValue);
           array_push($this->fields["fields"],$field);
     }
     /**
      * Get Field
      *
      */
    function getFields(){
        return json_encode($this->fields);
    }
}
?>