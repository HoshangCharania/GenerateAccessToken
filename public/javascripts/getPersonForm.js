/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


            
var formApp = angular.module('formApp', []);
formApp.controller('formController',function ($scope, $http) {
    // create a blank object to hold our form information
    // $scope will allow this to pass between controller and view
    /**
     * Generate a Token by sending a POST request to a server:
     *  
     **/
    $scope.generateToken = function()
    {
    $scope.wait="Please wait..."
    $http.get("api/TokenHandler.php", {
                params: { access: "token"  }
                })
    .then(function(response) {
        val=response.data;
        //alert(JSON.stringify(val));
        $scope.getRequest(val);
    }, function errorCallback(response) {
        $scope.wait = "Error: Please contact support: "+response.statusText;
    });
    }
    /**
     * Send Request.
     * 
     * Get the access token and the values 
     * and do a request to your PHP server 
     * from where you could do a CURL request.
     * 
     * @param {String} val  
     */
    $scope.getRequest =  function(val)
    {
            
            data={};
            id=$scope.getData["personID"];
            access_token=val["access_token"];
            console.log(data)
            //data=$.param(data);
            var request = $http({
                        method: 'GET',
                        url: 'api/GetPersonHandler.php?id='+id+'&access_token='+access_token,
                        headers: {'Content-Type': 'application/json;charset=utf-8;'}
                        }).then(function successCallback(response) {
                                    //alert("success");
                                    console.log(response.data)
                                    $scope.access_token=access_token;
                                    $scope.id=id;
                                    $scope.formData=response.data;

                        }, function errorCallback(response) {
                            $scope.wait = "Error: Please contact support: "+response.statusText;
                        });
    }
    
    /**
    * idCreated:
    * 
    * @param {number} id
    * 
    */ 
    $scope.putRequest = function(val){
        //$scope.access_token,$scope.id
        data=$scope.formData;
        data["id"]=$scope.id;
        data["access_token"]=$scope.access_token;
        data=$.param(data);
        var request = $http({
                        method: 'POST',
                        url: 'api/PutPersonHandler.php',
                        data: data,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                        }).then(function successCallback(response) {
                                    alert("success");
                                    console.log(response.data)
                                    $scope.access_token=access_token;
                                    console.log(response.data);

                        }, function errorCallback(response) {
                            $scope.wait = "Error: Please contact support: "+response.statusText;
                        });
    }
});