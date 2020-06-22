<!-- Custom favicon for this template-->
<link rel="icon" type="image/png" href="../favicon.png" />
<!-- End Custom favicon for this template-->

<!-- Font-->
<link rel="stylesheet" type="text/css" href="css/roboto-font.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
<!-- End Font-->

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- End Custom fonts for this template-->



<!-- Main Style Css -->
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style2.css" />

<!-- End Main Style Css -->

<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- End Meta -->

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.css" rel="stylesheet">
<link id="theme" href="css/sb-admin-2.css" rel="stylesheet">
<!-- End Custom styles for this template-->



<!-- Custom calendar -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<!-- End Custom calendar -->

<!-- Validate Fields -->
<script src="js/validanumericos.js" type="text/javascript"></script>
<!-- End Validate Fields -->

<link rel="stylesheet" href="css/switch.css" />

<script type="text/javascript">
    // this one is jut to wait for the page to load
    document.addEventListener('DOMContentLoaded', () => {

    const themeStylesheet = document.getElementById('theme');
    const storedTheme = localStorage.getItem('theme');

    if(storedTheme){
        themeStylesheet.href = storedTheme;
    }
    
    const themeToggle = document.getElementById('theme-toggle');

    themeToggle.addEventListener('click', () => {
        // if it's light -> go dark
        if(themeStylesheet.href.includes('2')){
            themeStylesheet.href = 'css/sb-admin-dark.css';
            themeToggle.innerText = 'Activar Modo Claro';
        } else {
            // if it's dark -> go light
            themeStylesheet.href = 'css/sb-admin-2.css';
            themeToggle.innerText = 'Activar Modo Oscuro';
        }
        // save the preference to localStorage
        localStorage.setItem('theme',themeStylesheet.href)  
    })
    })
</script>

<script type="text/javascript">
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

const themeStylesheet = document.getElementById('theme');
const storedTheme = localStorage.getItem('theme');
if(storedTheme){
    themeStylesheet.href = storedTheme;
}
const themeToggle = document.getElementById('theme-toggle1');
themeToggle.addEventListener('click', () => {
    // if it's light -> go dark
    if(themeStylesheet.href.includes('2')){
        themeStylesheet.href = 'css/sb-admin-2-Blue.css';
        themeToggle.innerText = 'Azul ';
    } else {
        // if it's dark -> go light
        themeStylesheet.href = 'css/sb-admin-2.css';
        themeToggle.innerText = 'Azul';
    }
    // save the preference to localStorage
    localStorage.setItem('theme',themeStylesheet.href)  
})
})
</script>

<script type="text/javascript">
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

const themeStylesheet = document.getElementById('theme');
const storedTheme = localStorage.getItem('theme');
if(storedTheme){
    themeStylesheet.href = storedTheme;
}
const themeToggle = document.getElementById('theme-toggle2');
themeToggle.addEventListener('click', () => {
    // if it's light -> go dark
    if(themeStylesheet.href.includes('2')){
        themeStylesheet.href = 'css/sb-admin-2-Green.css';
        themeToggle.innerText = 'Verde ';
    } else {
        // if it's dark -> go light
        themeStylesheet.href = 'css/sb-admin-2.css';
        themeToggle.innerText = 'Verde';
    }
    // save the preference to localStorage
    localStorage.setItem('theme',themeStylesheet.href)  
})
})
</script>

<script type="text/javascript">
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

const themeStylesheet = document.getElementById('theme');
const storedTheme = localStorage.getItem('theme');
if(storedTheme){
    themeStylesheet.href = storedTheme;
}
const themeToggle = document.getElementById('theme-toggle3');
themeToggle.addEventListener('click', () => {
    // if it's light -> go dark
    if(themeStylesheet.href.includes('2')){
        themeStylesheet.href = 'css/sb-admin-2-Red.css';
        themeToggle.innerText = 'Rojo ';
    } else {
        // if it's dark -> go light
        themeStylesheet.href = 'css/sb-admin-2.css';
        themeToggle.innerText = 'Rojo';
    }
    // save the preference to localStorage
    localStorage.setItem('theme',themeStylesheet.href)  
})
})
</script>

<script type="text/javascript">
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

const themeStylesheet = document.getElementById('theme');
const storedTheme = localStorage.getItem('theme');
if(storedTheme){
    themeStylesheet.href = storedTheme;
}
const themeToggle = document.getElementById('theme-toggle4');
themeToggle.addEventListener('click', () => {
    // if it's light -> go dark
    if(themeStylesheet.href.includes('2')){
        themeStylesheet.href = 'css/sb-admin-2-Yellow.css';
        themeToggle.innerText = 'Amarillo ';
    } else {
        // if it's dark -> go light
        themeStylesheet.href = 'css/sb-admin-2.css';
        themeToggle.innerText = 'Amarillo';
    }
    // save the preference to localStorage
    localStorage.setItem('theme',themeStylesheet.href)  
})
})
</script>

<script type="text/javascript">
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

const themeStylesheet = document.getElementById('theme');
const storedTheme = localStorage.getItem('theme');
if(storedTheme){
    themeStylesheet.href = storedTheme;
}
const themeToggle = document.getElementById('theme-toggle5');
themeToggle.addEventListener('click', () => {
    // if it's light -> go dark
    if(themeStylesheet.href.includes('2')){
        themeStylesheet.href = 'css/sb-admin-2-Cyan.css';
        themeToggle.innerText = 'Cyan ';
    } else {
        // if it's dark -> go light
        themeStylesheet.href = 'css/sb-admin-2.css';
        themeToggle.innerText = 'Cyan';
    }
    // save the preference to localStorage
    localStorage.setItem('theme',themeStylesheet.href)  
})
})
</script>

<script type="text/javascript">
// this one is jut to wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

const themeStylesheet = document.getElementById('theme');
const storedTheme = localStorage.getItem('theme');
if(storedTheme){
    themeStylesheet.href = storedTheme;
}
const themeToggle = document.getElementById('theme-toggle6');
themeToggle.addEventListener('click', () => {
    // if it's light -> go dark
    if(themeStylesheet.href.includes('2')){
        themeStylesheet.href = 'css/sb-admin-2-Negro.css';
        themeToggle.innerText = 'Negro ';
    } else {
        // if it's dark -> go light
        themeStylesheet.href = 'css/sb-admin-2.css';
        themeToggle.innerText = 'Negro';
    }
    // save the preference to localStorage
    localStorage.setItem('theme',themeStylesheet.href)  
})
})
</script>

<style>
/* width */
::-webkit-scrollbar {
  width: 7px;
  height: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px white; 
  border-radius: 15px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #57606f; 
  border-radius: 15px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #95afc0; 
}
</style>

