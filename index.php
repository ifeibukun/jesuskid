<?php

include "navbar.html"

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orphanage Homepage</title>
  <style>
    body {
      /* font-family:; */
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: blue;
    }

    header {
      background-color: #333;
      padding: 20px 0;
      text-align: center;
      color: orangered;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .hero-section {
      background-color: #f4f4f4;
      padding: 50px 20px;
      background-color: orangered;
      border-radius: 50px 0px 50px 0px;
      text-align: center;
      color: white;
    }

    .hero-section h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 18px;
      margin-bottom: 40px;
    }

    .featured-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      grid-gap: 20px;
      padding: 50px 20px;
      text-align: center;
    }

    .featured-section h2 {
      /* font-size: 28px; */
      margin-bottom: 20px;
      
    }

    h2{
        text-align: center;
        margin-top: 4%;
        font-weight: bolder;
        color: white;
    }
    .events{
      color: white;
      font-size: 14px;
    }
    .event-container{
      background-color: orangered;
    }

    .featured-section .program {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 5px;
    }

    .featured-section .program h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .featured-section .program p {
      font-size: 16px;
      line-height: 1.6;
    }

    .testimonial-section {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 20px;
      padding: 50px 20px;
      text-align: center;
      background-color: white;
      border-radius: 0px 50px 0px 50px;
    }

    .testimonial-section h2 {
      font-size: 28px;
      margin-bottom: 20px;
      grid-column: span 2;
    }

    .testimonial {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      /* color: orangered; */
    }
    .testimonial-text{
      color: orangered;
    }
    .testimonial p {
      font-size: 16px;
      line-height: 1.6;
    }

    .cta-button {
      display: inline-block;
      background-color: #333;
      color: #fff;
      padding: 12px 24px;
      text-decoration: none;
      font-size: 18px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .cta-button:hover {
      background-color: #555;
    }

       /* Reset default margin and padding */
       body, h1, p {
        margin: 0;
        padding: 0;
    }

    /* Container for the event */
    .event-container {
        width: 300px;
        margin: 20px;
        padding: 20px;
        border-radius: 50px 0px 50px 0px;
        background-color: orangered;
        /* box-shadow: 0 0 10px rgba(10, 10, 10, 0.1); */
    }

    /* Event title */
    .event-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: white;
    }

    /* Event date */
    .event-date {
        font-size: 16px;
        color: #666;
        color: white;
        margin-bottom: 10px;
    }

    /* Event description */
    .event-description {
        font-size: 16px;
        margin-bottom: 20px;
        color: white;
    }

    /* Event button */
    .event-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 3s; 
    }

    .events-containers{
        display: flex;
        margin-bottom: 50px;
    }

    /* Event button hover effect */
    .event-button:hover {
        background-color:grey;
    }

    .events{
        font-size: 28px;
        font-weight: bolder;
        text-align: center;
        margin-top: 4%;
    }

    .first-events{
        margin-top: 5%;
    }
      /* Carousel container */
  .carousel {
    /* margin-top: 10px; */
    width: 100%;
    height: 500px;
    overflow: hidden;
    position: relative ;
    margin: 0 auto;
    z-index: 98;
  }

  /* Slides */
  .carousel-item {
    width: 100%;
    height: 100%;
    position: absolute;
    display: none;
    /* margin-top: 20px; */
    text-align: center;
  }

  /* Text styles */
  .carousel-text {
    font-size: 24px;
    color: white;
    background-color: orangered;
    padding: 40px 50px;
    display: none;
    border-radius: 0px 40px 0px 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .images{
    width: 100%;
  }

  /* Show first slide by default */
  .carousel-item:first-child {
    display: block;
  }

  /* Next and previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    /* background-color: rgba(0, 0, 0, 0.5); */
    /* color: white; */
    padding: 10px 15px;
    border: none;
    z-index: 2;
  }

  .prev {
    margin-top: -65px;
    left: 0;
    color: orange;
    font-size: 30px;
    background: none;
  }

  .next {
    right: 0;
    margin-top: -65px;
    color: orange;
    font-size: 30px;
    background: none;
  }

    /* Media Query for Responsive Design */
    @media  (max-width: 600px) {
      .testimonial-section {
        grid-template-columns: 1fr;
      }
      .events-containers{
        display: flex;
        flex-direction: column;
    }
    .carousel {
    /* margin-top: 10px;  */
    /* width: 375px; */
    height: 375px;
    overflow: hidden;
    position: relative;
    margin: 0 auto;
  }
    .event-container {
        width: 250px;
        margin: 20px;
        padding: 20px;
        background-color: orangered;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    #next {
    margin-left: 855%;
    
  }
    .images{
      height: 300px;
    }
    .hero-section{
      /* background-color: orangered; */
      margin-bottom: 30px;
      margin-top: -80px;
    }
    .images{
    width: 100%;
    height: 250px;
  }
    }
  </style>
