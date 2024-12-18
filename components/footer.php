<?php 
    use App\Config\Config;
?>
    
    <footer>
        <a href="https://davidcravo.fr/" target="_blank">David CRAVO</a>
        <div class="footer_links">
            <a href="<?= Config::LINKS['github'] ?>" target="_blank"><img src="<?= Config::DIR['images'] . 'footer/' . 'github.png' ?>" alt="logo Github"></a>
            <a href="<?= Config::LINKS['linkedin'] ?>" target="_blank"><img src="<?= Config::DIR['images'] . 'footer/' . 'linkedin.png' ?>" alt="logo Linkedin"></a>
        </div>
        <div class="footer_date">2024</div>
    </footer>
<body>