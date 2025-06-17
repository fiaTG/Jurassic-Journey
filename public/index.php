<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Jurassic Journey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon/favicon.png" type="image/x-icon">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
    <style>
@import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap');

/* http://meyerweb.com/eric/tools/css/reset/ 
    v2.0 | 20110126
    License: none (public domain)
*/

/* The CSS reset below is mostly unnecessary if you already use a modern CSS framework or have your own base styles. 
    In this file, some reset rules are redundant because you override them later (e.g., body, html styles). 
    The @import for Google Fonts is also not needed here, since you already include the fonts in the <head> via <link>.
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
    display: block;
}
body {
    line-height: 1;
}
ol, ul {
    list-style: none;
}
blockquote, q {
    quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
    content: '';
    content: none;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}

/* The rest of the CSS is used in your HTML. 
    However, the @import line and the reset block could be removed or reduced if you want to simplify.
    The model-viewer selector sets width/height, but you also set inline styles for it in HTML, so one may override the other.
*/
          body, html {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                overflow-x: hidden;
                background-color: #111;
          }
          .parallax {
                position: relative;
                height: 100vh;
                width: 100%;
                overflow: hidden;
                 transition: background-image 1s ease-in-out;
                 background-size: cover;
                 background-repeat: no-repeat;
                 background-position: center;
          }
          .parallax > .bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 120%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                z-index: 0;
                will-change: transform;
          }
          .parallax > .content {
                position: relative;
                z-index: 1;
                color: white;
                height: 100%;
                padding: 2rem;
                text-shadow: 2px 2px 6px black;
          }
          .form-container {
                background: rgba(0, 0, 0, 0.5);
                padding: 2rem;
                border-radius: 10px;
                width: 100%;
         
                margin-top: 2rem;
          }
          label {
                display: block;
                margin-top: 15px;
                text-align: left;
          }
          input, textarea {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                border-radius: 5px;
                border: none;
          }
          button {
                margin-top: 20px;
                padding: 10px 20px;
                background: #4CAF50;
                border: none;
                color: white;
                font-size: 1em;
                cursor: pointer;
          }
          table {
                width: 90%;
                margin: 2rem auto;
                border-collapse: collapse;
                background: rgba(255,255,255,0.1);
                box-shadow: 0 4px 20px rgba(0,0,0,0.5);
                border-radius: 10px;
                overflow: hidden;
          }
          th, td {
                border: 1px solid #ddd;
                padding: 12px;
                color: white;
          }
          th {
                background: rgba(0,0,0,0.5);
          }
          model-viewer {
                width: 100%;
                height: 500px;
          }
          .details {
                margin-top: 2rem;
                text-align: left;
                color: white;
          }

    #video-section {
      position: relative;
      height: 100vh;
      width: 100%;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      overflow: hidden;
    }

    video {
      width: 100%;
      height: auto;
      display: block;
      transition: opacity 1s ease-in-out;
    }

    video.fade-out {
      opacity: 0;
      pointer-events: none;
    }

    #lifeImage, #jurassicText {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-width: 400px;
      opacity: 0;
      transition: opacity 2s ease-in-out;
      z-index: 2;
      display: none;
    }
  

 /* Cursor Styles */
  .cursor-dot, .cursor-ring {
    position: fixed;
    top: 0;
    left: 0;
    pointer-events: none;
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.3s ease, height 0.3s ease;
    will-change: transform;
    z-index: 9999;
  }
  .cursor-dot {
    width: 8px;
    height: 8px;
    background: white;
  }
  .cursor-ring {
    width: 28px;
    height: 28px;
    border: 2px solid white;
  }
  .cursor-ring.hovered {
    width: 44px !important;
    height: 44px !important;
  }

     </style>
</head>
<body>

<?php include 'includes/header.php'; ?>


<div class="cursor-dot"></div>
<div class="cursor-ring"></div>



<!-- Video und Bildanimation -->
<div id="video-section">
  <video id="myVideo" autoplay muted playsinline preload="auto">
    <source src="./img/vids/StartsceneJurassic.mp4" type="video/mp4">
    Dein Browser unterstützt das Video-Tag nicht.
  </video>

  <img id="lifeImage" src="./img/backgroundimg/lifeFindsAWay.png" alt="Life Finds A Way">
  <img id="jurassicText" src="./img/backgroundimg/Schrift.png" alt="Jurassic Journey">