</head>
<body>


<div class="carousel">
  <div class="carousel-item">
    <img class="images" src="image/orphanage_1.avif" alt="Slide 1">
    <div class="carousel-text">Welcome To Our Orphanage.</div>
  </div>
  <div class="carousel-item">
    <img class="images" src="image/orphanage_2.avif" alt="Slide 2">
    <div class="carousel-text">Empowering The Future!!</div>
  </div>
  <div class="carousel-item">
    <img class="images" src="image/orphanage_3.jpg" alt="Slide 3">
    <div class="carousel-text">Rasing The Less Priviledge.</div>
  </div>

  <!-- Navigation buttons -->
  <button class="prev" onclick="plusSlides(-1)">❮</button>
  <button class="next" id="next" onclick="plusSlides(1)">❯</button>
</div>




  <div class="container">

    <div class="hero-section">
      <h1>Providing Love, Care, and Support</h1>
      <p>Helping orphaned children find hope for a better future.</p>
      <a href="donate.php" class="cta-button">Support Us</a>
    </div>

    <h2>Featured Programs</h2>

<div class="featured-section">
  <div class="program">
    <h3>Education Support</h3>
    <p>Our education support program ensures that every child has access to quality education, including school supplies, tutoring, and scholarships.</p>
  </div>
  <div class="program">
    <h3>Healthcare Services</h3>
    <p>We provide comprehensive healthcare services, including regular check-ups, vaccinations, and access to medical professionals.</p>
  </div>
  <div class="program">
    <h3>Life Skills Training</h3>
    <p>Our life skills training program equips children with essential skills such as communication, problem-solving, and financial literacy to prepare them for independent living.</p>
  </div>
</div>

<div class="first-events"> <p class="events">Events</p>  </div>

<div class="events-containers">
    <div class="event-container">
        <h2 class="event-title">Upcoming Event</h2>
        <p class="event-date">Date: March 13, 2024</p>
        <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="#" class="event-button">Learn More</a>
    </div>

    <div class="event-container">
        <h2 class="event-title">Upcoming Event</h2>
        <p class="event-date">Date: April 1, 2024</p>
        <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="#" class="event-button">Learn More</a>
    </div>

    <div class="event-container">
        <h2 class="event-title">Upcoming Event</h2>
        <p class="event-date">Date: May 20, 2024</p>
        <p class="event-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="#" class="event-button">Learn More</a>
    </div>
</div>

<div class="testimonial-section">
  <h2 class="testimonial-text">Testimonials</h2>
  <div class="testimonial">
    <p>"The orphanage database system has transformed our operations, making it easier to manage records and provide personalized care to each child. It has truly been a game-changer for us." - John Doe, Orphanage Director</p>
  </div>
  <div class="testimonial">
    <p>"Thanks to the support of the orphanage, I have been able to pursue my dreams and build a better future for myself. I am forever grateful for their love and guidance." - Sarah Smith, Former Orphan</p>
  </div>
</div>

  </div>

  <?php
  
  include "footer.html"
  
  ?>

</body>

<script>
let slideIndex = 1;
  showSlides(slideIndex);

  // Next/previous controls
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("carousel-item");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[slideIndex-1].style.display = "block";  
  }


</script>
</html>



