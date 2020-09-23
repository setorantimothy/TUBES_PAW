function sidebarToggle(){
    const sidebar = document.querySelector("#sidebar");
    const productSection = document.querySelector("#productSection");
    sidebar.classList.toggle('toggled');
    productSection.classList.toggle("extendWidth");
    productSection.classList.toggle("col-md-12");
}

function showPassword(){
    var pass = document.getElementById("password");
    if(pass.type == "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}