



function signToggle(){

    document.getElementById('signInDiv').classList.toggle('hidden');
    var signUpDiv = document.getElementById('signUpDiv')    

    if ( signUpDiv.classList.contains('hidden')) {
        signUpDiv.classList.remove('hidden');
    } else {
        signUpDiv.classList.add('hidden');

    }


   

}






