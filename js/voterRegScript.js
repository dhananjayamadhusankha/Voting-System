function validateForm() {
    var x = document.forms["myForm"]["fname"]["lname"]["nicNo"]["phone"]["email"]["psw"]["psw-con"].value;
    if (x == "" || x == null) {
        alert("Name must be filled out");
        return false;
    }
}