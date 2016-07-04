// JavaScript Document
var app = angular.module('myapp',[]);
app.controller('person',function($scope){
$scope.firstname = "Aalammm";
$scope.lastname  = "Geer";
$scope.fullname  = function(){
  return $scope.firstname + " " + $scope.lastname;
 };
});