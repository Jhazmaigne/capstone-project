<!DOCTYPE html>
<html lang="zxx" class="js">
<?php
ini_set('display_errors', 1);
$session = session();
$full_name = $session->get("fullname") ? $session->fullname : "Administrator";
$position = $session->get("position") ? $session->get("position") : "Administrator";
$is_admin = $session->get("isAdmin");
?>

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('./images/fav.png') ?>">
    <title>Deped Malaybalay Training Record - <?= $this->renderSection("title") ?></title>
    <link rel="stylesheet" href="<?php echo base_url('./assets/css/dashlite.css?ver=3.0.0') ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo base_url('./assets/css/theme.css?ver=3.0.0') ?>">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="html/index.html" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="<?php echo base_url('./images/fav.png') ?>" srcset="<?php echo base_url('./images/fav.png2x') ?>" alt="logo">
                            <img class="logo-dark logo-img" src="<?php echo base_url('./images/fav.png') ?>" srcset="<?php echo base_url('./images/fav.png') ?> 2x" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="<?php echo base_url('./images/fav.png') ?>" srcset="<?php echo base_url('./images/fav.png') ?> 2x" alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <?php if ($is_admin) : ?>
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">Internal</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="/position" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt-fill"></em></span>
                                            <span class="nk-menu-text">Positions</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="/personnel" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                            <span class="nk-menu-text">Personnels</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Training</h6>
                                </li>
                                <?php if ($is_admin) : ?>
                                    <li class="nk-menu-item">
                                        <a href="/training" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-book-fill"></em></span>
                                            <span class="nk-menu-text">All</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="/draft" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                            <span class="nk-menu-text">Draft</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li class="nk-menu-item">
                                    <a href="/ongoing" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-loader"></em></span>
                                        <span class="nk-menu-text">Ongoing</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="/finished" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-check"></em></span>
                                        <span class="nk-menu-text">Finished</span>
                                    </a>
                                </li>
                                <?php if ($is_admin) : ?>
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt">Result</h6>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="/evaluation" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-notice"></em></span>
                                            <span class="nk-menu-text">Evaluations</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="/assessment" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-pen-fill"></em></span>
                                            <span class="nk-menu-text">Assessments</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="html/index.html" class="logo-link">
                                    <img class="logo-light logo-img" src="<?php echo base_url('./images/fav.png') ?>" srcset="<?php echo base_url('./images/fav.png') ?> 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="<?php echo base_url('./images/fav.png') ?>" srcset="<?php echo base_url('./images/fav.png') ?> 2x" alt="logo-dark">
                                </a>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">

                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-xl-block">
                                                    <div class="user-status user-status-verified"><?= $position ?></div>
                                                    <div class="user-name dropdown-indicator"><?= $full_name ?></div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span><?= $position[0] ?></span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text"><?= $full_name ?></span>
                                                        <span class="sub-text"><?= $position ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="javascript:void(0)" onclick="onclickLogout()"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <?= $this->renderSection("content") ?>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2022 Capstone Project</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- LOGOUT FORM -->
    <form action="/login/destroy" method="POST" id="logoutForm">
    </form>
    <script>
        function onclickLogout() {
            $("#logoutForm").submit();
        }
    </script>
    <!-- app-root @e -->
    <script src="<?php echo base_url('./assets/js/bundle.js?ver=3.0.0') ?>"></script>
    <script src="<?php echo base_url('./assets/js/scripts.js?ver=3.0.0') ?>"></script>
    <script src="<?php echo base_url('./assets/js/charts/chart-ecommerce.js?ver=3.0.0') ?>"></script>
    <script type="text/javascript" src="https://unpkg.com/html2canvas@1.4.1/dist/html2canvas.js"></script>
    <?= $this->renderSection("script") ?>
</body>

</html>