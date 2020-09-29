function sidebarToggle(){
    const sidebar = document.querySelector("#sidebar");
    sidebar.classList.toggle('toggledSidebar');
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
            id : variance.value,
        },
        function(data,status){
            alert(data);
        })
        alert('as');
    }
}