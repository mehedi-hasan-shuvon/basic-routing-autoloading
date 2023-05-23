<?php



// seperate userInfo and cityList from data
    $userInfo=$data['userInfo'];
    $cityList=$data['cityList'];

    $cityList = str_replace('"', "'", $cityList);

    print_r($cityList);



    

// assign the data to variables
    $id=$userInfo[0]['id'];
    $name=$userInfo[0]['student_name'];
    $age=$userInfo[0]['age'];
    $city=$userInfo[0]['city'];
    $cname=$userInfo[0]['cname'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AngularJS with PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <link rel="stylesheet"  href="../../css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="../../js/myScript.js"></script>
</head>
<body ng-app="myApp" ng-controller="myCtrl">
    <div class="container mt-3">
        <h1>Update Page</h1>
        <form ng-init="updatedName='<?php echo $name ?>'; updatedAge='<?php echo $age ?>'; updatedCityId='<?php echo $city ?>'">
            <input type="text" id="sname"  ng-model="updatedName" placeholder="enter name">
            <input type="text" id="sage" ng-model="updatedAge" placeholder="enter age">
       

            <select  ng-model="updatedCityId" ng-init="cityList=<?php echo $cityList ?>;">
                <option ng-repeat="city in cityList" value="{{city.cid}}">{{city.cname}}</option>
            </select>
            <br>
            <button class="btn btn-outline-dark" ng-click="UPDATE_DATA(<?php echo $id ?>)">Update</button>
            <button class="btn btn-outline-dark" ng-click="backToHome()">Home</button>
        </form>
    </div>
</body>
</html>