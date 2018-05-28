(function() {
    angular
        .module("WeCollaborate",[])
        .controller("mainController", mainController);

    function mainController($scope, $http) {
       
        $scope.signup = signup;

        function signup(user){
            var specialCharacters = false;
            var invalidPassword = false;
            var invalidEmail = false;
            if(user){
                if(user.username){
                    
                    if(!/^[a-zA-Z0-9]+$/.test(user.username)){
                        specialCharacters = true;
                    }
                }
                if(user.password){
                    if(!/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(user.password)){
                        invalidPassword = true;
                    }
                }

                //^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+))|("[\w-\s]+")([\w-]+(?:\.[\w-]+)))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)
                if(user.emailID){
                    
                    if(!/^[a-zA-Z]+[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z.]{2,5}$/.test(user.emailID)){
                        invalidEmail = true;
                    }
                }

            }
            if(!user){
                $scope.message = "Please enter the details";
            }
            else if(!user.name){
                $scope.message = "Name cannot be null";
            }
            else if(!user.username){
                $scope.message = "Username cannot be null";
            }

            else if(!user.emailID){
                $scope.message = "Email cannot be null";
            }
            else if(!user.password){
                $scope.message = "Password cannot be null";
            }
            else if(user.username.length < 5){
                $scope.message = "Username cannot be less than 5 characters";
            }
            
            else if(specialCharacters){
                $scope.message = "Username cannot contain any special characters";
            }
            else if(invalidPassword){
                $scope.message = " Invalid Password. Password should atleast contain one uppercase one lower case one special character one digit. password should also be 6 to 16 characters long";
            }
            else if(invalidEmail){
                $scope.message = "Invalid Email.";

            }
           else{
                //alert(user.image);
            $http.post("reg.php",{'name':user.name,'username':user.username,'emailID':user.emailID,'password':user.password,'image':user.image})
            .success(function(){
                alert("You have registered successfully");
        window.open('ProfilePage.php', '_self');

            })
         .error(function(){
                alert("Signup error! Please try again!");
        window.open('index.php', '_self');

            });

        
        // else{
        //     alert("you are not login");
        // }

            
           }
        }


    }
})();