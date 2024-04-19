<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Technopark | {{ $title }}</title>
    <link rel="stylesheet" href="/css/main.css">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <style>
   .container{
    width: 120vh;
    height: 0;
    display: flex;
    background: #111827;
}
/* Toogle Menu */
#menu-button{
    margin-top: 5px;
    margin-left: 30px;
    width: 32px;
    position: absolute;
    overflow: hidden;
}

#menu-label{
    position: relative;
    display: block;
    height: 20px;
    cursor: pointer;
}
#menu-checkbox{
    display: none;
}

#hamburger, #menu-label:after, #menu-label:before{
    position: absolute;
    left: 0;
    width: 100%;
    height: 4px;
    background-color: #ffffff;
}

#menu-label:after, #menu-label:before{
    content:"";
    transition: 0.4s cubic-bezier(0.075, 0.82, 0.165, 1) left;
}

#menu-label:before{
    top: 0;
}

#menu-label:after{
    top: 8px;
}

#hamburger{
    top: 16px;
}

#hamburger:before{
    content: "Menu";
    position: absolute;
    top: 5px;
    right: 0;
    left: 0;
    color: #ffffff;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
}

/* #menu-checkbox:checked + #menu-label::before{
    left: -39px;
}

#menu-checkbox:checked + #menu-label::after{
    left: 39px;
}

#menu-checkbox:checked + #menu-label #hamburger::before{
    animation: moveUpThenDown 0.8s ease 0.2s forwards,
    shakeUp 0.8s ease 0.2s forwards,
    shakeDown 0.8s ease 0.2s forwards;

} */

/* @keyframes moveUpThenDown {
    0%{
        top:0;
    }
    50%{
        top:-27px;
    }
    100%{
        top: -14px;
    }
}
@keyframes shakeUp {
    0% {
        transform: rotateZ(0);
    }
    25% {
        transform: rotateZ(-10deg);
    }
    50%{
        transform: rotateZ(0);
    }
    75%{
        transform: rotateZ(10deg);
    }
    100%{
        transform: rotateZ(0);
    }   
}

@keyframes shakeDown {
    0%{
        transform: rotateZ(0);
    }
    80%{
        transform: rotateZ(3deg);
    }
    90%{
        transform: rotateZ(-3deg);
    }
    100%{
        transform: rotateZ(0);
    }

} */
/* The side navigation menu */
.sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0; /* Stay at the top */
    left: 0;
    background-color: #111; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
  }
  
  /* The navigation menu links */
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  /* When you mouse over the navigation links, change their color */
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  /* Position and style the close button (top right corner) */
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
  #main {
    transition: margin-left .5s;
    padding: 20px;
  }
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }

body{
    max-width: 100%;
    max-height: 100%;
    background-color: #343434;
    
}

.container .main-body .uv{
    
    margin-top: 40vh;
    margin-bottom: 200px;
    margin-right: 0px;
    margin-left: 100px;
    box-sizing: border-box;

}
h1{
    color: #ADB0FF;
}
p{
    color: white;
}
.uf{
    width: 17vh;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 12px 10px;
    border-radius: 8px;
    height: 40px; 
    margin-top: 40vh;
    margin-left: 160vh;
    color: white;
    transition: all ease-in 0.3s;
    box-sizing: border-box;
    background-color: #6A8BFF;
}
.uf:hover{
    background-color: #203da7;
    transition: all ease-out 0.3s;
}
.ud{
    width: 17vh;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 12px 10px;
    border-radius: 8px;
    height: 40px;
    margin-top: 5px;
    margin-left: 160vh;
    color: white;
    transition: all ease-in 0.3s;
    box-sizing: border-box;
}
.ud:hover{
    background-color: #6A8BFF;
    transition: all ease-out 0.3s;
}
    </style>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/">Home</a>
        <a href="#">Fasilitas</a>
        <a href="#">Jam Operasional</a>
        <a href="#">Kontak Kami</a>
      </div>
    <div class="container">
    <div class="main-content">
        
        <div id="menu-button">
            <input type="checkbox" id="menu-checkbox">
            <label for="menu-checkbox" id="menu-label" onclick="openNav()">
               
                <div id="hamburger"></div>
            </label>
        </div>
        <h1></h1>
    </div>
    <div class="main-body">
        <div class="uv">
            <h1 class="text-4xl mb-8">Sport Center Area - Solo Technopark</h1>
            <p>Sebagai area pusat olahraga untuk menjaga kesehatan dan kebugaran Anda di Solo Technopark. Temukan beragam fasilitas olahraga terbaik disini</p>
        </div>
    </div>
    
    <script src="script.js"></script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    </div>
    <div class="uf">
        <h3><a href="/register">Book Now</h3></a>
    </div>
    <div class="ud">
        <h3>Share</h3>
    </div>

    <script>
        function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
    </script>



</body>

</html>