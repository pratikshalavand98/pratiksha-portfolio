<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ===== DATABASE CONNECTION (InfinityFree) =====
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)");

    if($stmt){
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();

        echo json_encode(['success' => "Message sent successfully! 🚀"]);
        exit;
    } else {
        echo json_encode(['success' => "Database error!"]);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pratiksha Lavand | Cloud Architect</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>

<script>
(function(){
    emailjs.init("YOUR_PUBLIC_KEY"); // here emailsjs public key 
})();
</script>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
    scroll-behavior:smooth;
}

body{
    background:linear-gradient(-45deg,#0b0f19,#111827,#1f2937,#0f172a);
    background-size:400% 400%;
    animation:gradientMove 15s ease infinite;
    color:#e5e7eb;
    overflow-x:hidden;
}

@keyframes gradientMove{
    0%{background-position:0% 50%;}
    50%{background-position:100% 50%;}
    100%{background-position:0% 50%;}
}

/* FLOATING CONTAINER */
#symbols-container{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    overflow:hidden;
    pointer-events:none;
    z-index:0;
}
/* CARD */
.glass-card{
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);
    padding:35px;
    border-radius:20px;
    width:85%;
    max-width:850px;
    margin-top:30px;
    border:1px solid rgba(255,153,0,0.25);
    box-shadow:0 10px 40px rgba(0,0,0,0.6);
}


/* TIMELINE */
.timeline{
    position:relative;
    margin-top:40px;
    padding-left:30px;
    border-left:3px solid #ff9900;
    text-align:left;
}
.timeline-item{
    position:relative;
    margin-bottom:40px;
    padding-left:20px;
    transition:0.4s;
}

.timeline-item::before{
    content:"";
    position:absolute;
    left:-14px;
    top:5px;
    width:18px;
    height:18px;
    background:#ff9900;
    border-radius:50%;
    box-shadow:0 0 15px rgba(255,153,0,0.8);
}

.timeline-item:hover{
    transform:translateX(8px);
}

.timeline-item h3{
    color:#ff9900;
    margin-bottom:5px;
}

.timeline-item span{
    font-size:14px;
    color:#9ca3af;
}

/* FLOATING SYMBOLS */
.symbol{
    position:absolute;
    color:rgba(255,153,0,0.15);
    animation:floatSymbol linear infinite;
}

@keyframes floatSymbol{
    0%{
        transform:translateY(100vh) rotate(0deg);
        opacity:0;
    }
    10%{opacity:1;}
    90%{opacity:1;}
    100%{
        transform:translateY(-10vh) rotate(360deg);
        opacity:0;
    }
}

/* PARTICLES */
.particle{
    position:absolute;
    width:4px;
    height:4px;
    background:#ff9900;
    border-radius:50%;
    box-shadow:0 0 10px #ff9900,0 0 20px #ff9900;
    animation:particleFloat linear infinite;
}

@keyframes particleFloat{
    from{transform:translateY(100vh);}
    to{transform:translateY(-10vh);}
}

/* SHOOTING STAR */
.star{
    position:absolute;
    width:2px;
    height:80px;
    background:linear-gradient(white,transparent);
    transform:rotate(45deg);
    animation:shoot 1s linear forwards;
}

@keyframes shoot{
    from{transform:translate(0,0) rotate(45deg);}
    to{transform:translate(600px,600px) rotate(45deg);opacity:0;}
}

/* NAVBAR */
/* Professional Header Improvements */

header{
    padding:18px 60px;
}

.logo{
    font-weight:700;
    font-size:20px;
    letter-spacing:1px;
    text-transform:uppercase;
}

nav ul li a{
    position:relative;
    font-weight:500;
    font-size:15px;
}

/* Underline Animation */
nav ul li a::after{
    content:"";
    position:absolute;
    width:0%;
    height:2px;
    bottom:-5px;
    left:0;
    background:#ff9900;
    transition:0.3s ease;
}

nav ul li a:hover::after{
    width:100%;
}

header{
    position:fixed;
    width:100%;
    padding:18px 60px;
    background:rgba(11,15,25,0.9);
    backdrop-filter:blur(12px);
    border-bottom:1px solid rgba(255,153,0,0.3);
    z-index:1000;
}

nav{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-weight:700;
    font-size:22px;
    color:#ff9900;
}

nav ul{
    list-style:none;
    display:flex;
    gap:30px;
}

nav ul li a{
    text-decoration:none;
    color:#d1d5db;
    transition:0.3s;
}

