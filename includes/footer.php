<?php $base_path = isset($base_path) ? $base_path : ''; ?>
<footer class="footer-elite text-white py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Coluna 1: Logo, descrição e redes -->
             <a href="<?php echo $base_path; ?>index.php" class="footer-brand d-inline-block mb-3"> <img src="<?php echo $base_path; ?>assets/images/logo.png" alt="STECH ENGENHARIA"></a>
            <div class="col-lg-4">
                <p class="mb-3 opacity-75" style="color:white"><?= e(t('footer.about_text')) ?></p>
                <div class="d-flex gap-2">
                    <a href="https://wa.me/258842390756" target="_blank" rel="noopener" class="btn btn-light btn-icon social-wa" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://mz.linkedin.com/company/stech-engenharia" target="_blank" rel="noopener" class="btn btn-light btn-icon social-li" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.facebook.com/Stech.Engenharia/" target="_blank" rel="noopener" class="btn btn-light btn-icon social-fb" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/stech_engenharia_oficial/" target="_blank" rel="noopener" class="btn btn-light btn-icon social-ig" aria-label="Instagram"> <i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Coluna 2: Nossos Serviços -->
            <div class="col-6 col-lg-3">
                <h5 class="mb-3"><?= e(t('footer.services_title')) ?></h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="<?php echo $base_path; ?>servicos.php" class="link-light text-decoration-none"><?= e(t('footer.service_1')) ?></a></li>
                    <li><a href="<?php echo $base_path; ?>servicos.php" class="link-light text-decoration-none"><?= e(t('footer.service_2')) ?></a></li>
                    <li><a href="<?php echo $base_path; ?>servicos.php" class="link-light text-decoration-none"><?= e(t('footer.service_3')) ?></a></li>
                    <li><a href="<?php echo $base_path; ?>servicos.php" class="link-light text-decoration-none"><?= e(t('footer.service_4')) ?></a></li>
                    <li><a href="<?php echo $base_path; ?>servicos.php" class="link-light text-decoration-none"><?= e(t('footer.service_5')) ?></a></li>
                    <li><a href="<?php echo $base_path; ?>servicos.php" class="link-light text-decoration-none"><?= e(t('footer.service_6')) ?></a></li>
                </ul>
            </div>

            <!-- Coluna 4: Contato -->
            <div class="col-lg-3">
                <h5 class="mb-3"><?= e(t('footer.contact_title')) ?></h5>
                <ul class="list-unstyled footer-contact">

                    <li class="footer-contact-item"><i class="fas fa-phone text-danger"></i><a href="tel:+258842390756" class="link-light text-decoration-none">+258 84 239 0756</a></li>
                    <li class="footer-contact-item"><i class="fas fa-envelope text-danger"></i><a href="https://mail.google.com/mail/?view=cm&fs=1&to=info@stecheng.co.mz&su=Contato%20via%20site" target="_blank" rel="noopener" class="link-light text-decoration-none">info@stecheng.co.mz</a></li>
                    <li class="footer-contact-item"><i class="fas fa-location-dot text-danger"></i><a href="https://www.google.com/maps/search/?api=1&query=Estrada+Nacional+Nr7+PMA+Bairro+Azul+Tete+Moçambique" target="_blank" rel="noopener" class="link-light text-decoration-none"><?= t('footer.address') ?></a></li>
                    <li class="footer-contact-item"><i class="fas fa-clock text-danger"></i><div class="footer-contact-text"><?= t('footer.hours') ?></div></li>

                </ul>
            </div>
        </div>

        <hr class="my-4 border-secondary border-opacity-25">

        <div class="text-center">
            <p class="mb-0 opacity-75" style="color: white"> &copy; 2023 - <?php echo date('Y'); ?> STECH ENGENHARIA. <?= e(t('footer.rights')) ?></p>
        </div>
    </div>
</footer>
</body>
</html>

