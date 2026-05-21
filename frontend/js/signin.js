

    var confirm1 = 0;

    var confirm2 = 0;

    var check = function() {

        if (document.getElementById('password').value == document.getElementById('confirm_password').value) {

            //document.getElementById('message').style.color = 'green';

            //document.getElementById('message').textContent = 'Matching Password';
            document.getElementById('error').textContent = '';

            confirm1 = 1;

        } else {

            //document.getElementById('message').style.color = 'red';

            //document.getElementById('message').textContent = 'Les mots de passe ne correspondent pas';

            document.getElementById('error').style.color = 'red';
            document.getElementById('error').textContent = 'Non Matching Passwords';

            confirm1 = 0;

        }

        if (document.getElementById('password').value.length >= 3) {

            //document.getElementById('message2').style.color = 'green';

            //document.getElementById('message2').textContent = 'Le mot de passe a assez de caractÃ¨res minimum !';

            document.getElementById('error2').textContent = '';

            confirm2 = 1;

        } else {

            //document.getElementById('message2').style.color = 'red';

            //document.getElementById('message2').textContent = 'Le mot de passe n\'a pas assez de caractÃ¨res minimum !';

            document.getElementById('error2').style.color = 'red';
            document.getElementById('error2').textContent = 'Password Is Too Short';

            confirm2 = 0;

        }

        if ((confirm1 == 1) && (confirm2 == 1)) {

            document.getElementById('submit').disabled = false;

            document.getElementById('submit').className = "button-label mt-4 rounded-md bg-slate-800 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700";

        } else {

            document.getElementById('submit').disabled = true;

            document.getElementById('submit').className = "button-label-disable mt-4 rounded-md bg-slate-400 px-4 py-2 text-sm font-medium text-white";

        }

    }



    function Show(i) {

        if (i === 0) {

            var option = document.getElementById("password");

            if (option.type === "password") {

                option.type = "text";

            } else {

                option.type = "password";

            }

        } else {

            var option = document.getElementById("confirm_password");

            if (option.type === "password") {

                option.type = "text";

            } else {

                option.type = "password";

            }

        }

    }