nav ul li a:hover{
    color:#ff9900;
}

/* SECTION */
section{
    min-height:100vh;
    padding:120px 20px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    position:relative;
    z-index:1;
}

/* PROFILE */
.home-container{
    display:flex;
    align-items:center;
    gap:60px;
    flex-wrap:wrap;
}

.profile-img{
    width:260px;
    height:260px;
    border-radius:50%;
    object-fit:cover;
    border:4px solid #ff9900;
    box-shadow:0 0 40px rgba(255,153,0,0.6);
    transition:0.4s;
}

.profile-img:hover{
    transform:scale(1.05);
}

.typing, h2, span{
    color:#ff9900;
}

/* BUTTON */
.btn{
    margin-top:15px;
    padding:10px 28px;
    background:linear-gradient(45deg,#ff9900,#ffb84d);
    border:none;
    border-radius:25px;
    font-weight:bold;
    cursor:pointer;
    color:#111;
    transition:0.3s;
    box-shadow:0 0 15px rgba(255,153,0,0.5);
}

/* REMOVE BACKGROUND FOR ABOUT & CONTACT */
#about .glass-card,
#contact .glass-card{
    background:transparent !important;
    backdrop-filter:none !important;
    -webkit-backdrop-filter:none !important;
    border:none !important;
    box-shadow:none !important;
}

.btn:hover{
    transform:translateY(-4px);
    box-shadow:0 0 35px rgba(255,153,0,0.8);
}

/* CARD */
.glass-card{
    background:rgba(255,255,255,0.03);  /* very light */
    backdrop-filter:blur(12px);
    -webkit-backdrop-filter:blur(12px);
    padding:40px;
    border-radius:20px;
    width:85%;
    max-width:900px;
    margin-top:30px;
    border:1px solid rgba(255,153,0,0.2);
    box-shadow:0 8px 30px rgba(0,0,0,0.4);
}

/* ===== CORNER ANIMATION EFFECT ===== */
.glass-card{
    position:relative;
    overflow:hidden;
    transition:0.4s ease;
}

/* 4 animated corners */
.glass-card::before,
.glass-card::after{
    content:"";
    position:absolute;
    width:40px;
    height:40px;
    border:2px solid #ff9900;
    transition:0.4s ease;
}
/* REMOVE CORNER ANIMATION FROM CONTACT BOX */
#contact .glass-card::before,
#contact .glass-card::after{
    display:none;
}

#contact .glass-card:hover{
    box-shadow:none;
}
/* SMALLER BUTTON ONLY FOR CONTACT */
#contact .btn{
    padding:4px 10px;     /* small padding */
    font-size:12px;
    border-radius:14px;
    width:fit-content;    /* button fits text only */
    min-width:auto;
}
/* Top Left */
.glass-card::before{
    top:15px;
    left:15px;
    border-right:none;
    border-bottom:none;
}

/* Bottom Right */
.glass-card::after{
    bottom:15px;
    right:15px;
    border-left:none;
    border-top:none;
}

/* Hover Animation */
.glass-card:hover::before{
    top:5px;
    left:5px;
}

.glass-card:hover::after{
    bottom:5px;
    right:5px;
}

.glass-card:hover{
    box-shadow:0 0 35px rgba(255,153,0,0.6);
}


/* TRANSPARENT ABOUT & EDUCATION */
#about .glass-card,
#education .glass-card{
   background:transparent;
backdrop-filter:blur(10px);
-webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,153,0,0.25) !important;
    box-shadow:0 10px 40px rgba(0,0,0,0.6) !important;
}


/* SKILLS GRID */
.skills-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:30px;
}

.skill-box{
    background:#1f2937;
    padding:20px;
    border-radius:15px;
    transition:0.3s;
}

.skill-box:hover{
    transform:translateY(-5px);
    box-shadow:0 5px 20px rgba(255,153,0,0.3);
}
.error-msg{
    margin-top:15px;
    color:#ff4d4d;
    display:none;
}

/* FORM */
form{
    display:flex;
    flex-direction:column;
    gap:12px;
    width:100%;
    max-width:450px;
    margin:0 auto;
}

input,textarea{
    padding:10px;
    border-radius:8px;
    border:1px solid rgba(255,255,255,0.2);
    background:rgba(255,255,255,0.06);
    color:white;
    font-size:14px;
}


.success-msg{
    margin-top:15px;
    color:#00ffae;
    display:none;
}