</div>



<div id="add-dinosaur" class="parallax" data-speed="0.6">
    <div class="bg" style="background-image: url('./img/backgroundimg/jungleCampFire.jpg');"></div>
    <div class="content">
        <div class="form-container" style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <!-- Left: Formular -->
            <div style="flex: 1 1 350px; min-width: 300px; max-width: 50%;">
                <h2>Add a Dinosaur</h2>
                <form id="dinoForm">
                    <label for="name">Name des Dinosauriers:</label>
                    <input type="text" id="name" name="name">

                    <label for="era">Zeitalter:</label>
                    <input type="text" id="era" name="era">

                    <label for="diet">Ernährung:</label>
                    <input type="text" id="diet" name="diet">

                    <label for="description">Beschreibung:</label>
                    <textarea id="description" name="description" rows="4"></textarea>

                    <button type="submit">Hinzufügen</button>
                </form>
            </div>
            <!-- Right: Modell und Details -->
            <div style="flex: 1 1 350px; min-width: 300px; max-width: 50%; display: flex; flex-direction: column; align-items: flex-start;">
                <div style="width: 100%;">
                    <model-viewer src="../randaling-t-rex-animated/source/Trex1.glb"
                        animation-name="Walk"
                        autoplay
                        auto-rotate
                        camera-controls
                        style="width: 100%; height: 300px;">
                    </model-viewer>
                </div>
                <div class="details" style="width: 100%; margin-top: 1.5rem;">
                    <h2>Dino Details</h2>
                    <p><strong>Name:</strong> <span id="detail-name">-</span></p>
                    <p><strong>Zeitalter:</strong> <span id="detail-era">-</span></p>
                    <p><strong>Ernährung:</strong> <span id="detail-diet">-</span></p>
                    <p><strong>Beschreibung:</strong> <span id="detail-description">-</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="dinosaur-overview" class="section">
    <h2>Dinosaur Overview</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Zeitalter</th>
                <th>Ernährung</th>
                <th>Beschreibung</th>
            </tr>
        </thead>
        <tbody id="dinoTableBody">
            <tr>
                <td>Tyrannosaurus Rex</td>
                <td>Kreidezeit</td>
                <td>Karnivor</td>
                <td>Einer der größten landlebenden Fleischfresser.</td>
            </tr>
            <tr>
                <td>Triceratops</td>
                <td>Kreidezeit</td>
                <td>Herbivor</td>
                <td>Berühmt für seine drei Hörner und den Nackenschild.</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="parallax" data-speed="0.4">
    <div class="bg" style="background-image: url('./img/backgroundimg/IconJuraasic.png');"></div>
    <div class="content">
        <h2>Abschlussszene</h2>
        <p>Vielen Dank für Ihre Teilnahme an Jurassic Journey! Wir hoffen, Sie hatten eine spannende Zeit und haben viel über Dinosaurier gelernt.</p>
    </div>
</div>



<?php include 'includes/footer.php'; ?>

<script>
    window.addEventListener('scroll', () => {
        document.querySelectorAll('.parallax').forEach(section => {
            const speed = parseFloat(section.dataset.speed);
            const offset = window.pageYOffset - section.offsetTop;
            const bg = section.querySelector('.bg');
            bg.style.transform = `translateY(${offset * speed}px)`;
        });
    });


