<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Raleway');


a.egOne {
  position: relative;
  transition: all 0.15s ease-out;
}

a.egOne:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 1px;
  bottom: 0;
  left: 0;;
  background-color: yellow;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.15s ease-out;
  transition: all 0.15s ease-out;
}
a.egOne:hover:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}

a.egOne:hover {
  color: yellow;
}



.top-nav {
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(to right, rgba(0,0,0,0.1), rgba(192,192,192,0.25));
  color: #fff;
  padding: 0.75em 1.5em;
  flex-wrap: wrap;
}

.nav-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  max-width: 1000px;
  position: relative;
}

.nav-left, .nav-right {
  display: flex;
  align-items: center;
}

.nav-left {
  order: 1;
}

.nav-center {
  display: flex;
  justify-content: center;
  align-items: center;
  order: 2;
  flex: 1;
}

.nav-right {
  order: 3;
}

.menu {
  display: flex;
  flex-direction: row;
  list-style-type: none;
  margin: 0;
  padding: 0;
  gap: 1.5rem;
}

.menu > li > a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s;
}


.logoHeader {
  width: 54px;
  height: 54px;
  cursor: pointer;
  display: block;
  transition: transform 0.3s ease;
}

.logoHeader:hover {
  transform: scale(1.2);
}

.burger {
  display: none;
  width: 32px;
  height: 24px;
  position: relative;
  cursor: pointer;
  z-index: 10;
}

.burger div {
  position: absolute;
  width: 100%;
  height: 3px;
  background-color: white;
  border-radius: 2px;
  transition: all 0.3s ease;
}

.burger div:nth-child(1) {
  top: 0;
}

.burger div:nth-child(2) {
  top: 10px;
}

.burger div:nth-child(3) {
  top: 20px;
}

.burger.active div:nth-child(1) {
  transform: rotate(45deg);
  top: 10px;
}

.burger.active div:nth-child(2) {
  opacity: 0;
}

.burger.active div:nth-child(3) {
  transform: rotate(-45deg);
  top: 10px;
}

.mobile-menu {
  display: none;
  flex-direction: column;
  gap: 1rem;
  margin-top: 1rem;
  align-items: center;
  opacity: 0;
  transform: translateY(-10px);
  transition: opacity 0.3s ease, transform 0.3s ease;
}

.mobile-menu.active {
  display: flex;
  opacity: 1;
  transform: translateY(0);
}

@media (max-width: 700px) {
  .nav-wrapper {
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }

  .nav-left,
  .nav-right {
    display: none !important;
  }

  .burger {
    display: block;
  }

  .nav-center {
    order: 1;
    justify-content: flex-start;
    flex: unset;
  }
}
</style>
</head>
<body>
  <section class=" top-nav">
    <div class="nav-wrapper">

      <div class="nav-center">
        <a href="index.php">
          <img class="logoHeader" src="img/backgroundimg/IconJuraasicPlain.png" alt="Logo">
        </a>
      </div>

      <div class="burger" id="burgerIcon" onclick="toggleMobileMenu(event)">
        <div></div>
        <div></div>
        <div></div>
      </div>

      <div class="nav-left" id="navLeft">
        <ul class="menu">
          <li><a class="egOne" href="#add-dinosaur" onclick="scrollToSection(event, 'add-dinosaur')">Add a Dinosaur</a></li>
        </ul>
      </div>

      <div class="nav-right" id="navRight">
        <ul class="menu">
          <li><a class="egOne" href="#dinosaur-overview" onclick="scrollToSection(event, 'dinosaur-overview')">Dinosaur Overview</a></li>
        </ul>
      </div>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <ul class="menu">
        <li><a href="#add-dinosaur" onclick="scrollToSection(event, 'add-dinosaur'); toggleMobileMenu(event)">Add a Dinosaur</a></li>
        <li><a href="#dinosaur-overview" onclick="scrollToSection(event, 'dinosaur-overview'); toggleMobileMenu(event)">Dinosaur Overview</a></li>
      </ul>
    </div>
  </section>

<script>
function toggleMobileMenu(event) {
  event.stopPropagation();
  const menu = document.getElementById('mobileMenu');
  const burger = document.getElementById('burgerIcon');
  menu.classList.toggle('active');
  burger.classList.toggle('active');
}

function handleResize() {
  const menu = document.getElementById('mobileMenu');
  const burger = document.getElementById('burgerIcon');
  if (window.innerWidth > 700) {
    menu.classList.remove('active');
    burger.classList.remove('active');
  }
}

window.addEventListener('resize', handleResize);

document.addEventListener('click', function(event) {
  const menu = document.getElementById('mobileMenu');
  const burger = document.getElementById('burgerIcon');
  if (!menu.contains(event.target) && !burger.contains(event.target)) {
    menu.classList.remove('active');
    burger.classList.remove('active');
  }
});
</script>
</body>
</html>
