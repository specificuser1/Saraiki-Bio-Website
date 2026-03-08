<?php
$config = include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($config['meta']['description']); ?>">
    <title><?php echo htmlspecialchars($config['meta']['title']); ?></title>
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }
        
        .video-background video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Dark overlay on video */
        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.85) 0%, rgba(30, 30, 30, 0.9) 100%);
            z-index: -1;
        }
        
        /* Particle Canvas */
        #particles-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            background: rgba(20, 20, 20, 0.95);
            border-radius: 25px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8);
            text-align: center;
            animation: fadeIn 0.6s ease-in;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .profile-section {
            margin-bottom: 30px;
        }
        
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #888;
            margin: 0 auto 20px;
            display: block;
            object-fit: cover;
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
        }
        
        /* Glowing Title with Particles */
        h1 {
            color: #ffffff;
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 700;
            text-shadow: 
                0 0 10px rgba(255, 255, 255, 0.8),
                0 0 20px rgba(255, 255, 255, 0.6),
                0 0 30px rgba(255, 255, 255, 0.4),
                0 0 40px rgba(136, 136, 136, 0.3);
            animation: glow 2s ease-in-out infinite alternate;
            position: relative;
            display: inline-block;
        }
        
        @keyframes glow {
            from {
                text-shadow: 
                    0 0 10px rgba(255, 255, 255, 0.8),
                    0 0 20px rgba(255, 255, 255, 0.6),
                    0 0 30px rgba(255, 255, 255, 0.4),
                    0 0 40px rgba(136, 136, 136, 0.3);
            }
            to {
                text-shadow: 
                    0 0 20px rgba(255, 255, 255, 1),
                    0 0 30px rgba(255, 255, 255, 0.8),
                    0 0 40px rgba(255, 255, 255, 0.6),
                    0 0 50px rgba(136, 136, 136, 0.5),
                    0 0 60px rgba(136, 136, 136, 0.4);
            }
        }
        
        .tagline {
            color: #888;
            font-size: 1.3em;
            font-weight: 600;
            margin-bottom: 15px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .description {
            color: #bbb;
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 40px;
        }
        
        .skill-tag {
            background: linear-gradient(135deg, #333, #555);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 30px;
        }
        
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 15px 25px;
            background: rgba(40, 40, 40, 0.9);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            text-decoration: none;
            color: #ffffff;
            font-weight: 600;
            font-size: 1.1em;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
        
        .social-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }
        
        .social-link i {
            font-size: 1.5em;
        }
        
        .social-link.discord:hover {
            background: #5865F2;
            border-color: #5865F2;
        }
        
        .social-link.youtube:hover {
            background: #FF0000;
            border-color: #FF0000;
        }
        
        .social-link.instagram:hover {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            border-color: #bc1888;
        }
    
        
        .social-link.custom-link:hover {
            background: var(--hover-color);
            border-color: var(--hover-color);
        }
        
        .discord i { color: #5865F2; }
        .youtube i { color: #FF0000; }
        .instagram i { color: #E1306C; }
        
        footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
            color: #888;
            font-size: 0.9em;
        }
        
        /* Music Player Button */
        .music-player {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            cursor: pointer;
        }
        
        .music-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #333, #555);
            border: 3px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            animation: pulse 2s ease-in-out infinite;
        }
        
        .music-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(136, 136, 136, 0.6);
        }
        
        .music-button img {
            width: 35px;
            height: 35px;
            object-fit: contain;
        }
        
        .music-button i {
            font-size: 28px;
            color: #fff;
        }
        
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            }
            50% {
                box-shadow: 0 4px 25px rgba(136, 136, 136, 0.8);
            }
        }
        
        .music-button.playing {
            background: linear-gradient(135deg, #10b981, #059669);
            animation: rotate 3s linear infinite;
        }
        
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 2em;
            }
            
            .tagline {
                font-size: 1.1em;
            }
            
            .social-links {
                grid-template-columns: 1fr;
            }
            
            .music-player {
                bottom: 20px;
                right: 20px;
            }
            
            .music-button {
                width: 50px;
                height: 50px;
            }
            
            .music-button i {
                font-size: 22px;
            }
            
            .music-button img {
                width: 28px;
                height: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <div class="video-background">
        <video autoplay muted loop playsinline>
            <source src="<?php echo htmlspecialchars($config['profile']['video_bg']); ?>" type="video/mp4">
        </video>
    </div>
    <div class="video-overlay"></div>
    
    <!-- Particle Canvas -->
    <canvas id="particles-canvas"></canvas>
    
    <!-- Music Player -->
    <?php if ($config['music']['enabled']): ?>
    <div class="music-player">
        <div class="music-button" id="musicToggle">
            <?php if ($config['music']['icon'] !== 'default' && !empty($config['music']['icon'])): ?>
                <img src="<?php echo htmlspecialchars($config['music']['icon']); ?>" alt="Music">
            <?php else: ?>
                <i class="fas fa-music"></i>
            <?php endif; ?>
        </div>
    </div>
    
    <audio id="backgroundMusic" loop>
        <?php 
        $audioSrc = !empty($config['music']['custom_url']) ? 
                    $config['music']['custom_url'] : 
                    $config['music']['audio_file'];
        ?>
        <source src="<?php echo htmlspecialchars($audioSrc); ?>" type="audio/mpeg">
    </audio>
    <?php endif; ?>
    
    <div class="container">
        <div class="profile-section">
            <img src="<?php echo htmlspecialchars($config['profile']['image']); ?>" alt="<?php echo htmlspecialchars($config['profile']['name']); ?>" class="profile-img">
            
            <h1><?php echo htmlspecialchars($config['profile']['name']); ?></h1>
            <p class="tagline"><?php echo htmlspecialchars($config['profile']['tagline']); ?></p>
            <p class="description">
                <?php echo htmlspecialchars($config['profile']['description']); ?>
            </p>
        </div>
        
        <div class="skills">
            <?php foreach($config['skills'] as $skill): ?>
                <span class="skill-tag"><?php echo htmlspecialchars($skill); ?></span>
            <?php endforeach; ?>
        </div>
        
        <div class="social-links">
            <a href="<?php echo htmlspecialchars($config['social']['discord']); ?>" class="social-link discord" target="_blank">
                <i class="fab fa-discord"></i>
                <span>Discord</span>
            </a>
            
            <a href="<?php echo htmlspecialchars($config['social']['youtube']); ?>" class="social-link youtube" target="_blank">
                <i class="fab fa-youtube"></i>
                <span>YouTube</span>
            </a>
            
            <a href="<?php echo htmlspecialchars($config['social']['instagram']); ?>" class="social-link instagram" target="_blank">
                <i class="fab fa-instagram"></i>
                <span>Instagram</span>
            </a>
            
            
            <?php if (isset($config['custom_links']) && !empty($config['custom_links'])): ?>
                <?php foreach ($config['custom_links'] as $link): ?>
                    <a href="<?php echo htmlspecialchars($link['url']); ?>" class="social-link custom-link" target="_blank" style="--hover-color: <?php echo htmlspecialchars($link['color']); ?>">
                        <i class="<?php echo htmlspecialchars($link['icon']); ?>" style="color: <?php echo htmlspecialchars($link['color']); ?>"></i>
                        <span><?php echo htmlspecialchars($link['name']); ?></span>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <footer>
            <p><?php echo $config['meta']['footer']; ?></p>
        </footer>
    </div>
    
    <script>
        // Particle System for Title Glow
        const canvas = document.getElementById('particles-canvas');
        const ctx = canvas.getContext('2d');
        
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        
        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
        
        class Particle {
            constructor() {
                this.reset();
            }
            
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 3 + 1;
                this.speedX = (Math.random() - 0.5) * 2;
                this.speedY = (Math.random() - 0.5) * 2;
                this.opacity = Math.random() * 0.5 + 0.2;
            }
            
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                
                if (this.x > canvas.width || this.x < 0 || this.y > canvas.height || this.y < 0) {
                    this.reset();
                }
            }
            
            draw() {
                ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
                
                // Glow effect
                ctx.shadowBlur = 10;
                ctx.shadowColor = 'rgba(255, 255, 255, 0.5)';
            }
        }
        
        const particles = [];
        for (let i = 0; i < 100; i++) {
            particles.push(new Particle());
        }
        
        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            particles.forEach(particle => {
                particle.update();
                particle.draw();
            });
            
            requestAnimationFrame(animateParticles);
        }
        
        animateParticles();
        
        // Music Player Functionality
        <?php if ($config['music']['enabled']): ?>
        const music = document.getElementById('backgroundMusic');
        const musicToggle = document.getElementById('musicToggle');
        let isPlaying = false;
        
        music.volume = <?php echo $config['music']['volume']; ?>;
        
        musicToggle.addEventListener('click', function() {
            if (isPlaying) {
                music.pause();
                musicToggle.classList.remove('playing');
                isPlaying = false;
            } else {
                music.play().catch(e => {
                    console.log('Autoplay prevented:', e);
                });
                musicToggle.classList.add('playing');
                isPlaying = true;
            }
        });
        
        // Auto-play on page load
        window.addEventListener('load', function() {
            // Try to auto-play immediately
            music.play().then(() => {
                musicToggle.classList.add('playing');
                isPlaying = true;
                console.log('Music auto-playing');
            }).catch(e => {
                console.log('Auto-play blocked by browser. Click music button to play.');
                
                // Try again on first user interaction
                const tryAutoPlay = () => {
                    music.play().then(() => {
                        musicToggle.classList.add('playing');
                        isPlaying = true;
                    }).catch(() => {});
                    
                    // Remove listeners after first attempt
                    document.removeEventListener('click', tryAutoPlay);
                    document.removeEventListener('touchstart', tryAutoPlay);
                    document.removeEventListener('scroll', tryAutoPlay);
                };
                
                document.addEventListener('click', tryAutoPlay, { once: true });
                document.addEventListener('touchstart', tryAutoPlay, { once: true });
                document.addEventListener('scroll', tryAutoPlay, { once: true });
            });
        });
        <?php endif; ?>
    </script>
</body>
</html>
