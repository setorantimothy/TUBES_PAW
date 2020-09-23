function sidebarToggle(){
    const sidebar = document.querySelector("#sidebar");
    const productSection = document.querySelector("#productSection");
    sidebar.classList.toggle('toggled');
    productSection.classList.toggle("extendWidth");
    productSection.classList.toggle("col-md-12");
}