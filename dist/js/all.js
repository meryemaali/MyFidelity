$(document).ready( function(){
    
    //vérifier validation ajout caissier
    $("#addCashier").click( function(){
        //e.preventDefault();
        //console.log("côté client fonctionne bien");

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var gender = $("#gender").val();
        var phonenumber = $("#phonenumber").val();
        var adresse = $("#adresse").val();
        var email = $("#email").val();
        var cashierRole = $("#cashierRole").val();
        var password = $("#password").val();

        var valid = true;

        if( firstname == "" || !isNameValid(firstname)){
            valid = false;
            $("#errorFirstname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorFirstname").html();
        }

        
        if( lastname == "" || !isNameValid(lastname)){
            valid = false;
            $("#errorLastname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorLastname").html();
        }

        if( gender == ""){
            valid = false;
            $("#errorGender").html("Veuillez sélectionner un genre");
        } else {
            $("#errorGender").html();
        }

       
        if( phonenumber == "" || !isNumberValid(phonenumber)){
            valid = false;
            $("#errorPhonenumber").html("Veuillez insérer un numéro de téléphone");
        } else {
            $("#errorPhonenumber").html();
        }

        if( email == "" || !isEmail(email)){
            valid = false;
            $("#errorEmail").html("Veuillez insérer une adresse email valide");
        } else {
            $("#errorEmail").html();
        }

        if( adresse == "" ){
            valid = false;
            $("#errorAdresse").html("Veuillez insérer une adresse");
        } else {
            $("#errorAdresse").html();
        }

        if( cashierRole == ""){
            valid = false;
            $("#errorCashierRole").html("Veuillez sélectionner un rôle");
        } else {
            $("#errorCashierRole").html();
        }

        if( password == "" || !passwordValidate(password)){
            valid = false;
            $("#errorPassword").html("Mot de passe doit contenir entre 6 et 15 caractères dont une lettre majuscule, une lettre minuscule et un chiffre");
        } else {
            $("#errorPassword").html();
        }

    });

    //vérifier validation ajout client
    $("#addCustomerr").click( function(){
        //e.preventDefault();
        //console.log("côté client fonctionne bien");

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var gender = $("#gender").val();
        var phonenumber = $("#phonenumber").val();
        var adresse = $("#adresse").val();
        var email = $("#email").val();
       //var idNumber = $("#idNumber").val();
        var password = $("#password").val();

        var valid = true;

        if( firstname == "" || !isNameValid(firstname)){
            valid = false;
            $("#errorFirstname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorFirstname").html();
        }

        
        if( lastname == "" || !isNameValid(lastname)){
            valid = false;
            $("#errorLastname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorLastname").html();
        }

        if( gender == ""){
            valid = false;
            $("#errorGender").html("Veuillez sélectionner un genre");
        } else {
            $("#errorGender").html();
        }

       
        if( phonenumber == "" || !isNumberValid(phonenumber)){
            valid = false;
            $("#errorPhonenumber").html("Veuillez insérer un numéro de téléphone");
        } else {
            $("#errorPhonenumber").html();
        }

        if( email == "" || !isEmail(email)){
            valid = false;
            $("#errorEmail").html("Veuillez insérer une adresse email valide");
        } else {
            $("#errorEmail").html();
        }

        if( adresse == "" ){
            valid = false;
            $("#errorAdresse").html("Veuillez insérer une adresse");
        } else {
            $("#errorAdresse").html();
        }

        // if( idNumber == "" || !isNumberValid(idNumber)){
        //     valid = false;
        //     $("#errorIdNumber").html("Veuillez insérer un identifiant");
        // } else {
        //     $("#errorIdNumber").html();
        // }

        if( password == "" || !passwordValidate(password)){
            valid = false;
            $("#errorPassword").html("Mot de passe doit contenir entre 6 et 15 caractères dont une lettre majuscule, une lettre minuscule et un chiffre");
        } else {
            $("#errorPassword").html();
        }

    });

    //vérifier login form validation
    $("#login").click(function(){
    //    e.preventDefault();
    //     console.log("login fonctionne bien");
        var email = $("#email").val();
        var password = $("#password").val();

        var valid = true;

        if (email == "" || !isEmail(email)){
            valid = false;
            $("#errorEmail").html("Veuillez saisir un email valide");
        } else {
            $("#errorEmail").html()
        }

        if( password == "" ){
            valid = false;
            $("#errorPassword").html("Mot de passe invalide");
        } else {
            $("#errorPassword").html();
        }

     });

     //validation pwd caissier
     $('#updateCashierPassword').click(function(){
        //e.preventDefault();
        // console.log("updatePassword fonctionne bien");
        var password = $('#updatePassword').val();
        var valid = true;

        if(password == "" || !passwordValidate(password)){
            valid = false;
            $('#errorPassword').html("Mot de passe doit contenir entre 6 et 15 caractères dont une lettre majuscule, une lettre minuscule et un chiffre");
        } else {
            $('#errorPassword').html();
        }

     });

     //MAJ détails caissiers

     $("#updateCashierDetails").click( function(){
        // e.preventDefault();
        // console.log("Très bien !");

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var gender = $("#gender").val();
        var phonenumber = $("#phonenumber").val();
        var adresse = $("#adresse").val();
        var email = $("#email").val();
        var cashierRole = $("#cashierRole").val();

        var valid = true;

        if( firstname == "" || !isNameValid(firstname)){
            valid = false;
            $("#errorFirstname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorFirstname").html();
        }

        
        if( lastname == "" || !isNameValid(lastname)){
            valid = false;
            $("#errorLastname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorLastname").html();
        }

        if( gender == ""){
            valid = false;
            $("#errorGender").html("Veuillez sélectionner un genre");
        } else {
            $("#errorGender").html();
        }

       
        if( phonenumber == "" || !isNumberValid(phonenumber)){
            valid = false;
            $("#errorPhonenumber").html("Veuillez insérer un numéro de téléphone");
        } else {
            $("#errorPhonenumber").html();
        }

        if( email == "" || !isEmail(email)){
            valid = false;
            $("#errorEmail").html("Veuillez insérer une adresse email valide");
        } else {
            $("#errorEmail").html();
        }

        if( adresse == "" ){
            valid = false;
            $("#errorAdresse").html("Veuillez insérer une adresse");
        } else {
            $("#errorAdresse").html();
        }

        if( cashierRole == ""){
            valid = false;
            $("#errorCashierRole").html("Veuillez sélectionner un rôle");
        } else {
            $("#errorCashierRole").html();
        }

        

    });


    //MAJ détails clients

    $("#updateCustomerDetails").click( function(){
        // e.preventDefault();
        // console.log("Très bien !");

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var gender = $("#gender").val();
        var phonenumber = $("#phonenumber").val();
        var adresse = $("#adresse").val();
        var email = $("#email").val();

        var valid = true;

        if( firstname == "" || !isNameValid(firstname)){
            valid = false;
            $("#errorFirstname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorFirstname").html();
        }

        
        if( lastname == "" || !isNameValid(lastname)){
            valid = false;
            $("#errorLastname").html("Veuillez remplir ce champ (que les lettres qui sont autotisées)");
        } else {
            $("#errorLastname").html();
        }

        if( gender == ""){
            valid = false;
            $("#errorGender").html("Veuillez sélectionner un genre");
        } else {
            $("#errorGender").html();
        }

       
        if( phonenumber == "" || !isNumberValid(phonenumber)){
            valid = false;
            $("#errorPhonenumber").html("Veuillez insérer un numéro de téléphone");
        } else {
            $("#errorPhonenumber").html();
        }

        if( email == "" || !isEmail(email)){
            valid = false;
            $("#errorEmail").html("Veuillez insérer une adresse email valide");
        } else {
            $("#errorEmail").html();
        }

        if( adresse == "" ){
            valid = false;
            $("#errorAdresse").html("Veuillez insérer une adresse");
        } else {
            $("#errorAdresse").html();
        }


    });

    //MAJ taux de récompense
    $("#updateLimit").click( function(){
         //e.preventDefault();
         //console.log("ça marche bien !");

        var rewardLimit = $("#updateRewardLimit").val();
        var updateGift = $("#updateGift").val();
        var updatePoint = $("#updatePoint").val();
       

        var valid = true;
       
        if( rewardLimit == "" || !isNumberValid(rewardLimit)){
            valid = false;
            $("#errorUpdateRewardLimit").html("Veuillez insérer un numéro une valeur");
        } else {
            $("#errorUpdateRewardLimit").html();
        }  
        if( updateGift == ""){
            valid = false;
            $("#errorUpdateRewardLimit").html("Veuillez insérer un cadeau");
        } else {
            $("#errorUpdateRewardLimit").html();
        }   
        if( updatePoint == ""){
            valid = false;
            $("#errorUpdatePoint").html("Veuillez insérer l'équivalent de 1 point en Dhs");
        } else {
            $("#errorUpdatePoint").html();
        }      

    });

    //validation points de récompense
    $("#rewardPoints").click( function(){
        //e.preventDefault();
        //console.log("ça marche bien !");

       var phonenumber = $("#phonenumber").val();
       var totalPurchase = $("#totalPurchase").val();
      

       var valid = true;
      
       if( phonenumber == "" || !isNumberValid(phonenumber)){
           valid = false;
           $("#errorPhonenumber").html("Veuillez insérer un numéro de téléphone valide");
       } else {
           $("#errorPhonenumber").html();
       }  
       
       if( totalPurchase == "" || !isNumberValid(totalPurchase)){
        valid = false;
        $("#errorTotalPurchase").html("Veuillez insérer une valeur");
    } else {
        $("#errorTotalPurchase").html();
    } 

   });

   //validation etat cadeau
   $('#updateClientCadeau').click(function(){
    // e.preventDefault();
    // console.log("updateCadeau fonctionne bien");
    var totalPurchase = $('#updateCadeau').val();
    var valid = true;

    if(totalPurchase == "" ){
        valid = false;
        $('#errorCadeau').html("Veuillez insérer OUI ou NON.");
    } else {
        $('#errorCadeau').html();
    }

 });

 //validation compte customer by admin
 $('#validateAccountCustomer').click(function(){
    // e.preventDefault();
    // console.log("Validation fonctionne bien");
    var actif = $('#validateAccount').val();
    var valid = true;

    if(actif == "" ){
        valid = false;
        $('#errorActif').html("Veuillez insérer 1 si le compte est valide sinon 2.");
    } else {
        $('#errorActif').html();
    }

 });

 //show hide password
  
    $('#eye').click(function () {
        $('#password').attr('type', $('#password').is(':password') ? 'text' : 'password');
        if ($('#password').attr('type') === 'password') {
            $('#eye').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $('#eye').removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });



});

function isNameValid(name) {
    return /[A-Z]+/i.test(name) && /[a-z]+/i.test(name);
}

function isNumberValid(number) {
    var regNum = /^[0-9]*$/;
    return regNum.test(number);
}

function isEmail(email){
    var emailPattern = /^(([^<>()\[\]\\.,;:\s@*]+(\.[^<>()\[\]\\.,;:\s@*]+)*)|(".+"))@((\[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return emailPattern.test(email);
}

function passwordValidate(password){
    return /[A-Z]+/.test(password) && /[a-z]+/.test(password) && /[\d\W]+/.test(password) && /\S {6,15}/.test(password);

}

