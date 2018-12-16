var formApp = angular.module('formApp', []);
formApp.controller('formController',function ($scope, $http) {
    // create a blank object to hold our form information
    // $scope will allow this to pass between controller and view
    var d = new Date();
    var n = d.toISOString();
    $scope.formData = {};
    $scope.formData.datetime = n;
    $scope.wait= "";
    /**
     * Generate a Token by sending a POST request to a server:
     *  
     **/
    $scope.generateToken = function()
    {
    $scope.wait="Please wait..."
    $http.get("/token/new", {
                params: { access: "token"  }
                })
    .then(function(response) {
        val=response.data;
        //alert(JSON.stringify(val));
        $scope.sendRequest(val);
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
    $scope.sendRequest =  function(val)
    {
            var data=$scope.formData;
            data['access_token']=val["access_token"];
            data=$.param(data);
            var request = $http({
                        method: 'POST',
                        url: '/person/add/',
                        data:  data,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                        }).then(function successCallback(response) {
                                    //alert("success");
                                    $scope.idCreated(response.data);

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
    $scope.idCreated= function(data){
        $scope.wait="";
        $('.idCreated').empty();
        $('.idCreated').append("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>User Created with id: "+data["id"]+"</div>")
        $(".idCreated").fadeTo(2000, 500).slideUp(2000, function(){
            $(".idCreated").slideUp(2000);
                });   
    }
    

    });