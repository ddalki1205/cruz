<?php if(isset($_SESSION['user_level'])): ?>
<section class="main-content">
    <h2 class="main-heading">About Us</h2>
    <p class="main-paragraph">Welcome to my php working registration system! BOOM PANIS LIWANAG</p>
    <h3>Our Vision & Mission</h3>
    <p>ENIAC UNIVAC IBM Acorn WOWOWOW theFacebook, angry birds best seller. WOWOWOWOW</p>
    <h3>Our Services</h3>
    <ul>
        <li>Let me cook</li>
        <li>Let you cook</li>
        <li>Let them cook</li>
        <li>Let him cook</li>
        <li>Let her cook</li>
    </ul>
    <h3>Get in Touch</h3>
    <p>If you have any questions or would like to learn more about our services, please contact us at <a href="https://youtu.be/QGCkDOkpWf8?si=lZgY1HeMPo5Y61KN" target="_blank" class="nav-link1">theFacebook@hacker.com</a>.</p>
</section>

<?php else: ?>
<section class="mem-content">
        <h2 class="main-heading">About You</h2>
        <p class="main-paragraph">Welcome to your profile</p>
        <h3>pic here</h3>
        <p>bio here</p>
        <h3>website purpose here</h3>
        <ul>
            <li>Let me cook</li>
            <li>Let you cook</li>
            <li>Let them cook</li>
            <li>Let him cook</li>
            <li>Let her cook</li>
        </ul>
        <h3>Get in Touch</h3>
        <p>If you have any questions or would like to learn more about yourself, please contact us at <a href="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1" target="_blank" class="nav-link1">theFacebook@hacker.com</a>.</p>
</section>
<?php endif ?>