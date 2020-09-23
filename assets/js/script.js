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

function addToCart(param) {
    if(param != "add") {
        window.location.href = param;
    }else {
        const variance = document.querySelector("#variance");
        $.post('/proses/addToCart.php',
        {
            id = variance.value,
        },
        function(data,status){
            alert(data);
        })
        alert('as');
    }
}