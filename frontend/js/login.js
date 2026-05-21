function Show() {


        var option = document.getElementById("password");

        if (option.type === "password") {

            option.type = "text";

        } else {

            option.type = "password";

        }
    }