footer{
    text-align:center;
    padding:10px 0;   /* reduced height */
    background:#0b0f19;
    font-size:14px;
}

footer a:hover{
    color:#ff9900;
    transform:translateY(-3px);
}
footer a{
    transition:0.3s ease;
}
h1{
    font-size:38px;
    font-weight:600;
}

h2{
    font-size:28px;
    margin-bottom:10px;
}


/* MENU BUTTON */
.menu-toggle{
    display:none;
    font-size:28px;
    cursor:pointer;
    color:#ff9900;
}

/* MOBILE NAV */
@media (max-width:768px){

    .menu-toggle{
        display:block;
    }

    nav ul{
        position:absolute;
        top:70px;
        right:0;
        background:rgba(11,15,25,0.95);
        flex-direction:column;
        width:220px;
        padding:20px;
        gap:20px;
        display:none;
        border-left:1px solid rgba(255,153,0,0.3);
        border-bottom:1px solid rgba(255,153,0,0.3);
    }

    nav ul.active{
        display:flex;
    }
}

/* Mobile */
@media (max-width: 480px){
    .home-container{
        flex-direction:column;
        gap:30px;
    }

    .profile-img{
        width:180px;
        height:180px;
    }

    nav ul{
        gap:15px;
        font-size:14px;
    }
}

/* Tablet */
@media (max-width: 768px){
    .home-container{
        flex-direction:column;
        gap:40px;
    }

    .profile-img{
        width:220px;
        height:220px;
    }
}

/* Small Laptop */
@media (max-width: 1024px){
    .glass-card{
        width:95%;
    }
}

/* Large Screens */
@media (min-width: 1200px){
    .glass-card{
        max-width:1100px;
    }
}
/* SCROLL TO TOP BUTTON */
/* PREMIUM SCROLL BUTTON */
#scrollTopBtn{
    position:fixed;
    bottom:35px;
    right:35px;
    width:48px;
    height:48px;
    border-radius:50%;
    border:1px solid rgba(255,153,0,0.4);
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(10px);
    -webkit-backdrop-filter:blur(10px);
    color:#ff9900;
    font-size:18px;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    opacity:0;
    visibility:hidden;
    transition:all 0.4s ease;
    box-shadow:0 8px 25px rgba(0,0,0,0.4);
    z-index:999;
}

/* Visible State */
#scrollTopBtn.show{
    opacity:1;
    visibility:visible;
}

/* Hover Effect */
#scrollTopBtn:hover{
    background:#ff9900;
    color:#111;
    transform:translateY(-6px);
    box-shadow:0 0 25px rgba(255,153,0,0.8);
}

/* Hide on Mobile */
@media (max-width:768px){
    #scrollTopBtn{
        display:none !important;
    }

}
/* ===== PROFESSIONAL PROJECT SECTION ===== */
/* ===== Projects Same Animation As Glass Card ===== */

#projects .projects{
    position:relative;
    overflow:hidden;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(45px);
    -webkit-backdrop-filter:blur(45px);
    padding:35px;
    border-radius:20px;
    border:1px solid rgba(255,153,0,0.25);
    box-shadow:0 10px 40px rgba(0,0,0,0.6);
    transition:0.4s ease;
    text-align:left;
    min-height:260px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

/* Corner Animation */
#projects .projects::before,
#projects .projects::after{
    content:"";
    position:absolute;
    width:40px;
    height:40px;
    border:2px solid #ff9900;
    transition:0.4s ease;
}

/* Top Left */
#projects .projects::before{
    top:15px;
    left:15px;
    border-right:none;
    border-bottom:none;
}

/* Bottom Right */
#projects .projects::after{
    bottom:15px;
    right:15px;
    border-left:none;
    border-top:none;
}

/* Hover Effect Same As Other Cards */
#projects .projects:hover{
    transform:translateY(-8px);
    box-shadow:0 0 35px rgba(255,153,0,0.6);
}

/* Corner Move On Hover */
#projects .projects:hover::before{
    top:5px;
    left:5px;
}

#projects .projects:hover::after{
    bottom:5px;
    right:5px;
}

/* Mobile */
@media(max-width:768px){
    #projects .skills-grid{
        grid-template-columns:1fr;
    }
}


@keyframes fadeUp{
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ===== Mobile Responsive ===== */
@media(max-width:768px){
    #projects .skills-grid{
        grid-template-columns:1fr;   /* Stack on mobile */
    }
}


</style>
</head>

