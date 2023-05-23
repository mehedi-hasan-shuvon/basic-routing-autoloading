let app = angular.module("myApp", []);

app.controller("myCtrl", ($scope, $http) => {
  var url = window.location.href;
  var baseUrl = url.split("app")[0];

  if (url === baseUrl) {
    $scope.inHome = true;
  }

  $scope.deleteModalOpen = (userId) => {
    $scope.deleteingId = userId;
  };

  //cancel delete
  $scope.cancleDelete = () => {
    $scope.deleteingId = "";
  };

  //confirm delete
  $scope.confirmDelete = () => {
    if ($scope.deleteingId !== "") {
      $scope.deleteingId = parseInt($scope.deleteingId);
      var data = {
        id: $scope.deleteingId,
      };

      var base = window.location.href;
      var baseUrl = base.split("app")[0];

      let url = baseUrl + "home/deleteUser";

      $http.post(url, data).then(
        (response) => {
          $scope.deleteingId = "";
          $scope.reFetch();
        },
        (error) => {
          console.log(error);
        }
      );
    } else {
      alert("Please select a user");
    }
  };

  // add new student
  $scope.addNewStudent = () => {
    if (
      $scope.studentName !== "" &&
      $scope.age !== "" &&
      typeof $scope.selectedCity !== "undefined"
    ) {
      //get the base url
      var base = window.location.href;
      var baseUrl = base.split("app")[0];

      let url = baseUrl + "home/addUser";

      var data = {
        student_Name: $scope.studentName,
        age: $scope.age,
        city: $scope.selectedCity,
      };

      $http.post(url, data).then(
        (response) => {
          $scope.studentName = "";
          $scope.age = "";
          $scope.selectedCity = "";
          $scope.reFetch();
        },
        (error) => {
          console.log(error);
        }
      );
    } else {
      alert("Please fill all the fields");
    }
  };

  $scope.reFetch = () => {
    var base = window.location.href;
    var baseUrl = base.split("app")[0];

    let url = baseUrl + "home/fetchUser";

    console.log(url);

    $http.get(url).then(
      (response) => {
        console.log("data", response.data);
        $scope.userList = response.data;
      },
      (error) => {
        console.log(error);
      }
    );
  };

  $scope.updateNavigation = (userId) => {
    var base = window.location.href;
    var baseUrl = base.split("app")[0];

    let url = baseUrl + "home/goToUpdate/" + userId;

    $http.get(url).then(
      (response) => {
        window.location.href = url;
      },
      (error) => {
        console.log(error);
      }
    );
  };

  function getBaseUrl(url) {
    var parser = document.createElement("a");
    parser.href = url;
    return parser.protocol + "//" + parser.host + "/";
  }

  //backToHome
  $scope.backToHome = () => {
    //get the base url
    var base = window.location.href;

    //get only the 3rd part of the url
    var baseUrl = getBaseUrl(base);
    window.location.href = baseUrl;
  };

  //update student
  $scope.UPDATE_DATA = (userId) => {
    var data = {
      student_name: $scope.updatedName,
      age: $scope.updatedAge,
      city: $scope.updatedCityId,
      id: userId,
    };

    var base = window.location.href;
    var baseUrl = getBaseUrl(base);

    let url = baseUrl + "home/updateUser";

    $http.post(url, data).then(
      (response) => {
        $scope.updatedName = "";
        $scope.updatedAge = "";
        $scope.updatedCityId = "";
        $scope.reFetch();
        $scope.backToHome();
      },
      (error) => {
        console.log(error);
      }
    );
  };
});