const video = document.getElementById('myVideo');
  const videoSection = document.getElementById('video-section');
  const lifeImage = document.getElementById('lifeImage');
  const jurassicText = document.getElementById('jurassicText');
  const bgImageUrl = 'url(./img/backgroundimg/wallCracks.png)';

  video.addEventListener('ended', () => {
    // 1. Video ausblenden
    video.classList.add('fade-out');

    // 2. Nach 1s: Crack-Hintergrund
    setTimeout(() => {
      video.style.display = 'none';
      videoSection.style.backgroundImage = bgImageUrl;

  // Sanft einblenden (nach kurzer Pause)
setTimeout(() => {
  lifeImage.style.display = 'block';
  lifeImage.style.opacity = '0';
  // Nutze rAF + kleines Timeout für Übergang
  setTimeout(() => {
    lifeImage.style.opacity = '1';
  }, 50); // minimaler Delay für Transition-Trick
}, 200); // Warte 200ms nach Hintergrundwechsel


      // 4. Nach 3s: wieder ausblenden
      setTimeout(() => {
        lifeImage.style.opacity = '0';

        // 5. Nach 1s: Jurassic Journey zeigen
        setTimeout(() => {
          lifeImage.style.display = 'none';
          jurassicText.style.display = 'block';
          requestAnimationFrame(() => {
            jurassicText.style.opacity = '1';
          });
        }, 1000);

      }, 3000);
    }, 1000);
  });

 // Slow scroll with easing
    function scrollToSection(event, targetId) {
        event.preventDefault();
        const target = document.getElementById(targetId);
        if (!target) return;
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        const duration = 1200;
        let start = null;

        function step(timestamp) {
            if (!start) start = timestamp;
            const progress = timestamp - start;
            const ease = easeInOutQuad(progress / duration);
            window.scrollTo(0, startPosition + distance * ease);
            if (progress < duration) requestAnimationFrame(step);
        }

        function easeInOutQuad(t) {
            return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
        }

        requestAnimationFrame(step);
    }

    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href').substring(1);
            scrollToSection(e, href);
        });
    });

    document.getElementById('dinoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const era = document.getElementById('era').value;
        const diet = document.getElementById('diet').value;
        const description = document.getElementById('description').value;

        if (name && era && diet && description) {
            const tableBody = document.getElementById('dinoTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `<td>${name}</td><td>${era}</td><td>${diet}</td><td>${description}</td>`;
            tableBody.appendChild(newRow);

            document.getElementById('detail-name').textContent = '-';
            document.getElementById('detail-era').textContent = '-';
            document.getElementById('detail-diet').textContent = '-';
            document.getElementById('detail-description').textContent = '-';
            this.reset();
        } else {
            alert('Bitte füllen Sie alle Felder aus.');
        }
    });

    ['name', 'era', 'diet', 'description'].forEach(id => {
        document.getElementById(id).addEventListener('input', function() {
            document.getElementById('detail-' + id).textContent = this.value || '-';
        });
    });


 (function() {
    const dot = document.querySelector('.cursor-dot');
    const ring = document.querySelector('.cursor-ring');

    let mouseX = 0, mouseY = 0;
    let dotX = 0, dotY = 0;
    let ringX = 0, ringY = 0;

    const DOT_SMOOTHNESS = 0.2;
    const RING_SMOOTHNESS = 0.1;

    // Mouse move updates target mouse coords
    window.addEventListener('mousemove', e => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });

    // Check if hovering interactive element
    function setHoverState(isHovering) {
      if (isHovering) {
        ring.classList.add('hovered');
      } else {
        ring.classList.remove('hovered');
      }
    }

    // Attach hover listeners to interactive elements
    const interactiveElements = document.querySelectorAll('a, button, input, textarea, select, label');

    interactiveElements.forEach(el => {
      el.addEventListener('mouseenter', () => setHoverState(true));
      el.addEventListener('mouseleave', () => setHoverState(false));
    });

    // Linear interpolation function
    function lerp(start, end, amt) {
      return (1 - amt) * start + amt * end;
    }

    // Animation loop
    function animate() {
      dotX = lerp(dotX, mouseX, DOT_SMOOTHNESS);
      dotY = lerp(dotY, mouseY, DOT_SMOOTHNESS);
      ringX = lerp(ringX, mouseX, RING_SMOOTHNESS);
      ringY = lerp(ringY, mouseY, RING_SMOOTHNESS);

      dot.style.transform = `translate(${dotX}px, ${dotY}px) translate(-50%, -50%)`;
      ring.style.transform = `translate(${ringX}px, ${ringY}px) translate(-50%, -50%)`;

      requestAnimationFrame(animate);
    }

    animate();
  })();

</script>
</body>
</html>