<body>
<button id="scrollTopBtn" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

<div id="symbols-container"></div>
<header>
<nav>
    <div class="logo">
        Pratiksha <span style="color:#e5e7eb; font-weight:400;">Lavand</span>
    </div>

    <div class="menu-toggle" id="menuToggle">
        ☰
    </div>

    <ul id="navLinks">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>
</header>


<section id="home">
<div class="home-container">
<img src="./img/profile.jpg" class="profile-img">
<div>
<h1>Hi, I'm <span>Pratiksha Lavand</span></h1>
<h3><span class="typing"></span></h3>
<p>
    <i class="fas fa-location-dot" style="color:#ff9900;"></i> Pune 
    &nbsp; | &nbsp; 
    <i class="fas fa-envelope" style="color:#ff9900;"></i> pratikshalavand98@gmail.com
</p>

<a href="./PratikshaLavandResume.pdf" download="Pratiksha_Lavand_CV.pdf">
    <button class="btn">Download CV</button>
</a>
</div>
</div>
</section>

<!-- ABOUT -->
<section id="about">
<div class="glass-card">
<h2>About Me</h2>
<p style="margin-top:20px; line-height:1.8; font-size:17px;">
 I am Pratiksha Lavand, passionate about cloud computing and modern web technologies. 
 I focus on building secure, scalable, and efficient cloud solutions through continuous learning and hands-on practice. 
 My goal is to grow as a Cloud Architect and contribute effectively in a professional environment.
</p>
</div>
</section>

<section id="skills">
<div class="glass-card">
<h2>Technical Skills</h2>
<div class="skills-grid">
<div class="skill-box">AWS Cloud (EC2, S3, IAM, VPC)</div>
<div class="skill-box">Cloud Deployment</div>
<div class="skill-box">HTML, CSS, JS</div>
<div class="skill-box">PHP</div>
<div class="skill-box">MySQL & SQL</div>
<div class="skill-box">Git & VS Code</div>
</div>
</div>
</section>
<!-- PROJECTS -->
<section id="projects">
<div class="Project-card">
<h2>Projects</h2>

<div class="skills-grid">

    <!-- Project 1 -->
    <div class="projects">
        <h3 style="color:#ff9900;">AWS Cloud Web Deployment</h3>
        <p style="margin-top:10px; font-size:15px; line-height:1.6;">
            Deployed a responsive web application on AWS using EC2 for hosting 
            and S3 for static storage. Configured IAM roles and security groups 
            to ensure secure and scalable deployment.
        </p>
        <p style="margin-top:8px; font-size:14px; color:#9ca3af;">
            Technologies: EC2, S3, IAM, HTML, CSS
        </p>
    </div>

    <!-- Project 2 -->
    <div class="projects">
        <h3 style="color:#ff9900;">Static Website Hosting on AWS S3</h3>
        <p style="margin-top:10px; font-size:15px; line-height:1.6;">
            Hosted a static portfolio website using AWS S3 with public access 
            configuration. Implemented performance optimization for faster 
            content delivery.
        </p>
        <p style="margin-top:8px; font-size:14px; color:#9ca3af;">
            Technologies: AWS S3, CloudFront
        </p>
    </div>
      <!-- Project 1 -->
    <div class="projects">
        <h3 style="color:#ff9900;">Fruit Mart Selling Website</h3>
        <p style="margin-top:10px; font-size:15px; line-height:1.6;">
            Developed an online shopping web application where users can browse 
            fruits and products, search items, view offers, place orders, and 
            download bill receipts. The system ensures smooth user interaction 
            and efficient order management.
        </p>
        <p style="margin-top:8px; font-size:14px; color:#9ca3af;">
            Technologies: PHP, HTML5, CSS, Bootstrap, MySQL
        </p>
    </div>

    <!-- Project 2 -->
    <div class="projects">
        <h3 style="color:#ff9900;">Online Home Services Platform</h3>
        <p style="margin-top:10px; font-size:15px; line-height:1.6;">
            Built a service management platform that allows customers to book 
            home services while enabling the admin to manage users, services, 
            and service providers efficiently. Designed with focus on 
            usability, structured database management, and responsive design.
        </p>
        <p style="margin-top:8px; font-size:14px; color:#9ca3af;">
            Technologies: PHP, HTML, CSS, Bootstrap, JavaScript, MySQL
        </p>
    </div>

