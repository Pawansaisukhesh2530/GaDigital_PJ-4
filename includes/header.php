<!-- Top Contact Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-content">
            <div class="top-bar-left">
                <span class="top-bar-address">
                    <i class="fas fa-map-marker-alt"></i><?php echo ADDRESS; ?>
                </span>
            </div>
            <div class="top-bar-right">
                <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="top-bar-item">
                    <i class="fas fa-envelope"></i><?php echo CONTACT_EMAIL; ?>
                </a>
                <a href="tel:<?php echo CONTACT_DIRECTOR; ?>" class="top-bar-item">
                    <i class="fas fa-phone-alt"></i><?php echo CONTACT_DIRECTOR; ?>
                </a>
                <a href="tel:<?php echo CONTACT_MD; ?>" class="top-bar-item">
                    <i class="fas fa-phone-alt"></i><?php echo CONTACT_MD; ?>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<header class="main-header" id="mainHeader">
    <div class="container">
        <div class="header-content">
            <a href="index.php" class="logo" aria-label="Nani Transformers home">
                <img src="<?php echo ASSETS_PATH; ?>/images/logo.svg" alt="Nani Transformers">
            </a>

            <nav class="main-nav" id="mainNav" aria-label="Main menu">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo isActivePage('index'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about-us.php" class="nav-link <?php echo isActivePage('about-us'); ?>">About Us</a>
                    </li>

                    <li class="nav-item has-dropdown has-mega">
                        <div class="nav-item-row">
                            <a href="products.php" class="nav-link <?php echo isActivePage('products'); ?>">Products</a>
                            <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Products submenu">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        <ul class="dropdown-menu dropdown-mega">
                            <li class="dropdown-group">
                                <span class="dropdown-group-title">Oil Filled Transformers</span>
                                <ul class="dropdown-sub">
                                    <li><a href="distribution-transformers-oil-filled.php">Distribution Transformers</a></li>
                                    <li><a href="power-transformers-oil-filled.php">Power Transformers</a></li>
                                    <li><a href="inverter-duty-transformers-oil-filled.php">Inverter Duty Transformers</a></li>
                                    <li><a href="converter-duty-transformers-oil-filled.php">Converter Duty Transformers</a></li>
                                    <li><a href="furnace-duty-transformers-oil-filled.php">Furnace Duty Transformers</a></li>
                                    <li><a href="rectifier-transformers-oil-filled.php">Rectifier Transformers</a></li>
                                    <li><a href="isolation-transformers-oil-filled.php">Isolation Transformers</a></li>
                                    <li><a href="lightning-transformers-oil-filled.php">Lightning Transformers</a></li>
                                    <li><a href="generator-transformers-oil-filled.php">Generator Transformers</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-group">
                                <span class="dropdown-group-title">VPI Dry Type Transformers</span>
                                <ul class="dropdown-sub">
                                    <li><a href="distribution-transformers-dry-type.php">Distribution Transformers</a></li>
                                    <li><a href="power-transformer-dry-type.php">Power Transformers</a></li>
                                    <li><a href="inverter-duty-transformer-dry-type.php">Inverter Duty Transformers</a></li>
                                    <li><a href="converter-duty-transformer-dry-type.php">Converter Duty Transformers</a></li>
                                    <li><a href="furnace-duty-transformer-dry-type.php">Furnace Duty Transformers</a></li>
                                    <li><a href="lightning-transformer-dry-type.php">Lightning Transformers</a></li>
                                    <li><a href="isolation-transformer-dry-type.php">Isolation Transformers</a></li>
                                    <li><a href="generator-transformer-dry-type.php">Generator Transformers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-dropdown">
                        <div class="nav-item-row">
                            <a href="services.php" class="nav-link <?php echo isActivePage('services'); ?>">Services</a>
                            <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Services submenu">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="repairing.php">Repairing</a></li>
                            <li><a href="periodic-overhauling.php">Periodic Overhauling</a></li>
                            <li><a href="transformer-erection.php">Transformer Erection</a></li>
                        </ul>
                    </li>

                    <li class="nav-item has-dropdown">
                        <div class="nav-item-row">
                            <a href="projects.php" class="nav-link <?php echo isActivePage('projects') ?: isActivePage('psi') ?: isActivePage('ohe'); ?>">Projects</a>
                            <button class="submenu-toggle" type="button" aria-expanded="false" aria-label="Toggle Projects submenu">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </button>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="psi.php">PSI</a></li>
                            <li><a href="ohe.php">OHE</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="careers.php" class="nav-link <?php echo isActivePage('careers'); ?>">Careers</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact-us.php" class="nav-link <?php echo isActivePage('contact-us'); ?>">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <button class="mobile-toggle" id="mobileToggle" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mainNav">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
</header>
