<!-- webpage's header theme. include the company name and logo and navigation bar -->
<header>
  <myName>
    <div class="header-content">
      <object class="logo" type="image/svg+xml" data="/svg/cooltech.svg"></object>
      <span class="logo-title">Cool Tech</span>
    </div>
  </myName>
  <navbar>
    <nav id="Article"><a href="<?php echo e(url('/')); ?>" >Home</a></nav>
    <nav id="search"><a href="<?php echo e(url('/search')); ?>">Search</a></nav>
    <nav id="legal"><a href="<?php echo e(url('/legal')); ?>">Legal</a></nav>
    <nav id="aboutme"><a href="<?php echo e(url('/about-us')); ?>">About me</a></nav>
  </navbar>
</header>

<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/components/header.blade.php ENDPATH**/ ?>