</div>
</div>
</section>
<!-- conatct form start --->
<section id="contact">
<div class="glass-card">
<h2>Contact Me</h2>
<form id="contactForm" method="post">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
    <button type="submit" class="btn">Send Message</button>
</form>
<div class="success-msg" id="successMsg">
    <?php echo htmlspecialchars($success); ?>
</div>
</div>
</section>
<!-- conatct form end --->
<footer>
 <div style="margin-bottom:5px; font-size:14px; letter-spacing:1px;">
© 2026 Pratiksha Lavand | Cloud Architect
    </div>

    <div style="display:flex; justify-content:center; gap:25px; margin-top:10px;">
        
        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/in/pratiksha-lavand-4ba4002a2/" target="_blank" 
           style="color:#e5e7eb; font-size:22px; transition:0.3s;">
            <i class="fab fa-linkedin"></i>
        </a>

        <!-- GitHub -->
        <a href="https://github.com/pratikshalavand98" target="_blank" 
           style="color:#e5e7eb; font-size:22px; transition:0.3s;">
            <i class="fab fa-github"></i>
        </a>

    </div>
</footer>


<script>

/* TYPING */
const words=["Aspiring Cloud Architect","AWS Cloud Practitioner","Scalable Cloud Solutions"];
let i=0,j=0,current="",deleting=false;
function type(){
current=words[i];
if(!deleting){
document.querySelector(".typing").textContent=current.substring(0,j++);
if(j>current.length){deleting=true;setTimeout(type,1000);return;}
}else{
document.querySelector(".typing").textContent=current.substring(0,j--);
if(j==0){deleting=false;i=(i+1)%words.length;}
}
setTimeout(type,deleting?50:100);
}
document.addEventListener("DOMContentLoaded",type);

/* FLOATING SYMBOLS */
const symbols=["☁","λ","{}","</>","⚙️","🚀","💻","API","VPC","IAM","S3","EC2"];
const container=document.getElementById("symbols-container");

function createSymbol(){
const s=document.createElement("div");
s.classList.add("symbol");
s.innerText=symbols[Math.floor(Math.random()*symbols.length)];
s.style.left=Math.random()*100+"vw";
s.style.fontSize=(15+Math.random()*30)+"px";
s.style.animationDuration=(15+Math.random()*20)+"s";
container.appendChild(s);
setTimeout(()=>{s.remove();},35000);
}
setInterval(createSymbol,800);

/* PARTICLES */
function createParticle(){
const p=document.createElement("div");
p.classList.add("particle");
p.style.left=Math.random()*100+"vw";
p.style.animationDuration=(5+Math.random()*5)+"s";
container.appendChild(p);
setTimeout(()=>{p.remove();},8000);
}
setInterval(createParticle,300);

/* SHOOTING STAR */
function createStar(){
const star=document.createElement("div");
star.classList.add("star");
star.style.top=Math.random()*window.innerHeight+"px";
star.style.left=Math.random()*window.innerWidth+"px";
container.appendChild(star);
setTimeout(()=>{star.remove();},1000);
}
setInterval(createStar,5000);

/* CONTACT */
/* CONTACT FORM AJAX SUBMISSION */
contactForm.addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(contactForm);

    // 1️⃣ Save to database (PHP)
    fetch("", {
        method:"POST",
        body:formData,
        headers:{ "X-Requested-With":"XMLHttpRequest" }
    })
    .then(res=>res.json())
    .then(data=>{

        // 2️⃣ Admin ko mail (tumhe)
        emailjs.sendForm("YOUR_SERVICE_ID", "ADMIN_TEMPLATE_ID", contactForm);

        // 3️⃣ User ko auto-reply mail
        emailjs.sendForm("YOUR_SERVICE_ID", "AUTO_REPLY_TEMPLATE_ID", contactForm);

        successMsg.textContent = "Message sent successfully! Check your email 😊";
        successMsg.style.display = "block";

        contactForm.reset();

        setTimeout(()=>{
            successMsg.style.display="none";
        },3000);
    })
    .catch(()=>{
        successMsg.textContent="Something went wrong!";
        successMsg.style.display="block";
    });
});
/* MOBILE MENU */
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});
/* SCROLL TO TOP */
const scrollBtn = document.getElementById("scrollTopBtn");

window.addEventListener("scroll", () => {
    if (window.innerWidth > 768 && window.scrollY > 300) {
        scrollBtn.classList.add("show");
    } else {
        scrollBtn.classList.remove("show");
    }
});

scrollBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

</script>

</body>
</html> muze ye github ko host karna hai