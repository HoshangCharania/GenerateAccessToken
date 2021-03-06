<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create a User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="/public/javascripts/personForm.js"></script>
</head>
<body>
<div ng-app="formApp" ng-controller="formController"> 
<div class="container-fluid">
    <div class="jumbotron mt-4">
        <div class="header">
            <h2>Create a User:</h2>
          </div>
                  <!--
                          user_id: String,
                          //category: [String],
                          title: String,
                          text: String,
                          location: String,
                          date_time: Date,
                          signature: String,
                  -->
          <form method="POST" name="personForm" ng-submit="generateToken()" novalidate>
                  <div class="form-group">
                      <label for="category">First Name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" ng-model="formData.first_name" required>
                      <span ng-show="personForm.first_name.$error.required">The First name is required.</span>
                  </div>
                  <div class="form-group">
                        <label for="category">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" ng-model="formData.last_name" required>
                        <span ng-show="personForm.last_name.$error.required">The Last name is required.</span>
                  </div>
                  <div class="form-group">
                    <label for="category">Nickname</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" ng-model="formData.nickname" required>
                    <span ng-show="personForm.nickname.$error.required">The  nickname is required.</span>
                  </div>
                  <div class="form-group">
                    <label for="category">Date</label>
                    <input type="datetime" class="form-control" id="datetime" name="datetime" ng-model="formData.datetime" ng-readonly="true" required>
                    <span ng-show="personForm.datetime.$error.required">The  datetime is required.</span>
                  </div>
                  <div class="form-group">
                    <label for="category">Age</label>
                    <input type="number" class="form-control" id="age" name="age" ng-model="formData.age" required>
                    <span ng-show="personForm.age.$error.required">The  age is required.</span>
                  </div>
                    <div class="form-group">
                          <label for="category">Email</label>
                          <input type="email" class="form-control" id="email" name="email" ng-model="formData.email" required>
                          <span ng-show="personForm.email.$error.required">The  email is required.</span>
                    </div>
                    <div class="form-group">
                          <label for="category">Zip</label>
                          <input type="number" class="form-control" minlength="5" maxlength="5" id="zip" name="zip" ng-model="formData.zip" required>
                          <span ng-show="personForm.zip.$error.required">The  zip is required.</span><span ng-show="!personForm.zip.$valid"> Has to be of length-5.</span>
                    </div>
                    <div class="form-group">
                        <label for="info">Info</label>
                        <textarea class="form-control" rows="5" id="info" name="info" ng-model="formData.info" required></textarea>
                        <span ng-show="personForm.info.$error.required">Enter your info.</span>
                    </div>
                  <button type="button" class="btn btn-primary" ng-click="generateToken()" ng-disabled="personForm.$invalid">Create User</button>
          </form>
                  {{ date }}
                <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>First Name:</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.first_name }}</h4>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Last Name:</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.last_name }}<h4>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Nickname:</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.nickname }}</h4>
                    </div>
                </div>
                 <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Date</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.datetime }}</h4>
                    </div>
                </div>
                  <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Age</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.age }}</h4>
                    </div>
                </div>
                  <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Email</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.email }}</h4>
                    </div>
                </div>
                  <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Zip</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.zip }}</h4>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-2">
                            <h4>Info</h4>
                    </div>
                    <div class="col-sm-10">
                            <h4>{{ formData.info }}</h4>
                    </div>
                </div>
                <div class="row mt-4">
                        {{ wait }}
                    <div class="col-sm-6 idCreated">
                        
                    </div>
                </div>
        </div>
</div>
</div>
</body>
</html>